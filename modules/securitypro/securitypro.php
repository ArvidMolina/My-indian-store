<?php
/**
 * 2020 Mathias R.
 *
 * NOTICE OF LICENSE
 *
 * This file is licensed under the Software License Agreement
 * With the purchase or the installation of the software in your application
 * you accept the license agreement.
 *
 * @author    Mathias R.
 * @copyright Mathias R.
 * @license   Commercial license (You can not resell or redistribute this software.)
 */

if (!defined('_PS_VERSION_')) {
    die;
}

class SecurityPro extends Module
{
    private $user_ip;
    private $control_db;
    private $control_lock_dir;
    private $control_lock_file;
    private $script_tmp_dir;

    public $cron = 0;

    /**
     * Construct module.
     */
    public function __construct()
    {
        $this->name = 'securitypro';
        $this->tab = 'administration';
        $this->version = '4.0.1';
        $this->author = 'Mathias Reker';
        $this->module_key = '71a0dda36237f958642fb61a15ccc695';
        $this->need_instance = 0;
        $this->bootstrap = 1;
        parent::__construct();
        $this->displayName = $this->l('Security Pro');
        $this->description = $this->l('This module increase the overall security of your PrestaShop website.');
        $this->ps_versions_compliancy = [
            'min' => '1.7',
            'max' => _PS_VERSION_,
        ];
    }

    /**
     * Install module, database table and set default values.
     */
    public function install()
    {
        if (Module::isInstalled('securitylite')) {
            Module::disableByName('securitylite');
        }

        $files = [
            _PS_ROOT_DIR_ . '/.htaccess',
        ];

        foreach ($files as $file) {
            if (file_exists($file)) {
                $this->removeHtaccessContent($file);
            }
        }

        include _PS_MODULE_DIR_ . $this->name . '/sql/install.php';

        Configuration::updateValue('PRO_BAN_TIME', 30);
        Configuration::updateValue('PRO_MAX_RETRY', 5);
        Configuration::updateValue('PRO_FIND_TIME', 10);
        Configuration::updateValue('PRO_FILE_CHANGES_EMAIL', Configuration::get('PS_SHOP_EMAIL'));
        Configuration::updateValue('PRO_FAIL2BAN_EMAIL', Configuration::get('PS_SHOP_EMAIL'));
        Configuration::updateValue('PRO_MALWARE_SCAN_EMAIL', Configuration::get('PS_SHOP_EMAIL'));
        Configuration::updateValue('PRO_ADMIN_DIRECTORY_NAME', basename(PS_ADMIN_DIR));
        Configuration::updateValue('PRO_WHITELIST_IPS', $_SERVER['REMOTE_ADDR']);

        Configuration::updateValue('PRO_ANTI_MAX_REQUESTS', 30);
        Configuration::updateValue('PRO_ANTI_REQ_TIMEOUT', 5);
        Configuration::updateValue('PRO_ANTI_BAN_TIME', 120);

        $hook = [
            'displayHeader',
            'displayBackOfficeTop',
        ];

        return parent::install() && $this->registerHook($hook);
    }

    /**
     * Uninstall the module, reverse any changes and delete database table.
     */
    public function uninstall()
    {
        include _PS_MODULE_DIR_ . $this->name . '/sql/uninstall.php';

        $form_values = $this->getConfigFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::deleteByName($key);
        }

        if (file_exists(_PS_ADMIN_DIR_ . '/.htpasswd')) {
            unlink(_PS_ADMIN_DIR_ . '/.htpasswd');
        }

        $files = [
            _PS_ROOT_DIR_ . '/.htaccess',
            _PS_ADMIN_DIR_ . '/.htaccess',
        ];

        foreach ($files as $file) {
            if (file_exists($file)) {
                $this->removeHtaccessContent($file);
            }
        }

