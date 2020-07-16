<?php

class makecommerceparcellabelsModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        if(Tools::getIsset('order_ids')){
            $order_ids = Tools::getValue('order_ids');
            $parcel_labels = $this->getParcelLabel($order_ids);
            die(Tools::jsonEncode($parcel_labels));
        }
    }

    public function getParcelLabel($order_ids){

        foreach($order_ids as $order_id){
            $order = new Order($order_id);
            $makecommerceCarrier = FALSE;

            foreach ($order->getShipping() as $carrier){
                $carrire_obj = new Carrier($carrier['id_carrier']);
                if($carrire_obj->external_module_name == 'makecommerceomniva' || $carrire_obj->external_module_name == 'makecommercesmartpost'){
                    $makecommerceCarrier = TRUE;
                    if($carrire_obj->external_module_name == 'makecommerceomniva'){
                        $carrier_name = 'OMNIVA';
                    }elseif($carrire_obj->external_module_name == 'makecommercesmartpost'){
                        $carrier_name = 'SMARTPOST';
                    }
                    break;
                }
            }

            if($makecommerceCarrier){
                $address = new Address($order->id_address_delivery);
                $customer = new Customer($order->id_customer);
                $makecommerce = new MakeCommerce();

                $shipment_id = Db::getInstance()->getValue(
                    'SELECT `tracking_number` FROM `'._DB_PREFIX_.'order_carrier` WHERE `id_order`=' . $order->id
                );
                if(empty($shipment_id)){
                    $this->createShipments($order, $carrier_name);
                    $shipment_id = Db::getInstance()->getValue(
                        'SELECT `tracking_number` FROM `'._DB_PREFIX_.'order_carrier` WHERE `id_order`=' . $order->id
                    );
                }
                if(!empty($shipment_id)){
                    $credentials[] = array(
                        'carrier' => $carrier_name,
                        'username' => $makecommerce->getConfig($carrier_name.'_username'),
                        'password' => $makecommerce->getConfig($carrier_name.'_password')
                    );

                    $orders[] = array(
                        'orderId' => 'order '.$order->id,
                        'carrier' => $carrier_name,
                        'destination' => array(
                            'destinationId' => $address->other,
                        ),
                        'recipient' => array(
                            'name' => $address->firstname.' '.$address->lastname,
                            'phone' => $address->phone_mobile,
                            'email' => $customer->email
                        ),
                        'sender' => array(
                            'name' => $makecommerce->getConfig($carrier_name.'_sender_name'),
                            'phone' => $makecommerce->getConfig($carrier_name.'_phone'),
                            'email' => $makecommerce->getConfig($carrier_name.'_email'),
                            'street' => $makecommerce->getConfig($carrier_name.'_street'),
                            'city' => $makecommerce->getConfig($carrier_name.'_city'),
                            'country' => $makecommerce->getConfig($carrier_name.'_country'),
                            'postalCode' => $makecommerce->getConfig($carrier_name.'_zip')
                        ),
                        'shipmentId' => $shipment_id,
                    );
                }
            }
        }
        if(isset($credentials) and isset($orders)){
            $request_body = array(
                'credentials' => $credentials,
                'orders' => $orders,
                'printFormat' => 'A4'
            );

            $api = $makecommerce->getApi();
            $label = $api->createLabels($request_body);
            return $label->labelUrl;
        }
    }

    public function createShipments($order, $carrier_name)
    {
        $address = new Address($order->id_address_delivery);
        $customer = new Customer($order->id_customer);
        $makecommerce = new MakeCommerce();

        $credentials = array(
            'carrier' => $carrier_name,
            'username' => $makecommerce->getConfig($carrier_name.'_username'),
            'password' => $makecommerce->getConfig($carrier_name.'_password')
        );
        $orders = array(
            'orderId'=> 'order '.$order->id,
            'carrier'=> $carrier_name,
            'destination' => array(
                'destinationId' => $address->other,
            ),
            'recipient'=> array(
                'name' => $address->firstname.' '.$address->lastname,
                'phone' => $address->phone_mobile,
                'email' => $customer->email,
            ),
            'sender' => array(
                'name' => $makecommerce->getConfig($carrier_name.'_sender_name'),
                'phone' => $makecommerce->getConfig($carrier_name.'_phone'),
                'email' => $makecommerce->getConfig($carrier_name.'_email'),
                'postalCode' => $makecommerce->getConfig($carrier_name.'_zip'),
            ),

        );
        $request_body = array(
            'credentials' => array($credentials),
            'orders' => array($orders)
        );


        $api = $makecommerce->getApi();
        $shipments = $api->createShipments($request_body);

        $shipment = json_decode(json_encode($shipments), True);
        if (!empty($shipments) && !isset($shipment[0]['errorMessage']))
        {
            Db::getInstance()->update(
                'order_carrier',
                array('tracking_number' => $shipment[0]['shipmentId']),
                '`id_order`=' . $order->id
            );
        }
    }

    public function display()
    {
        return false;
    }
}
