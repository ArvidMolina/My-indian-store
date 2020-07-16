<?php


class VenipakManifest {

    public function __construct() {

    }
    public function getManifestNo($date, $warehouseId){
        $manifestNo = Configuration::get('VENIPAK_API_ID_CODE');
        $manifestNo .= str_replace('-','',substr($date,2));
        $manifestNo .= $warehouseId;
        //check all manifest for this date
        $db = Db::getInstance();
        $sql = 'SELECT * FROM ' . _DB_PREFIX_ . 'venipak_manifest WHERE manifest_date="'.pSQL($date).'" AND warehouse_id="'.$warehouseId.'"';
        $result = $db->executeS($sql);
        if(!empty($result)){
            //there are already manifest for this date and warehouse
            //check if there are any open manifests, if so - return the last open manifest
            $foundOpen = NULL;
            foreach($result as $one){
                if($one['status']==  VenipakCarrier::MANIFEST_STATUS_OPEN){
                    $foundOpen = $one;
                    break;
                }
            }
            if($foundOpen){
                return $one['manifest_no'];
            }else{
                //find max increment
                $sql = 'SELECT MAX(manifest_no) as max FROM ' . _DB_PREFIX_ . 'venipak_manifest WHERE manifest_date="'.pSQL($date).'" AND warehouse_id="'.$warehouseId.'"';
                $max = $db->getRow($sql);
                //create new
                //$manifestNo = str_pad($manifestNo, 2, "0", STR_PAD_LEFT);
                $max = $max['max'];
                $manifestNo = (float)$max+1;
                $manifestNo = self::fixManifestNo($manifestNo);

                $result = Db::getInstance()->insert('venipak_manifest', array(
                    'manifest_no' => $manifestNo,
                    'manifest_date'=>$date,
                    'warehouse_id'=>$warehouseId,
                    'status'=>VenipakCarrier::MANIFEST_STATUS_OPEN
                ));
                return $manifestNo;
            }

        }else{
            $manifestNo .= '01';
            $result = Db::getInstance()->insert('venipak_manifest', array(
                    'manifest_no' => $manifestNo,
                    'manifest_date'=>$date,
                    'warehouse_id'=>$warehouseId,
                    'status'=>VenipakCarrier::MANIFEST_STATUS_OPEN
                ));

            return $manifestNo;
        }
        return false;
    }

    public function closeManifest($manifestNo){
        $db = Db::getInstance();
        $sql = 'UPDATE ' . _DB_PREFIX_ . 'venipak_manifest SET status="'.VenipakCarrier::MANIFEST_STATUS_CLOSED.'" WHERE manifest_no="'.$manifestNo.'"';
        $result = $db->execute($sql);
        return $result;
    }

    public function getTotalManifestsByWarehouse($warehouseId){
        $sql = 'SELECT COUNT(*) as total FROM ' . _DB_PREFIX_ . 'venipak_manifest AS manifests WHERE warehouse_id="'.(int)$warehouseId.'" ';
        $result = Db::getInstance()->getRow($sql);
        return $result['total'];
    }

    public static function fixManifestNo($manifestNo){
        //if, for example, API ID has "0" in front - make sure its kept
        return str_pad($manifestNo, 14, "0", STR_PAD_LEFT);
    }

    public static function getManifest($manifestNo){
        $sql = 'SELECT * FROM ' . _DB_PREFIX_ . 'venipak_manifest WHERE manifest_no="'.pSql($manifestNo).'" ';
        $result = Db::getInstance()->getRow($sql);
        return $result;
    }
}