        return parent::uninstall();
    }

    public function renameAdminDirectory()
    {
        if (Configuration::get('PRO_ADMIN_DIRECTORY')) {
            if (!Validate::isFileName(Configuration::get('PRO_ADMIN_DIRECTORY_NAME'))) {
                Configuration::updateValue('PRO_ADMIN_DIRECTORY', 0);
            } else {
                // Remove settings in .htaccess
                $this->removeHtaccessContent(_PS_ADMIN_DIR_ . '/.htaccess');

                Configuration::updateValue('PRO_ADMIN_DIRECTORY', 0);

                $new_name = Configuration::get('PRO_ADMIN_DIRECTORY_NAME');

                rename(_PS_ADMIN_DIR_, _PS_ROOT_DIR_ . '/' . $new_name);

                // Redirect to new path. We need a client-side language for this task, because the code is temporary unavailable.
                echo '<script>window.location.replace("' . $this->context->link->getBaseLink() . $new_name . '/index.php?controller=AdminModules&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name . '&token=' . Tools::getAdminTokenLite('AdminModules') . '")</script>';

                // Reinsert settings in .htaccess
                $this->secureBackOffice();
            }
        } else {
            // reset admin dir
            Configuration::updateValue('PRO_ADMIN_DIRECTORY_NAME', basename(PS_ADMIN_DIR));
        }
    }

    /**
     * Run scripts depending on configurations. Display warnings and confirmations.
     */
    public function getContent()
    {
        $out = "
        <script>    
            function add_field() 
            {
                $(function () {
                    var pass = secureRandomPassword.randomString({ length: 24 });
                    var text = $('#PRO_PASSWORD_GENERATOR');
                    text.val(pass);    
                });
            }
            function add_field2() 
            {
                $(function () {
                    var pass = 'admin' + secureRandomPassword.randomString({ length: 12, characters: [secureRandomPassword.lower, secureRandomPassword.upper, secureRandomPassword.digits] });
                    var text = $('#PRO_ADMIN_DIRECTORY_NAME');
                    text.val(pass);
                });
            }
            function add_field3() 
            {
                $(function () {
                    var pass = secureRandomPassword.randomString({ length: 24, characters: [secureRandomPassword.lower, secureRandomPassword.upper, secureRandomPassword.digits] });
                    var text = $('#PRO_HTPASSWD_USER');
                    text.val(pass);
                });
            }
            function add_field4() 
            {
                $(function () {
                    var pass = secureRandomPassword.randomString({ length: 24, characters: [secureRandomPassword.lower, secureRandomPassword.upper, secureRandomPassword.digits] });
                    var text = $('#PRO_HTPASSWD_PASS');
                    text.val(pass);
                });
            }
        </script>";

        if (!Configuration::get('PS_SSL_ENABLED_EVERYWHERE')) {
            Configuration::updateValue('PRO_STRICT_TRANSPORT_SECURITY', 0);
            Configuration::updateValue('PRO_EXPECT_CT', 0);
        }

        if (Module::isInstalled('securitylite')) {
            if (version_compare(_PS_VERSION_, '1.7.5.0', '>=')) {
                $out .= $this->displayInformation($this->l('Awesome! You are using Security Pro! Please uninstall Security Lite to avoid any conflicts.'));
            } else {
                $out .= $this->displayConfirmation($this->l('Awesome! You are using Security Pro! Please uninstall Security Lite to avoid any conflicts.'));
            }
        }

        if ((bool) Tools::isSubmit('btnPermissions')) {
            $this->chmodFileDirectory(_PS_ROOT_DIR_); // Change permissions
            // Validate input: permissions

            $out .= $this->displayConfirmation($this->l('Permissions updated!'));

            if (!empty($this->error_dir)) {
                $out .= $this->displayWarning($this->error_dir);
            }

            if (!empty($this->error_file)) {
                $out .= $this->displayWarning($this->error_file);
            }
        }

        if ((bool) Tools::isSubmit('btnIndex')) {
            // Validate and create Index

            $dirs_index = [
                _PS_MODULE_DIR_,
                _PS_ALL_THEMES_DIR_,
            ];

            foreach ($dirs_index as $dir_index) {
                $this->addIndexRecursively($dir_index);
            }

            $out .= $this->displayConfirmation($this->l('Missing index.php files was successfully added!'));
        }

        if ((bool) Tools::isSubmit('submitSecurityProModule')) {
            $this->postProcess(); // Post process

            // Run scripts
            $this->secureBackOffice(); // Writes to .htaccess file in BO

            $out .= $this->displayConfirmation($this->l('Settings updated!'));

            // Validate input: Protect BO
            if (Configuration::get('PRO_FAIL2BAN')) {
                if (!Validate::isInt(Configuration::get('PRO_BAN_TIME')) || Configuration::get('PRO_BAN_TIME') <= 0) {
                    $out .= $this->displayWarning($this->l('"Ban time" needs to be an integer and greater than 0.'));
                    Configuration::updateValue('PRO_FAIL2BAN', 0);
                }

                if (!Validate::isInt(Configuration::get('PRO_FIND_TIME')) || Configuration::get('PRO_BAN_TIME') <= 0) {
                    $out .= $this->displayWarning('"Find time" needs to be an integer and greater than 0.');
                    Configuration::updateValue('PRO_FAIL2BAN', 0);
                }

                if (!Validate::isInt(Configuration::get('PRO_MAX_RETRY')) || Configuration::get('PRO_BAN_TIME') <= 0) {
                    $out .= $this->displayWarning($this->l('"Max retry" needs to be an integer and greater than 0.'));
                    Configuration::updateValue('PRO_FAIL2BAN', 0);
                }

                if (Configuration::get('PRO_SEND_MAIL')) {
                    if (!Validate::isEmail(Configuration::get('PRO_FAIL2BAN_EMAIL'))) {
                        $out .= $this->displayWarning($this->l('"E-mail" needs to be an e-mail address.'));
                        Configuration::updateValue('PRO_SEND_MAIL', 0);
                    }
                }
            }

            // Validate input: Second login
            if (Configuration::get('PRO_HTPASSWD')) {
                $username = Configuration::get('PRO_HTPASSWD_USER');
                $password = Configuration::get('PRO_HTPASSWD_PASS');

                if (!$this->checkName($username) && !$this->checkName($password)) {
                    $out .= $this->displayWarning($this->l('Avoid use of') . ' :');
                    Configuration::updateValue('PRO_HTPASSWD', 0);
                    $this->onErrorHtpasswd();
                }

                if ('' == Configuration::get('PRO_HTPASSWD_USER') || '' == Configuration::get('PRO_HTPASSWD_PASS')) {
                    $out .= $this->displayWarning($this->l('Both username and password must be completed.'));
                    $this->onErrorHtpasswd();
                }
            }
        }
        // Validate input: File changes
        if (Configuration::get('PRO_FILE_CHANGES')) {
            if (Validate::isEmail(Configuration::get('PRO_FILE_CHANGES_EMAIL'))) {
                $link_cron_job = $this->context->link->getBaseLink() . 'modules/securitypro/filechanges-cron.php?token=' . Tools::substr(Tools::encrypt('filechanges/cron'), 0, 10);
                if (version_compare(_PS_VERSION_, '1.7.5.0', '>=')) {
                    $out .= $this->displayInformation($this->l('Set up a cron job to get notified by e-mail if files have changed on your server.') . ' URL: <strong><a href="' . $link_cron_job . '" target="_blank">' . $link_cron_job . '</a></strong>');
                } else {
                    $out .= $this->displayConfirmation($this->l('Set up a cron job to get notified by e-mail if files have changed on your server.') . ' URL: <strong><a href="' . $link_cron_job . '" target="_blank">' . $link_cron_job . '</a></strong>');
                }
            } else {
                $out .= $this->displayWarning($this->l('The entered e-mail address is wrong'));
                Configuration::updateValue('PRO_FILE_CHANGES', 0);
            }
        }

        // Validate input: Admin directory
        if (!Validate::isFileName(Configuration::get('PRO_ADMIN_DIRECTORY_NAME'))) {
            $out .= $this->displayWarning($this->l('Name of directory is not correct'));
        }

        // Validate input: Scan for malware
        if (Configuration::get('PRO_MALWARE_SCAN')) {
            if (Validate::isEmail(Configuration::get('PRO_MALWARE_SCAN_EMAIL'))) {
                $link_cron_job = $this->context->link->getBaseLink() . 'modules/securitypro/malwarescan-cron.php?token=' . Tools::substr(Tools::encrypt('malwarescan/cron'), 0, 10);
                if (version_compare(_PS_VERSION_, '1.7.5.0', '>=')) {
                    $out .= $this->displayInformation($this->l('Set up a cron job to get notified by e-mail if malicious files were found on your server.') . ' URL: <strong><a href="' . $link_cron_job . '" target="_blank">' . $link_cron_job . '</a></strong>');
                } else {
                    $out .= $this->displayConfirmation($this->l('Set up a cron job to get notified by e-mail if malicious files were found on your server.') . ' URL: <strong><a href="' . $link_cron_job . '" target="_blank">' . $link_cron_job . '</a></strong>');
                }
            } else {
                $out .= $this->displayWarning($this->l('The entered e-mail address is wrong'));
                Configuration::updateValue('PRO_MALWARE_SCAN', 0);
            }
        }

        if (!configuration::get('PRO_ANTI_FLOOD')) {
            $dirs = [
                _PS_MODULE_DIR_ . $this->name . '/antiflood/lock',
                _PS_MODULE_DIR_ . $this->name . '/antiflood',
            ];

            foreach ($dirs as $dir) {
                if (is_dir($dir)) {
                    $this->deleteDir($dir);
                }
            }
        }

        // Files that should be deleted
        $files = [
            _PS_ROOT_DIR_ . '/docs/readme_de.txt',
            _PS_ROOT_DIR_ . '/docs/readme_en.txt',
            _PS_ROOT_DIR_ . '/docs/readme_es.txt',
            _PS_ROOT_DIR_ . '/docs/readme_fr.txt',
            _PS_ROOT_DIR_ . '/docs/readme_it.txt',
            _PS_ROOT_DIR_ . '/docs/CHANGELOG.txt',
        ];

        $checked_files = [];

        foreach ($files as $file) {
            if (file_exists($file)) {
                $checked_files[] = $file;
            }
        }

        $elements = array_merge($checked_files, $this->checkFilesCVE20179841());

        if (empty($elements)) {
            $show = 0;
        } else {
            $show = 1;
        }

        if ((bool) Tools::isSubmit('btnFiles')) {
            if (!empty($elements)) {
                foreach ($this->checkFilesCVE20179841() as $checked_dir) {
                    if (is_dir($checked_dir)) {
                        $this->deleteDir($checked_dir);
                    }
                }

                foreach ($checked_files as $checked_file) {
                    if (file_exists($checked_file)) {
                        unlink($checked_file);
                    }
                }
                $show = 0;
                $out .= $this->displayConfirmation($this->l('Files was successfully removed!'));
            }
        }

        $this->context->smarty->assign([
            'current_url' => $this->context->link->getAdminLink('AdminModules', false) . '&configure=' . $this->name . '&token=' . Tools::getAdminTokenLite('AdminModules'),
            'shop_url' => $this->getShopUrl(),
            'elements' => $elements,
            'show' => $show,
            'documentation_url' => $this->_path . 'docs/' . 'readme_en.pdf',
        ]);

        // Empty password
        Configuration::updateValue('PRO_PASSWORD_GENERATOR', null);

        $this->renameAdminDirectory(); // Run this last, because of redirect

        return $out . $this->display(__FILE__, 'views/templates/admin/scripts.tpl') . $this->renderForm() . $this->checkSystem() . $this->display(__FILE__, 'views/templates/admin/footer.tpl');
    }

    /**
     * Check if any files has changed.
     */
    public function checkDiff()
    {
        if (Configuration::get('PRO_FILE_CHANGES')) {
            $result = [];
            $arr_name = [];
            $log = _PS_MODULE_DIR_ . $this->name . '/logs/file.log';
            $path = _PS_ROOT_DIR_;

            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);

            foreach ($files as $file) {
                if (is_file($file = (string) $file)) {
                    $result[$file] = sprintf('%u|%u', filesize($file), filemtime($file));
                }
            }

            if (!is_file($log)) {
                file_put_contents($log, json_encode($result), LOCK_EX);
            }

            $diff = array_diff($result, json_decode(Tools::file_get_contents($log), 1));

            $white_list = [
                'log',
                'cache',
                'xml',
            ];

            $custom_white_list = explode(',', preg_replace('/\s+/', '', Configuration::get('PRO_FILE_CHANGES_WHITELIST')));

            if ('' == Configuration::get('PRO_FILE_CHANGES_WHITELIST')) {
                $total_white_list = $white_list;
            } else {
                $total_white_list = array_merge($white_list, $custom_white_list);
            }

            $regex_array = implode('|', $total_white_list);

            foreach (array_keys($diff) as $name) {
                if (!preg_match("/($regex_array)/i", $name)) {
                    $arr_name[] .= $name;
                }
            }

            if (count($arr_name) > 0) {
                $email_body = implode('<br>', $arr_name);
                $lang = Configuration::get('PS_LANG_DEFAULT');
                $email = Configuration::get('PRO_FILE_CHANGES_EMAIL');
                $data = [
                    '{email}' => $email_body,
                ];
                $dir = _PS_MODULE_DIR_ . $this->name . '/mails/en';
                Mail::Send($lang, 'filechanges', Mail::l('Filechanges', $lang), $data, $email, null, null, null, null, null, $dir, 0);
            }
            file_put_contents($log, json_encode($result), LOCK_EX);
            chmod($log, 0644);
        }
    }

    /**
     * Check for malware.
     */
    public function sendMailMalware()
    {
        if (Configuration::get('PRO_MALWARE_SCAN')) {
            $this->malwareScan(_PS_ROOT_DIR_);
            $data = [];
            $email_body = null;

            $white_list = [
                'IntegrationTestCase.php',
                'jquery.iframe-transport.js',
                'main.bundle.js',
                'smarty_internal_runtime_tplfunction.php',
            ];
            $custom_white_list = explode(',', preg_replace('/\s+/', '', Configuration::get('PRO_WHITELIST_MALWARE')));

            if ('' == Configuration::get('PRO_WHITELIST_MALWARE')) {
                $total_white_list = $white_list;
            } else {
                $total_white_list = array_merge($white_list, $custom_white_list);
            }

            $regex_array = implode('|', $total_white_list);

            foreach ($this->infs as $inf) {
                if (!preg_match("/($regex_array)/i", $inf)) {
                    $data[] .= $inf . PHP_EOL;
                }
            }

            if (count($data) > 0) {
                foreach ($data as $key) {
                    $email_body .= $key . '<br>';
                }
                $lang = Configuration::get('PS_LANG_DEFAULT');
                $email = Configuration::get('PRO_MALWARE_SCAN_EMAIL');
                $data2 = [
                    '{email}' => $email_body,
                ];
                $dir = _PS_MODULE_DIR_ . $this->name . '/mails/en';
                Mail::Send($lang, 'malwarescan', Mail::l('Malwarescan', $lang), $data2, $email, null, null, null, null, null, $dir, 0);
            }
        }
    }

    /**
     * Hook stuff in front office header.
     *
     * @param array $params
     */
    public function hookDisplayHeader($params)
    {
        if (Configuration::get('PRO_CLICK_JACKING')) {
            header('X-Frame-Options: SAMEORIGIN');
            header("Content-Security-Policy: frame-ancestors 'self'");
            header("Feature-Policy: sync-xhr 'self'");
        }

        if (Configuration::get('PRO_X_XSS_PPROTECTION')) {
            header('X-XSS-Protection: 1; mode=block');
        }

        if (Configuration::get('PRO_X_CONTENT_TYPE_OPTIONS')) {
            header('X-Content-Type-Options: nosniff');
        }

        if (Configuration::get('PRO_STRICT_TRANSPORT_SECURITY')) {
            $string = 'Strict-Transport-Security: max-age=63072000';
            if (configuration::get('PRO_HSTS_SETTINGS_1') === 'on') {
                $string .= '; includeSubDomains';
            }
            if (configuration::get('PRO_HSTS_SETTINGS_0') === 'on') {
                $string .= '; preload';
            }
            $string .= ' env=HTTPS';
            header($string);
        }

        if (Configuration::get('PRO_EXPECT_CT')) {
            header('Expect-CT: max-age=7776000, enforce env=HTTPS');
        }

        if (Configuration::get('PRO_REFFERER_POLICY')) {
            header('Referrer-Policy: same-origin');
        }

        if (Configuration::get('PRO_BAN_IP_ACTIVATE') && '' !== Configuration::get('PRO_BAN_IP')) {
            $this->blockIp();
        }

        //antiflood
        if (Configuration::get('PRO_ANTI_FLOOD')) {
            if (Tools::getValue('controller') !== 'cart') {
                $this->antiFlood();
            }
        }

        if (Configuration::get('PRO_DISABLE_RIGHT_CLICK')) {
            $this->context->controller->addJS($this->context->link->getBaseLink() . 'modules/securitypro/views/js/contextmenu.js');
        }

        if (Configuration::get('PRO_DISABLE_DRAG')) {
            $this->context->controller->addJS($this->context->link->getBaseLink() . 'modules/securitypro/views/js/dragstart.js');
        }

        if (Configuration::get('PRO_DISABLE_COPY')) {
            $this->context->controller->addJS($this->context->link->getBaseLink() . 'modules/securitypro/views/js/copy.js');
        }

        if (Configuration::get('PRO_DISABLE_CUT')) {
            $this->context->controller->addJS($this->context->link->getBaseLink() . 'modules/securitypro/views/js/cut.js');
        }

        if (Configuration::get('PRO_DISABLE_PASTE')) {
            $this->context->controller->addJS($this->context->link->getBaseLink() . 'modules/securitypro/views/js/paste.js');
        }

        if (Configuration::get('PRO_DISABLE_TEXT_SELECTION')) {
            $this->context->controller->addCSS($this->context->link->getBaseLink() . 'modules/securitypro/views/css/securitypro.css');
        }
    }

    public function deleteDir($dirPath)
    {
        if (Tools::substr($dirPath, Tools::strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    public function antiFlood()
    {
        $this->script_tmp_dir = _PS_MODULE_DIR_ . $this->name . '/antiflood';
        $this->user_ip = $_SERVER['REMOTE_ADDR'];
        $this->control_db = $this->script_tmp_dir . '/ctrl';
        $this->control_lock_dir = $this->script_tmp_dir . '/lock';
        $this->control_lock_file = $this->control_lock_dir . '/' . sha1($this->user_ip);
        if (!is_dir($this->script_tmp_dir)) {
            mkdir($this->script_tmp_dir);
        }
        if (!is_dir($this->control_lock_dir)) {
            mkdir($this->control_lock_dir);
        }

        if (file_exists($this->control_lock_file)) {
            if (time() - filemtime($this->control_lock_file) > Configuration::get('PRO_ANTI_BAN_TIME')) {
                // this user has complete his punishment
                unlink($this->control_lock_file);
            } else {
                // too many requests
                header('HTTP/1.1 403 Forbidden');
                echo '<h1>Access denied</h1>
                <p>As a precaution we have momentarily restricted access to this site. Try again later.</p><p>' . Configuration::get('PRO_ANTI_MAX_REQUESTS') . ' requests in ' . Configuration::get('PRO_ANTI_REQ_TIMEOUT') . ' seconds banned you for ' . Configuration::get('PRO_ANTI_BAN_TIME') . ' seconds.</p>
                <p id="wait"></p>
                <script>
    var countDownDate = new Date().getTime() + ' . 1000 * Configuration::get('PRO_ANTI_BAN_TIME') . ';
var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (86400000));
    var hours = Math.floor((distance % (86400000)) / (3600000));
    var minutes = Math.floor((distance % (3600000)) / (60000));
    var seconds = Math.floor((distance % (60000)) / 1000);
    document.getElementById("wait").innerHTML = "Wait for " + days + "d " + hours + "h " +
        minutes + "m " + seconds + "s ";

    if (distance < 0) {
        clearInterval(x);

        document.getElementById("wait").innerHTML = "You may <a href=' . $this->currenURL() . '>' . $this->l('Retry now') . '</a>.";
    }
}, 1000);</script>';
                touch($this->control_lock_file);
                die();
            }
        }
        $this->antifloodCountaccess();
    }

    public function antifloodCountaccess()
    {
        // counting requests and last access time
        $control = [];

        if (file_exists($this->control_db)) {
            $fh = fopen($this->control_db, 'rb');
            $control = array_merge($control, unserialize(fread($fh, filesize($this->control_db))));
            fclose($fh);
        }

        if (isset($control[$this->user_ip])) {
            if (time() - $control[$this->user_ip]['t'] < Configuration::get('PRO_ANTI_REQ_TIMEOUT')) {
                ++$control[$this->user_ip]['c'];
            } else {
                $control[$this->user_ip]['c'] = 1;
            }
        } else {
            $control[$this->user_ip]['c'] = 1;
        }
        $control[$this->user_ip]['t'] = time();

        if ($control[$this->user_ip]['c'] >= Configuration::get('PRO_ANTI_MAX_REQUESTS')) {
            // this user did too many requests within a very short period of time
            $fh = fopen($this->control_lock_file, 'wb');
            fwrite($fh, $this->user_ip);
            fclose($fh);
        }

        // writing updated control table
        $fh = fopen($this->control_db, 'wb');
        fwrite($fh, serialize($control));
        fclose($fh);
    }

    /**
     * Hook stuff in back office header.
     *
     * @param array $params
     */
    public function hookDisplayBackOfficeTop($params)
    {
        $this->context->controller->addJS($this->context->link->getBaseLink() . 'modules/securitypro/views/js/secure-random-password.min.js');

        if (Configuration::get('PRO_FAIL2BAN')) {
            $email = Tools::getValue('email');
            $passwd = Tools::getValue('passwd');

            if (Tools::isSubmit('submitLogin') && $email && $passwd) {
                $banTime = Configuration::get('PRO_BAN_TIME') * 60;
                $employeeBanTime = $this->getBanTime($email);

                if (time() - $employeeBanTime <= $banTime) {
                    $this->ban();
                }
                $employee = new Employee();
                $isLoaded = $employee->getByEmail($email, $passwd);

                if (!$isLoaded) {
                    Db::getInstance()->insert('securitypro', [
                        'email' => $email,
                        'ip' => $_SERVER['REMOTE_ADDR'],
                    ]);

                    if (Configuration::get('PRO_SEND_MAIL') && !$this->whiteList(Configuration::get('PRO_WHITELIST_IPS')) && Validate::isEmail(Configuration::get('PRO_FILE_CHANGES_EMAIL'))) {
                        $lang = (int) Configuration::get('PS_LANG_DEFAULT');
                        $email_admin = Configuration::get('PRO_FAIL2BAN_EMAIL');
                        $data = [
                            '{email}' => $email,
                            '{ip}' => $_SERVER['REMOTE_ADDR'],
                        ];
                        $dir = _PS_MODULE_DIR_ . $this->name . '/mails/en';
                        Mail::Send($lang, 'PRO_FAIL2BAN', Mail::l('Attempt to login', $lang), $data, $email_admin, null, null, null, null, null, $dir, 0);
                    }
                }

                $findTime = ConfigurationCore::get('PRO_FIND_TIME') * 60;
                $eldestAccessTime = $this->getEldestAccessTry($email);

                if ($eldestAccessTime && time() - $eldestAccessTime <= $findTime) {
                    Db::getInstance()->insert('securitypro', [
                        'email' => $email,
                        'ip' => $_SERVER['REMOTE_ADDR'],
                        'banned' => 1,
                    ]);
                    $this->ban();
                }
            }
        }
    }

    /**
     * Scan for malware.
     *
     * @param string $dir
     */
    public function malwareScan($dir)
    {
        $this->scanned_files[] = $dir;
        $files = scandir($dir);

        foreach ($files as $file) {
            if (is_file($dir . '/' . $file) && !in_array($dir . '/' . $file, $this->scanned_files)) {
                $this->scanned_files[] = $dir . '/' . $file;

                if (preg_match('/eval\((base64|eval|\$_|\$\$|\$[A-Za-z_0-9\{]*(\(|\{|\[))/i', Tools::file_get_contents($dir . '/' . $file))) {
                    $this->infs[] = $dir . '/' . $file;
                }
            } elseif (is_dir($dir . '/' . $file) && '.' != Tools::substr($file, 0, 1)) {
                $this->malwareScan($dir . '/' . $file);
            }
        }
    }

    /**
     * Check CVE-2018-19355.
     *
     * @return bool
     */
    public function checkCVE201819355()
    {
        return file_exists(_PS_MODULE_DIR_ . 'orderfiles/upload.php');
    }

    /**
     * Check CVE-2018-13784.
     *
     * @return bool
     */
    public function checkCVE201813784()
    {
        return version_compare(_PS_VERSION_, '1.7.3.4', '<');
    }

    /**
     * Check CVE-2019-11876.
     *
     * @return bool
     */
    public function checkCVE201911876()
    {
        return is_dir(_PS_ROOT_DIR_ . '/install');
    }

    /**
     * Check CVE-2019-13461.
     *
     * @return bool
     */
    public function checkCVE201913461()
    {
        return version_compare(_PS_VERSION_, '1.7.6.0', '<');
    }

    public function checkDisplayErrors()
    {
        if (ini_get('display_errors') == 'On' || ini_get('display_errors') == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Generate form that check system.
     *
     * @return array
     */
    public function checkSystem()
    {
        $helper_list = new HelperList();
        $helper_list->module = $this;
        $helper_list->title = $this->l('Scans your system for known security vulnerabilities and recommends options for increased protection');
        $helper_list->shopLinkType = '';
        $helper_list->no_link = true;
        $helper_list->show_toolbar = true;
        $helper_list->simple_header = false;
        $helper_list->currentIndex = $this->context->link->getAdminLink('AdminModules', false) . '&configure=' . $this->name;
        $helper_list->token = Tools::getAdminTokenLite('AdminModules');
        $check = '<i class="icon icon-check" style="color: green"></i>';
        $good = '--'; //$this->l('Awesome! Nothing has to be fixed.');
        $vulnerable = '<i class="icon icon-times" style="color: red"></i>';
        $fields_list = [
            'check' => [
                'title' => '<strong>' . $this->l('Check') . '</strong>',
                'search' => false,
                'float' => true,
            ],
            'status' => [
                'title' => '<strong>' . $this->l('Status') . '</strong>',
                'search' => false,
                'float' => true,
            ],
            'fix' => [
                'title' => '<strong>' . $this->l('How to fix') . '</strong>',
                'search' => false,
                'float' => true,
            ],
        ];
        $result = [
            [
                'check' => '<a href="https://nvd.nist.gov/vuln/detail/CVE-2019-13461" target="_blank">CVE-2019-13461</a>',
                'status' => $this->checkCVE201913461() ? $vulnerable : $check,
                'fix' => $this->checkCVE201913461() ? $this->l('Upgrade PrestaShop to latest version') : $good,
            ],
            [
                'check' => '<a href="https://nvd.nist.gov/vuln/detail/CVE-2019-11876" target="_blank">CVE-2019-11876</a>',
                'status' => $this->checkCVE201911876() ? $vulnerable : $check,
                'fix' => $this->checkCVE201911876() ? $this->l('Delete folder') . ': ' . _PS_ROOT_DIR_ . '/install' : $good, //fix
            ],
            [
                'check' => '<a href="https://nvd.nist.gov/vuln/detail/CVE-2018-19355" target="_blank">CVE-2018-19355</a>',
                'status' => $this->checkCVE201819355() ? $vulnerable : $check,
                'fix' => $this->checkCVE201819355() ? $this->l('Upgrade PrestaShop to latest version') : $good,
            ],
            [
                'check' => '<a href="https://nvd.nist.gov/vuln/detail/CVE-2018-19124" target="_blank">CVE-2018-19124</a>',
                '<a href="https://nvd.nist.gov/vuln/detail/CVE-2018-19125" target="_blank">CVE-2018-19125</a>, ' .
                '<a href="https://nvd.nist.gov/vuln/detail/CVE-2018-19126" target="_blank">CVE-2018-19126</a>',
                'status' => $this->checkCVE201819126() ? $vulnerable : $check,
                'fix' => $this->checkCVE201819126() ? $this->l('Set') . ' "phar.readonly = Off" ' . $this->l('in file') . ': ' . php_ini_loaded_file() : $good,
            ],
            [
                'check' => '<a href="https://nvd.nist.gov/vuln/detail/CVE-2018-13784" target="_blank">CVE-2018-13784</a>',
                'status' => $this->checkCVE201813784() ? $vulnerable : $check,
                'fix' => $this->checkCVE201813784() ? $this->l('Upgrade PrestaShop to latest version') : $good,
            ],
            [
                'check' => '<a href="https://nvd.nist.gov/vuln/detail/CVE-2018-8823" target="_blank">CVE-2018-8823</a>, ' .
                '<a href="https://nvd.nist.gov/vuln/detail/CVE-2018-8824" target="_blank">CVE-2018-8824</a>',
                'status' => $this->checkCVE20188824() ? $vulnerable : $check,
                'fix' => $this->checkCVE20188824() ? $this->l('Upgrade module: Responsive Mega Menu (Horizontal+Vertical+Dropdown) Pro') : $good,
            ],
            [
                'check' => '<a href="https://nvd.nist.gov/vuln/detail/CVE-2018-7491" target="_blank">CVE-2018-7491</a>',
                'status' => $this->checkCVE20187491() ? $vulnerable : $check,
                'fix' => $this->checkCVE20187491() ? $this->l('Enable "Click-jack protection" in "Secure FO" above') : $good,
            ],
            [
                'check' => '<a href="https://nvd.nist.gov/vuln/detail/CVE-2017-9841" target="_blank">CVE-2017-9841</a>',
                'status' => $this->checkCVE20179841() ? $vulnerable : $check,
                'fix' => $this->checkCVE20179841() ? $this->l('Delete phpunit folders') . ':<br>' . implode('<br>', $this->checkFilesCVE20179841()) : $good,
            ],
            [
                'check' => $this->l('PHP version') . ' (' . PHP_VERSION . ')',
                'status' => version_compare(PHP_VERSION, '7.1.0', '<=') ? $vulnerable : $check,
                'fix' => version_compare(PHP_VERSION, '7.1.0', '<=') ? $this->l('Update PHP to 7.1 or greater. Make sure your PrestaShop version') . ' (' . _PS_VERSION_ . ') ' . $this->l('is compatible with your PHP version.') : $good,
            ],
            [
                'check' => $this->l('PHP information leakage (version)'),
                'status' => ini_get('expose_php') ? $vulnerable : $check,
                'fix' => ini_get('expose_php') ? $this->l('Set') . ' "expose_php = Off" ' . $this->l('in file') . ': ' . php_ini_loaded_file() : $good,
            ],
            [
                'check' => $this->l('PHP information leakage (logs)'),
                'status' => $this->checkDisplayErrors() ? $vulnerable : $check,
                'fix' => $this->checkDisplayErrors() ? $this->l('Set') . ' "display_errors = Off" ' . $this->l('in file') . ': ' . php_ini_loaded_file() : $good,
            ],
            [
                'check' => $this->l('Secure cookies'),
                'status' => !ini_get('session.cookie_secure') ? $vulnerable : $check,
                'fix' => !ini_get('session.cookie_secure') ? $this->l('Set') . ' "session.cookie_secure = On" ' . $this->l('in file') . ': ' . php_ini_loaded_file() : $good,
            ],
            [
                'check' => $this->l('Cookie HTTP only'),
                'status' => !ini_get('session.cookie_httponly') ? $vulnerable : $check,
                'fix' => !ini_get('session.cookie_httponly') ? $this->l('Set') . ' "session.cookie_httponly = On" ' . $this->l('in file') . ': ' . php_ini_loaded_file() : $good,
            ],
            [
                'check' => $this->l('SSL enabled'),
                'status' => !Configuration::get('PS_SSL_ENABLED') ? $vulnerable : $check,
                'fix' => !Configuration::get('PS_SSL_ENABLED') ? $this->l('Enable SSL in') . ' <a href="' . $this->baseUrl() . $this->context->link->getAdminLink('AdminPreferences') . '" target="_blank">' . $this->l('"Shop Parameters" > "General"') . '</a>' : $good,
            ],
            [
                'check' => $this->l('SSL Enabled everywhere'),
                'status' => !Configuration::get('PS_SSL_ENABLED_EVERYWHERE') ? $vulnerable : $check,
                'fix' => !Configuration::get('PS_SSL_ENABLED_EVERYWHERE') ? $this->l('Enable SSL everywhere in') . ' <a href="' . $this->baseUrl() . $this->context->link->getAdminLink('AdminPreferences') . '" target="_blank">' . $this->l('"Shop Parameters" > "General"') . '</a>' : $good,
            ],
            [
                'check' => $this->l('PrestaShop token'),
                'status' => !Configuration::get('PS_TOKEN_ENABLE') ? $vulnerable : $check,
                'fix' => !Configuration::get('PS_TOKEN_ENABLE') ? $this->l('Enable Increase front office security in') . ' <a href="' . $this->baseUrl() . $this->context->link->getAdminLink('AdminPreferences') . '" target="_blank">' . $this->l('"Shop Parameters" > "General"') . '</a>' : $good,
            ],
            [
                'check' => 'mod_security',
                'status' => Configuration::get('PS_HTACCESS_DISABLE_MODSEC') ? $vulnerable : $check,
                'fix' => Configuration::get('PS_HTACCESS_DISABLE_MODSEC') ? $this->l('Enable Apache\'s mod_security module in') . ' <a href="' . $this->baseUrl() . $this->context->link->getAdminLink('AdminMeta') . '" target="_blank">' . $this->l('"Shop Parameters" > "Traffic and SEO"') . '</a>' : $good,
            ],
            [
                'check' => 'phpinfo.php',
                'status' => file_exists(_PS_ROOT_DIR_ . '/phpinfo.php') ? $vulnerable : $check,
                'fix' => file_exists(_PS_ROOT_DIR_ . '/phpinfo.php') ? $this->l('Remove file') . ': ' . _PS_ROOT_DIR_ . '/phpinfo.php' : $good,
            ],
            [
                'check' => 'phppsinfo.php',
                'status' => file_exists(_PS_ROOT_DIR_ . '/phppsinfo.php') ? $vulnerable : $check,
                'fix' => file_exists(_PS_ROOT_DIR_ . '/phppsinfo.php') ? $this->l('Remove file') . ': ' . _PS_ROOT_DIR_ . '/phppsinfo.php' : $good,
            ],
            [
                'check' => 'robots.txt',
                'status' => !file_exists(_PS_ROOT_DIR_ . '/robots.txt') ? $vulnerable : $check,
                'fix' => !file_exists(_PS_ROOT_DIR_ . '/robots.txt') ? $this->l('Generate robots.txt') . ' <a href="' . $this->baseUrl() . $this->context->link->getAdminLink('AdminMeta') . '" target="_blank">' . $this->l('"Shop Parameters" > "General"') . '</a>' : $good,
            ],
            [
                'check' => 'PrestaShop admin directory name',
                'status' => !preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', basename(PS_ADMIN_DIR)) ? $vulnerable : $check,
                'fix' => !preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', basename(PS_ADMIN_DIR)) ? $this->l('Use both letters and numbers in admin directory name') : $good,
            ],
            [
                'check' => $this->l('Database table prefix'),
                'status' => _DB_PREFIX_ === 'ps_' ? $vulnerable : $check,
                'fix' => _DB_PREFIX_ === 'ps_' ? $this->l('Avoid using') . ' "ps_" ' . $this->l('as table prefix') : $good,
            ],
            [
                'check' => $this->l('PrestaShop debug mode'),
                'status' => _PS_MODE_DEV_ ? $vulnerable : $check,
                'fix' => _PS_MODE_DEV_ ? $this->l('Disable debug mode in') . ' <a href="' . $this->baseUrl() . $this->context->link->getAdminLink('AdminPerformance') . '" target="_blank">' . $this->l('"Advanced Parameters" > "Performance"') . '</a>' : $good,
            ],
        ];

        return $helper_list->generateList($result, $fields_list);
    }

    public function getShopUrl()
    {
        if (Language::countActiveLanguages() > 1) {
            return $this->context->link->getBaseLink() . $this->context->language->iso_code . '/';
        } else {
            return $this->context->link->getBaseLink();
        }
    }

    /**
     * Generate helper and forms.
     *
     * @return array
     */
    protected function renderForm()
    {
        $helper = new HelperForm();
        $helper->show_toolbar = 0;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitSecurityProModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', 0) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = [
            'fields_value' => $this->getConfigFormValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        ];

        return $helper->generateForm([
            $this->fieldsForm(),
            $this->fieldsForm2(),
            $this->fieldsForm3(),
        ]);
    }

    /**
     * Build forms.
     */
    protected function fieldsForm2()
    {
        return [
            'form' => [
                'legend' => [
                    'title' => $this->l('Admin directory'),
                ],
                'input' => [
                    [
                        'type' => 'switch',
                        'label' => $this->l('Are you sure, you want to change name of admin directory?'),
                        'name' => 'PRO_ADMIN_DIRECTORY',
                        'is_bool' => 1,
                        'desc' => $this->l('You will be redirected to the new URL once you click "save" if this is set to "yes".'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'col' => 5,
                        'type' => 'text',
                        'prefix' => $this->context->link->getBaseLink(),
                        'desc' => $this->l('Your admin directory name should include both letters and numbers. Make it hard to guess; don\'t use "admin123".') . ' <a  onclick="add_field2()" href ="javascript:void(0)">Generate secure directory name</a>',
                        'name' => 'PRO_ADMIN_DIRECTORY_NAME',
                        'label' => $this->l('Directory name'),
                        'hint' => $this->l('Accepted character:') . ' "a-z A-Z 0-9 _ . -"',
                    ],
                ],
                'submit' => [
                    'title' => $this->l('Save'),
                ],
            ],
        ];
    }

    /**
     * Build forms.
     */
    protected function fieldsForm3()
    {
        return [
            'form' => [
                'legend' => [
                    'title' => $this->l('Password generator'),
                ],
                'description' => $this->l('You should use a strong and unique password for each of: MySQL database, ftp, hosting panel/cpanel, ssh access and back office. You can use this tool to generate the passwords.'),
                'input' => [
                    [
                        'col' => 4,
                        'type' => 'textbutton',
                        'label' => $this->l('Generate strong password'),
                        'desc' => $this->l('The password is not saved anywhere by this module.'),
                        'name' => 'PRO_PASSWORD_GENERATOR',
                        'button' => [
                            'label' => 'Generate',
                            'attributes' => [
                                'onclick' => 'add_field();',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Build forms.
     */
    protected function fieldsForm()
    {
        if (Configuration::get('PS_SSL_ENABLED_EVERYWHERE')) {
            $disabled_ssl = 0;
        } else {
            $disabled_ssl = 1;
        }

        return [
            'form' => [
                'legend' => [
                    'title' => $this->l('Security settings'),
                ],
                'tabs' => [
                    'protectBackOffice' => '<i class="icon-lock"></i> ' . $this->l('Protect BO'),
                    'secondLogin' => '<i class="icon icon-sign-in"></i> ' . $this->l('Second login'),
                    'secureFrontOffice' => '<i class="icon icon-shield"></i> ' . $this->l('Secure FO'),
                    'blockIps' => '<i class="icon icon-ban"></i> ' . $this->l('Block IP\'s'),
                    'permissions' => '<i class="icon icon-file-o"></i> ' . $this->l('Permissions'),
                    'index' => '<i class="icon icon-sitemap"></i> ' . $this->l('Index'),
                    'fileChanges' => '<i class="icon icon-files-o"></i> ' . $this->l('File changes'),
                    'malwareScan' => '<i class="icon icon-search"></i> ' . $this->l('Scan for malware'),
                    'protectContent' => '<i class="icon icon-hand-o-up"></i> ' . $this->l('Protect content'),
                    'antiFlood' => '<i class="icon icon-repeat"></i> ' . $this->l('Anti-flood'),
                ],
                'input' => [
                    [
                        'tab' => 'protectBackOffice',
                        'type' => 'switch',
                        'label' => $this->l('Activate brute force protection'),
                        'name' => 'PRO_FAIL2BAN',
                        'is_bool' => 1,
                        'desc' => $this->l('Protects BO login-form against brute force attacks.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'col' => 2,
                        'tab' => 'protectBackOffice',
                        'type' => 'text',
                        'desc' => $this->l('Time a host is banned. Enter time in minutes.'),
                        'name' => 'PRO_BAN_TIME',
                        'prefix' => '<i class="icon icon-clock-o"></i>',
                        'suffix' => $this->l('minutes'),
                        'label' => $this->l('Ban time'),
                        'hint' => $this->l('Must be an integer'),
                    ],
                    [
                        'col' => 2,
                        'tab' => 'protectBackOffice',
                        'type' => 'text',
                        'desc' => $this->l('A host is banned if it has generated "max retry" during the last "find time". Enter time in minutes.'),
                        'name' => 'PRO_FIND_TIME',
                        'prefix' => '<i class="icon icon-clock-o"></i>',
                        'suffix' => $this->l('minutes'),
                        'label' => $this->l('Find time'),
                        'hint' => $this->l('Must be an integer'),
                    ],
                    [
                        'col' => 2,
                        'tab' => 'protectBackOffice',
                        'type' => 'text',
                        'desc' => $this->l('Wrong answers before ban.'),
                        'name' => 'PRO_MAX_RETRY',
                        'prefix' => '<i class="icon icon-repeat"></i>',
                        'suffix' => $this->l('times'),
                        'label' => $this->l('Max retry'),
                        'hint' => $this->l('Must be an integer'),
                    ],
                    [
                        'tab' => 'protectBackOffice',
                        'type' => 'switch',
                        'label' => $this->l('Receive e-mail'),
                        'name' => 'PRO_SEND_MAIL',
                        'is_bool' => 1,
                        'desc' => $this->l('Receive an e-mail in case someone writes a wrong password. This setting can only be on if the whole function is activated.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'col' => 5,
                        'tab' => 'protectBackOffice',
                        'type' => 'text',
                        'desc' => $this->l('Enter the e-mail witch you would like to be notified at.'),
                        'name' => 'PRO_FAIL2BAN_EMAIL',
                        'prefix' => '<i class="icon icon-envelope"></i>',
                        'label' => $this->l('E-mail'),
                        'hint' => $this->l('Must be a valid e-mail address'),
                    ],
                    [
                        'tab' => 'protectBackOffice',
                        'type' => 'textarea',
                        'col' => 5,
                        'desc' => $this->l('Here you can list your own IP\'s to avoid getting an e-mail if you write the password wrong. You can still get banned for a period of time if you fail to login according to your own rules above. Separate IP\'s by comma (\',\').'),
                        'name' => 'PRO_WHITELIST_IPS',
                        'label' => $this->l('Whitelist IP\'s'),
                        'hint' => $this->l('E.g.') . ' 192.168.1.1,192.168.1.2,192.168.1.3',
                    ],
                    [
                        'tab' => 'secureFrontOffice',
                        'type' => 'switch',
                        'label' => $this->l(
                            'Click-jack protection'
                        ),
                        'name' => 'PRO_CLICK_JACKING',
                        'is_bool' => 1,
                        'desc' => $this->l('Prevent browsers from framing your site. This will defend you against attacks like click-jacking.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'secureFrontOffice',
                        'type' => 'switch',
                        'label' => $this->l('XSS protection'),
                        'name' => 'PRO_X_XSS_PPROTECTION',
                        'is_bool' => 1,
                        'desc' => $this->l('Sets the configuration for the cross-site scripting filters built into most browsers.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'secureFrontOffice',
                        'type' => 'switch',
                        'label' => $this->l('Disable content sniffing'),
                        'name' => 'PRO_X_CONTENT_TYPE_OPTIONS',
                        'is_bool' => 0,
                        'desc' => $this->l('Stop browsers from trying to MIME-sniff the content type and forces it to stick with the declared content-type.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'secureFrontOffice',
                        'type' => 'switch',
                        'label' => $this->l('Force secure connection with HSTS'),
                        'name' => 'PRO_STRICT_TRANSPORT_SECURITY',
                        'is_bool' => 1,
                        'desc' => $this->l('Strengthens your implementation of TLS by getting the User Agent to enforce the use of HTTPS.'),
                        'disabled' => $disabled_ssl,
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'secureFrontOffice',
                        'type' => 'checkbox',
                        'desc' => $this->l('Please follow this link to understand these settings: ') . '<a href="https://hstspreload.org/?domain=' . $this->getShopUrl() . '" target="_blank" rel="noopener noreferrer"> https://hstspreload.org/?domain=' . $this->getShopUrl() . '</a>',
                        'label' => $this->l('HSTS settings'),
                        'name' => 'PRO_HSTS_SETTINGS',
                        'values' => [
                            'query' => [
                                [
                                    'id_option' => '0',
                                    'name' => 'Preload',
                                    'value' => 0,
                                ],
                                [
                                    'id_option' => '1',
                                    'name' => 'Include subdomains',
                                    'value' => 1,
                                ],
                            ],
                            'id' => 'id_option',
                            'name' => 'name',
                            'value' => 'value',
                        ],
                    ],
                    [
                        'tab' => 'secureFrontOffice',
                        'type' => 'switch',
                        'label' => $this->l('Expect CT'),
                        'name' => 'PRO_EXPECT_CT',
                        'is_bool' => 1,
                        'desc' => $this->l('Enforce your CT policy.'),
                        'disabled' => $disabled_ssl,
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'secureFrontOffice',
                        'type' => 'switch',
                        'label' => $this->l('Referrer policy'),
                        'name' => 'PRO_REFFERER_POLICY',
                        'is_bool' => 1,
                        'desc' => $this->l('The browser will only set the referrer header on requests to the same origin. If the destination is another origin then no referrer information will be sent.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'secondLogin',
                        'type' => 'switch',
                        'label' => $this->l('Activate second login for your BO'),
                        'name' => 'PRO_HTPASSWD',
                        'is_bool' => 1,
                        'desc' => $this->l('Protects your BO area with .htpasswd (Apache-servers only).'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'col' => 5,
                        'tab' => 'secondLogin',
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-user"></i>',
                        'desc' => $this->l('You should use another username than you do for your regular BO login.') . ' <a  onclick="add_field3()" href ="javascript:void(0)">Generate secure username</a>',
                        'name' => 'PRO_HTPASSWD_USER',
                        'label' => $this->l('Username'),
                        'hint' => $this->l('Invalid character') . ': ":"',
                    ],
                    [
                        'col' => 5,
                        'tab' => 'secondLogin',
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-key"></i>',
                        'desc' => $this->l('You should use another password than you do for your regular BO login.') . ' <a  onclick="add_field4()" href ="javascript:void(0)">Generate secure password</a>',
                        'name' => 'PRO_HTPASSWD_PASS',
                        'label' => $this->l('Password'),
                        'hint' => $this->l('Invalid character:') . ' ":"',
                    ],
                    [
                        'tab' => 'blockIps',
                        'type' => 'switch',
                        'col' => 5,
                        'label' => $this->l('Block custom list of IP\'s'),
                        'name' => 'PRO_BAN_IP_ACTIVATE',
                        'is_bool' => 1,
                        'desc' => $this->l('Block users with below IP\'s from your website.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'blockIps',
                        'type' => 'textarea',
                        'col' => 5,
                        'desc' => $this->l('List all IP\'s you want to block from your website. Separate IP\'s by comma (\',\').'),
                        'name' => 'PRO_BAN_IP',
                        'label' => $this->l('Custom list of IP\'s'),
                        'hint' => 'E.g. 192.168.1.1,192.168.1.2,192.168.1.3',
                    ],
                    [
                        'tab' => 'fileChanges',
                        'type' => 'switch',
                        'col' => 3,
                        'label' => $this->l('Get an e-mail notification if files have changed'),
                        'name' => 'PRO_FILE_CHANGES',
                        'is_bool' => 1,
                        'desc' => $this->l('This function tracks every file change on your server and let you know by e-mail if something changes. Once this option is on, you will get a link you can set up as a cron job.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'fileChanges',
                        'type' => 'textarea',
                        'col' => 5,
                        'desc' => $this->l('Whitelist dynamic files. Separate files by comma (\',\').'),
                        'name' => 'PRO_FILE_CHANGES_WHITELIST',
                        'label' => $this->l('Whitelist filter'),
                        'hint' => $this->l('E.g.') . ' file.json,file.xml',
                    ],
                    [
                        'col' => 5,
                        'tab' => 'fileChanges',
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-envelope"></i>',
                        'desc' => $this->l('Enter the e-mail witch you would like to be notified at.'),
                        'name' => 'PRO_FILE_CHANGES_EMAIL',
                        'label' => $this->l('E-mail'),
                        'hint' => $this->l('Need to be a valid email address'),
                    ],
                    [
                        'tab' => 'malwareScan',
                        'type' => 'switch',
                        'label' => $this->l('Get an e-mail notification if any infected file was found'),
                        'name' => 'PRO_MALWARE_SCAN',
                        'is_bool' => 1,
                        'desc' => $this->l('This function scans all your directories for malicious code. Once this option is on, you will get a link you can set up as a cron job.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'malwareScan',
                        'type' => 'textarea',
                        'col' => 5,
                        'desc' => $this->l('Whitelist false positives, caused by custom modules etc. Separate files by comma (\',\').'),
                        'name' => 'PRO_WHITELIST_MALWARE',
                        'label' => $this->l('Whitelist filter'),
                        'hint' => $this->l('E.g.') . ' file.js,file.php',
                    ],
                    [
                        'col' => 5,
                        'tab' => 'malwareScan',
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-envelope"></i>',
                        'desc' => $this->l('Enter the e-mail witch you would like to be notified at.'),
                        'name' => 'PRO_MALWARE_SCAN_EMAIL',
                        'label' => $this->l('E-mail'),
                        'hint' => $this->l('Need to be a valid email address'),
                    ],
                    [
                        'tab' => 'protectContent',
                        'type' => 'switch',
                        'label' => $this->l('Disable right click'),
                        'name' => 'PRO_DISABLE_RIGHT_CLICK',
                        'is_bool' => 1,
                        'desc' => $this->l('Disable right click mouse event.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'protectContent',
                        'type' => 'switch',
                        'label' => $this->l('Disable drag and drop'),
                        'name' => 'PRO_DISABLE_DRAG',
                        'is_bool' => 1,
                        'desc' => $this->l('Disable drag and drop mouse event.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'protectContent',
                        'type' => 'switch',
                        'label' => $this->l('Disable copy'),
                        'name' => 'PRO_DISABLE_COPY',
                        'is_bool' => 1,
                        'desc' => $this->l('Disable copy (E.g. Ctrl + C / ⌘ + C).'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'protectContent',
                        'type' => 'switch',
                        'label' => $this->l('Disable cut'),
                        'name' => 'PRO_DISABLE_CUT',
                        'is_bool' => 1,
                        'desc' => $this->l('Disable cut (E.g. Ctrl + X / ⌘ + X).'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'protectContent',
                        'type' => 'switch',
                        'label' => $this->l('Disable paste'),
                        'name' => 'PRO_DISABLE_PASTE',
                        'is_bool' => 1,
                        'desc' => $this->l('Disable paste (E.g. Ctrl + V / ⌘ + V).'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'protectContent',
                        'type' => 'switch',
                        'label' => $this->l('Disable text selection'),
                        'name' => 'PRO_DISABLE_TEXT_SELECTION',
                        'is_bool' => 1,
                        'desc' => $this->l('Disable text selection.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'tab' => 'antiFlood',
                        'type' => 'switch',
                        'col' => 3,
                        'label' => $this->l('Activate anti-flood'),
                        'name' => 'PRO_ANTI_FLOOD',
                        'is_bool' => 1,
                        'desc' => $this->l('Anti-flood script that does not need cookies. This script is great for preventing most DDoS attacks and automatic multiple requests. Keep in mind that crawlers could potentially be blocked too. Enable this feature if you are under an attack only.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'col' => 2,
                        'tab' => 'antiFlood',
                        'type' => 'text',
                        'suffix' => $this->l('requests'),
                        'prefix' => '<i class="icon icon-repeat"></i>',
                        'desc' => $this->l('Number of allowed page requests for the user.'),
                        'name' => 'PRO_ANTI_MAX_REQUESTS',
                        'label' => $this->l('Max requests'),
                        'hint' => $this->l('Must be an integer'),
                    ],
                    [
                        'col' => 2,
                        'tab' => 'antiFlood',
                        'type' => 'text',
                        'suffix' => $this->l('seconds'),
                        'prefix' => '<i class="icon icon-clock-o"></i>',
                        'desc' => $this->l('Time interval to start counting page requests.'),
                        'name' => 'PRO_ANTI_REQ_TIMEOUT',
                        'label' => $this->l('Req timeout'),
                        'hint' => $this->l('Must be an integer'),
                    ],
                    [
                        'col' => 2,
                        'tab' => 'antiFlood',
                        'type' => 'text',
                        'suffix' => $this->l('seconds'),
                        'prefix' => '<i class="icon icon-clock-o"></i>',
                        'desc' => $this->l('Time to punish the user who has exceeded in doing requests.'),
                        'name' => 'PRO_ANTI_BAN_TIME',
                        'label' => $this->l('Ban time'),
                        'hint' => $this->l('Must be an integer'),
                    ],
                ],
                'submit' => [
                    'title' => $this->l('Save'),
                ],
            ],
        ];
    }

    /**
     * Configure form values.
     */
    protected function getConfigFormValues()
    {
        return [
            'PRO_CLICK_JACKING' => Configuration::get('PRO_CLICK_JACKING'),
            'PRO_X_XSS_PPROTECTION' => Configuration::get('PRO_X_XSS_PPROTECTION'),
            'PRO_X_CONTENT_TYPE_OPTIONS' => Configuration::get('PRO_X_CONTENT_TYPE_OPTIONS'),
            'PRO_STRICT_TRANSPORT_SECURITY' => Configuration::get('PRO_STRICT_TRANSPORT_SECURITY'),
            'PRO_HSTS_SETTINGS_0' => Configuration::get('PRO_HSTS_SETTINGS_0'),
            'PRO_HSTS_SETTINGS_1' => Configuration::get('PRO_HSTS_SETTINGS_1'),
            'PRO_EXPECT_CT' => Configuration::get('PRO_EXPECT_CT'),
            'PRO_REFFERER_POLICY' => Configuration::get('PRO_REFFERER_POLICY'),
            'PRO_HTPASSWD' => Configuration::get('PRO_HTPASSWD'),
            'PRO_HTPASSWD_USER' => Configuration::get('PRO_HTPASSWD_USER'),
            'PRO_HTPASSWD_PASS' => Configuration::get('PRO_HTPASSWD_PASS'),
            'PRO_BAN_IP' => Configuration::get('PRO_BAN_IP'),
            'PRO_BAN_IP_ACTIVATE' => Configuration::get('PRO_BAN_IP_ACTIVATE'),
            'PRO_FAIL2BAN' => Configuration::get('PRO_FAIL2BAN'),
            'PRO_FAIL2BAN_EMAIL' => Configuration::get('PRO_FAIL2BAN_EMAIL'),
            'PRO_BAN_TIME' => Configuration::get('PRO_BAN_TIME'),
            'PRO_MAX_RETRY' => Configuration::get('PRO_MAX_RETRY'),
            'PRO_FIND_TIME' => Configuration::get('PRO_FIND_TIME'),
            'PRO_SEND_MAIL' => Configuration::get('PRO_SEND_MAIL'),
            'PRO_WHITELIST_IPS' => Configuration::get('PRO_WHITELIST_IPS'),
            'PRO_FILE_CHANGES' => Configuration::get('PRO_FILE_CHANGES'),
            'PRO_FILE_CHANGES_WHITELIST' => Configuration::get('PRO_FILE_CHANGES_WHITELIST'),
            'PRO_FILE_CHANGES_EMAIL' => Configuration::get('PRO_FILE_CHANGES_EMAIL'),
            'PRO_MALWARE_SCAN' => Configuration::get('PRO_MALWARE_SCAN'),
            'PRO_WHITELIST_MALWARE' => Configuration::get('PRO_WHITELIST_MALWARE'),
            'PRO_MALWARE_SCAN_EMAIL' => Configuration::get('PRO_MALWARE_SCAN_EMAIL'),
            'PRO_DISABLE_RIGHT_CLICK' => Configuration::get('PRO_DISABLE_RIGHT_CLICK'),
            'PRO_DISABLE_DRAG' => Configuration::get('PRO_DISABLE_DRAG'),
            'PRO_DISABLE_COPY' => Configuration::get('PRO_DISABLE_COPY'),
            'PRO_DISABLE_CUT' => Configuration::get('PRO_DISABLE_CUT'),
            'PRO_DISABLE_PASTE' => Configuration::get('PRO_DISABLE_PASTE'),
            'PRO_DISABLE_TEXT_SELECTION' => Configuration::get('PRO_DISABLE_TEXT_SELECTION'),
            'PRO_ADMIN_DIRECTORY' => Configuration::get('PRO_ADMIN_DIRECTORY'),
            'PRO_ADMIN_DIRECTORY_NAME' => Configuration::get('PRO_ADMIN_DIRECTORY_NAME'),
            'PRO_ANTI_FLOOD' => Configuration::get('PRO_ANTI_FLOOD'),
            'PRO_ANTI_MAX_REQUESTS' => Configuration::get('PRO_ANTI_MAX_REQUESTS'),
            'PRO_ANTI_REQ_TIMEOUT' => Configuration::get('PRO_ANTI_REQ_TIMEOUT'),
            'PRO_ANTI_BAN_TIME' => Configuration::get('PRO_ANTI_BAN_TIME'),
            'PRO_PASSWORD_GENERATOR' => Configuration::get('PRO_PASSWORD_GENERATOR'),
        ];
    }

    /**
     * Post configure form values.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    /**
     * Reset in case of error.
     */
    private function onErrorHtpasswd()
    {
        Configuration::updateValue('PRO_HTPASSWD', 0);

        if (file_exists(_PS_ADMIN_DIR_ . '/.htpasswd')) {
            unlink(_PS_ADMIN_DIR_ . '/.htpasswd');
        }

        if (file_exists(_PS_ADMIN_DIR_ . '/.htaccess')) {
            $this->removeHtaccessContent(_PS_ADMIN_DIR_ . '/.htaccess');
        }
    }

    /**
     * Return base URL.
     *
     * @return string
     */
    private function baseUrl()
    {
        if (Configuration::get('PS_SSL_ENABLED')) {
            return _PS_BASE_URL_SSL_;
        } else {
            return _PS_BASE_URL_;
        }
    }

    /**
     * Return base URL.
     *
     * @return string
     */
    private function currenURL()
    {
        if (Configuration::get('PS_SSL_ENABLED')) {
            return 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        } else {
            return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        }
    }

    /**
     * Add missing index.php files.
     *
     * @param string $path
     */
    private function addIndexRecursively($path)
    {
        if (0 === strpos(basename($path), '.')) {
            return;
        }

        $indexFilePath = $path . DIRECTORY_SEPARATOR . 'index.php';

        if (false === file_exists($indexFilePath)) {
            copy(_PS_MODULE_DIR_ . $this->name . '/views/templates/admin/index.php', $path . DIRECTORY_SEPARATOR . 'index.php');
            chmod($path . DIRECTORY_SEPARATOR . 'index.php', 0644);
        }

        $dirs = glob($path . DIRECTORY_SEPARATOR . '*', GLOB_ONLYDIR);

        if (false === $dirs) {
            return;
        }

        foreach ($dirs as $dir) {
            $this->addIndexRecursively($dir);
        }
    }

    /**
     * change file- and directory permissions.
     *
     * @param string $dir
     */
    private function chmodFileDirectory($dir)
    {
        $perms = [];
        $perms['file'] = 0644;
        $perms['directory'] = 0755;
        $error_dir = null;
        $error_file = null;
        $dh = @opendir($dir);

        if ($dh) {
            while (false !== ($file = readdir($dh))) {
                if ('.' !== $file && '..' !== $file) {
                    $fullpath = $dir . '/' . $file;

                    if (!is_dir($fullpath)) {
                        if (!chmod($fullpath, $perms['file'])) {
                            $error_file .= '<strong>' . $this->l('Failed') . '</strong> ' . $this->l('to set file permissions on') . ' ' . $fullpath . PHP_EOL;
                        }
                    } else {
                        if (chmod($fullpath, $perms['directory'])) {
                            $this->chmodFileDirectory($fullpath);
                        } else {
                            $error_dir .= '<strong>' . $this->l('Failed') . '</strong> ' . $this->l('to set directory permissions on') . ' ' . $fullpath . PHP_EOL;
                        }
                    }
                }
            }
            closedir($dh);
        }
    }

    /**
     * Secure back office with rules in .htaccess.
     */
    private function secureBackOffice()
    {
        if (Configuration::get('PRO_HTPASSWD')) {
            $username = Configuration::get('PRO_HTPASSWD_USER');
            $password = Configuration::get('PRO_HTPASSWD_PASS');

            if ($this->checkName($username) && $this->checkName($password)) {
                $security_pro_starts = '# ~security_pro~';
                $current = PHP_EOL;
                $current .= '<IfModule mod_authn_file.c>' . PHP_EOL . '    AuthType Basic' . PHP_EOL . '    AuthName "Protected Place"' . PHP_EOL . '    AuthBasicProvider file' . PHP_EOL . '    AuthUserFile "' . _PS_ADMIN_DIR_ . '/.htpasswd ' . PHP_EOL . '    Require valid-user' . PHP_EOL . '</IfModule>' . PHP_EOL . PHP_EOL . '<IfModule mod_auth.c>' . PHP_EOL . '    AuthType Basic' . PHP_EOL . '    AuthName "Protected Place"' . PHP_EOL . '    AuthUserFile "' . _PS_ADMIN_DIR_ . '/.htpasswd ' . PHP_EOL . '    Require valid-user' . PHP_EOL . '</IfModule>' . PHP_EOL;
                $encrypted_password = $this->cryptApr1Md5($password);
                $text = $username . ':' . $encrypted_password;
                $fp = fopen(_PS_ADMIN_DIR_ . '/.htpasswd', 'wb');
                fwrite($fp, $text);
                fclose($fp);
                $security_pro_ends = '# ~security_pro_end~';

                $htaccess_content = Tools::file_get_contents(_PS_ADMIN_DIR_ . '/.htaccess');
            }
            $content_to_add = $security_pro_starts . PHP_EOL . $current . PHP_EOL . $security_pro_ends;

            if (preg_match('/\# ~security_pro~(.*?)\# ~security_pro_end~/s', $htaccess_content, $m)) {
                $content_to_remove = $m[0];
                $htaccess_content = str_replace($content_to_remove, $content_to_add, $htaccess_content);
            } else {
                $htaccess_content = $htaccess_content . PHP_EOL . PHP_EOL . $content_to_add;
            }
            file_put_contents(_PS_ADMIN_DIR_ . '/.htaccess', $htaccess_content);
        } else {
            if (file_exists(_PS_ADMIN_DIR_ . '/.htpasswd')) {
                unlink(_PS_ADMIN_DIR_ . '/.htpasswd');

                $this->removeHtaccessContent(_PS_ADMIN_DIR_ . '/.htaccess');
            }
        }
    }

    /**
     * Remove generated content from .htaccess file.
     *
     * @param string $path
     */
    private function removeHtaccessContent($path)
    {
        $htaccess_content = Tools::file_get_contents($path);

        if (preg_match('/\# ~security_pro~(.*?)\# ~security_pro_end~/s', $htaccess_content, $m)) {
            $content_to_remove = $m[0];
            $htaccess_content = str_replace($content_to_remove, '', $htaccess_content);
        }
        file_put_contents($path, $htaccess_content);
    }

    /**
     * Encrypt password for .htpasswd.
     *
     * @param string $plainpasswd
     *
     * @return string
     */
    private function cryptApr1Md5($plainpasswd)
    {
        $tmp = null;
        $salt = Tools::substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 8);
        $len = Tools::strlen($plainpasswd);
        $text = $plainpasswd . '$apr1$' . $salt;
        $bin = pack('H32', md5($plainpasswd . $salt . $plainpasswd));

        for ($i = $len; $i > 0; $i -= 16) {
            $text .= substr($bin, 0, min(16, $i));
        }

        for ($i = $len; $i > 0; $i >>= 1) {
            $text .= ($i & 1) ? chr(0) : $plainpasswd[0];
        }
        $bin = pack('H32', md5($text));

        for ($i = 0; $i < 1000; ++$i) {
            $new = ($i & 1) ? $plainpasswd : $bin;

            if ($i % 3) {
                $new .= $salt;
            }

            if ($i % 7) {
                $new .= $plainpasswd;
            }
            $new .= ($i & 1) ? $bin : $plainpasswd;
            $bin = pack('H32', md5($new));
        }

        for ($i = 0; $i < 5; ++$i) {
            $k = $i + 6;
            $j = $i + 12;

            if (16 == $j) {
                $j = 5;
            }
            $tmp = $bin[$i] . $bin[$k] . $bin[$j] . $tmp;
        }
        $tmp = chr(0) . chr(0) . $bin[11] . $tmp;
        $tmp = strtr(strrev(Tools::substr(base64_encode($tmp), 2)), 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/', './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');

        return '$apr1$' . $salt . '$' . $tmp;
    }

    /**
     * Validate input name.
     *
     * @param string $name
     *
     * @return string
     */
    private function checkName($name)
    {
        return empty($name) || preg_match('/^[^:]*$/ui', $name);
    }

    /**
     * Block custom list of IP's.
     */
    private function blockIp()
    {
        $deny = explode(',', preg_replace('/\s+/', '', Configuration::get('PRO_BAN_IP')));

        if (in_array($_SERVER['REMOTE_ADDR'], $deny)) {
            header('HTTP/1.1 403 Forbidden');
            die;
        }
    }

    /**
     * Check if IP is whitelisted.
     *
     * @param string $ip
     *
     * @return bool
     */
    private function whiteList($ip)
    {
        $allow = explode(',', preg_replace('/\s+/', '', $ip));

        if (in_array($_SERVER['REMOTE_ADDR'], $allow)) {
            return 1;
        }
    }

    /**
     * Ban user.
     */
    private function ban()
    {
        $this->context->employee->logout();

        die('Banned');
    }

    /**
     * Lookup ban time for specific e-mail in database.
     *
     * @param string $email
     *
     * @return int
     */
    private function getBanTime($email)
    {
        $sql = new DbQuery();
        $sql->select('MAX(access_time) AS access_time');
        $sql->from('securitypro');
        $sql->where('banned = 1');
        $sql->where(sprintf('email = "%s"', pSQL($email)));
        $sqlResult = Db::getInstance()->executeS($sql);

        return $sqlResult ? strtotime($sql) : 0;
    }

    /**
     * Lookup eldest access try by specific e-mail in database.
     *
     * @param string $email
     *
     * @return int
     */
    private function getEldestAccessTry($email)
    {
        $maxRetry = (int) ConfigurationCore::get('PRO_MAX_RETRY');
        $email = pSQL($email);
        $query = 'SELECT IF(COUNT(*) = ' . $maxRetry . ', MIN(access_time), \'0000-00-00 00:00:00\') AS access_time FROM (SELECT access_time FROM ' . _DB_PREFIX_ . 'securitypro WHERE banned = 0 AND email = "' . $email . '" ORDER BY access_time DESC LIMIT ' . $maxRetry . ') tmp';
        $accessStats = Db::getInstance()->getRow($query);

        return $accessStats ? strtotime($accessStats['access_time']) : 0;
    }

    /**
     * Check CVE-2018-7491.
     *
     * @return bool
     */
    private function checkCVE20187491()
    {
        if (Language::countActiveLanguages() > 1) {
            $url = $this->context->link->getBaseLink() . '/' . $this->context->language->iso_code . '/';
        } else {
            $url = $this->context->link->getBaseLink();
        }

        $headers = @get_headers($url, 1);

        if ('sameorigin' === is_array(Tools::strtolower(!empty($headers['X-Frame-Options']) ? $headers['X-Frame-Options'] : '')) ||
            'sameorigin' === Tools::strtolower(!empty($headers['X-Frame-Options']) ? $headers['X-Frame-Options'] : '') ||
            Configuration::get('PRO_CLICK_JACKING')) {
            return 0;
        }

        return 1;
    }

    /**
     * Check CVE-2018-19126.
     *
     * @return bool
     */
    private function checkCVE201819126()
    {
        if (version_compare(_PS_VERSION_, '1.7.4.4', '<')) {
            if (extension_loaded('phar') &&
                0 == ini_get('phar.readonly')) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    /**
     * Check CVE-2018-8824.
     *
     * @return bool
     */
    private function checkCVE20188824()
    {
        if (file_exists(_PS_MODULE_DIR_ . 'bamegamenu/ajax_phpcode.php')) {
            $moduleVersion = Module::getInstanceByName('bamegamenu')->version;

            if (null !== $moduleVersion) {
                if (version_compare($moduleVersion, '1.0.32', '<=')) {
                    return 1;
                } else {
                    return 0;
                }
            }
        }
    }

    /**
     * Check CVE-2017-9841.
     *
     * @return bool
     */
    private function checkCVE20179841()
    {
        if (count($this->checkFilesCVE20179841()) > 0) {
            return true;
        }
    }

    private function checkFilesCVE20179841()
    {
        $result = [];

        $root_path = _PS_CORE_DIR_ . '/vendor/phpunit';
        if (is_dir($root_path)) {
            $result[] .= $root_path;
        }

        $module_path = _PS_MODULE_DIR_;

        $iter = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($module_path, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST,
            RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied"
        );

        $paths = [$module_path];
        foreach ($iter as $path => $dir) {
            if ($dir->isDir()) {
                $paths[] = $path;
                if ($dir->getFilename() === 'phpunit') {
                    $result[] .= $dir->getRealpath();
                }
            }
        }

        return $result;
    }
}
