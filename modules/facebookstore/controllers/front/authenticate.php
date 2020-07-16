<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * @author    knowband.com <support@knowband.com>
 * @copyright 2017 Knowband
 * @license   see file: LICENSE.txt
 * @category  PrestaShop Module
 */

class FacebookstoreAuthenticateModuleFrontController extends ModuleFrontController
{
    
    public function initContent()
    {
        parent::initContent();
        $fb_details = unserialize(Configuration::get('FB_STORE_CONFIG'));
            $fb = new Facebook\Facebook(array(
                'app_id' => $fb_details['fb_app_id'],
                'app_secret' => $fb_details['fb_app_secret'],
                'default_graph_version' => 'v2.9',
            ));
        $helper = $fb->getRedirectLoginHelper();
        if (Tools::getValue('code')) {
            if (Tools::getValue('state')) {
                $helper->getPersistentDataHandler()->set('state', Tools::getValue('state'));
            }
            try {
                $accessToken = $helper->getAccessToken();
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            if (isset($accessToken)) {
                // Logged in!
                Configuration::updateValue('FB_STORE_ACCESS_TOKEN', $accessToken);
                echo '<script>window.opener.location.reload()</script>';
                echo '<script>window.close();</script>';
                //echo 'location.reload();';
            }
        } else {
            $permissions = array('email', 'manage_pages', 'pages_manage_cta', 'pages_show_list'); // Optional permissions
            if (Configuration::get('PS_SSL_ENABLED') && Configuration::get('PS_SSL_ENABLED_EVERYWHERE')) {
                $ssl = 1;
            } else {
                $ssl = 0;
            }
            $redirect_uri = $this->context->link->getModuleLink('facebookstore', 'authenticate', array(), $ssl);
            $lang_str = '&id_lang=' . $this->context->language->id;
            $redirect_uri = str_replace($lang_str, '', $redirect_uri);

            $lang_str = '/' . $this->context->language->iso_code . '/';
            $redirect_uri = str_replace($lang_str, '/', $redirect_uri);
            $loginUrl = $helper->getLoginUrl($redirect_uri, $permissions);

            Tools::redirect($loginUrl);
            try {
                $accessToken = $helper->getAccessToken();
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                 // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }
            if (isset($accessToken)) {
                // Logged in!
                Configuration::updateValue('FB_STORE_ACCESS_TOKEN', $accessToken);
                echo '<script>window.opener.location.reload()</script>';
                echo '<script>window.close();</script>';
                //echo 'location.reload();';
            } elseif ($helper->getError()) {
                // The user denied the request
                exit;
            }
        }
        die;
    }
}
