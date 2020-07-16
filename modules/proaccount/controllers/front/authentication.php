<?php
/**
 * 2015 DMConcept
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 *
 * @author    Dmconcept <support@dmconcept.fr>
 * @copyright 2015 DMConcept
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

class ProaccountAuthenticationModuleFrontController extends AuthController
{

    public static $extension = array(
        '.txt',
        '.rtf',
        '.doc',
        '.docx',
        '.pdf',
        '.zip',
        '.png',
        '.jpeg',
        '.gif',
        '.jpg',
    );
    protected $file_attachment;

    public function init()
    {
        if (!Configuration::get('PS_B2B_ENABLE')) {
            $this->redirect_after = $this->context->link->getPageLink('pagenotfound');
            $this->redirect();
        }

        parent::init();
    }

    protected function processSubmitCreate()
    {
        $email = '';
        $this->create_account = true;
        $this->context->smarty->assign('email_create', Tools::safeOutput($email));
    }

    protected function sendConfirmationMail(Customer $customer)
    {
        $context = Context::getContext();
        $id_lang = (int)$context->language->id;
        $iso = Language::getIsoById($id_lang);
        $id_shop = (int)$context->shop->id;
        $address_text = '';
        if ((int)Configuration::get('PS_REGISTRATION_PROCESS_TYPE') === PS_REGISTRATION_PROCESS_AIO) {
            $addresses = $customer->getAddresses($id_lang);
            $address = new Address($addresses[0]['id_address']);
            $address_text = AddressFormat::generateAddress($address);
        }
        if (file_exists(dirname(__FILE__).'/../../mails/'.$iso.'/pro_account.txt')
            && file_exists(dirname(__FILE__).'/../../mails/'.$iso.'/pro_account.html')) {
            $file_attachment = !empty($this->file_attachment['name']) ?
                $this->file_attachment : null;
            Mail::Send(
                $id_lang,
                'pro_account',
                $this->l('Professional account register'),
                array(
                    '{firstname}' => $customer->firstname,
                    '{lastname}' => $customer->lastname,
                    '{email}' => $customer->email,
                    '{company}' => $customer->company,
                    '{siret}' => $customer->siret,
                    '{address}' => $address_text,
                ),
                Configuration::get('PS_SHOP_EMAIL'),
                null,
                (string)Configuration::get('PS_SHOP_EMAIL'),
                (string)Configuration::get('PS_SHOP_NAME'),
                $file_attachment,
                null,
                dirname(__FILE__).'/../../mails/',
                null,
                (int)$id_shop
            );
        }

        return parent::sendConfirmationMail($customer);
    }

    /**
     * Needed here ...
     */
    public function l($string)
    {
        $string = str_replace('\'', '\\\'', $string);

        return Translate::getModuleTranslation('Proaccount', $string, 'authentication');
    }

    protected function processSubmitAccount()
    {
        // REQUIRED B2B FIELDS
        if (Configuration::get('PROACCOUNT_REQUIRED_COMPANY') && !Tools::getValue('company')) {
            $this->errors['company'] = $this->l('Company required');
        }
        if (Configuration::get('PROACCOUNT_REQUIRED_SIRET') && !Tools::getValue('siret')) {
            $this->errors['siret'] = $this->l('SIRET required');
        }
        if (Configuration::get('PROACCOUNT_REQUIRED_APE') && !Tools::getValue('ape')) {
            $this->errors['ape'] = $this->l('APE number required');
        }
        if (Configuration::get('PROACCOUNT_REQUIRED_WEBSITE') && !Tools::getValue('website')) {
            $this->errors['website'] = $this->l('Website required');
        }

        // FILE ATTACHMENT
        $file_attachment = Tools::fileAttachment('fileUpload');
        if (!empty($file_attachment['name']) && $file_attachment['error'] != 0) {
            $this->errors[] = $this->l('An error occurred during the file-upload process.');
        } elseif (!empty($file_attachment['name'])
            && !in_array(
                Tools::strtolower(
                    Tools::substr($file_attachment['name'], -4)
                ),
                self::$extension
            )
            && !in_array(
                Tools::strtolower(
                    Tools::substr($file_attachment['name'], -5)
                ),
                self::$extension
            )
        ) {
            $this->errors[] = $this->l('Bad file extension');
        }

        $this->file_attachment = $file_attachment;

        parent::processSubmitAccount();
    }
}
