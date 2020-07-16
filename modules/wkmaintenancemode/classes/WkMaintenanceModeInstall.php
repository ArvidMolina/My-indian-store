<?php
/**
* 2010-2019 Webkul.
*
* NOTICE OF LICENSE
*
* All right is reserved,
* Please go through this link for complete license : https://store.webkul.com/license.html
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future. If you wish to customize this module for your
* needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
*
*  @author    Webkul IN <support@webkul.com>
*  @copyright 2010-2019 Webkul IN
*  @license   https://store.webkul.com/license.html
*/

class WkMaintenanceModeInstall
{
    /**
     * function to create database table.
     */
    public function createTables()
    {
        $success = true;
        $databaseInstance = Db::getInstance();
        if ($tableQueries = $this->getTableQueries()) {
            foreach ($tableQueries as $query) {
                $success &= $databaseInstance->execute(trim($query));
            }
        }
        return $success;
    }

    /**
     * get the array of all table sql queries
     */
    private function getTableQueries()
    {
        return array("CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."wk_maintenance` (
          `id_wk_maintenance` int(10) unsigned NOT NULL auto_increment,
          `image` varchar(255) DEFAULT NULL,
          `text_color` varchar(255) DEFAULT NULL,
          `page_layout` varchar(255) DEFAULT NULL,
          `facebook_link` text DEFAULT NULL,
          `twitter_link` text DEFAULT NULL,
          `googleplus_link` text DEFAULT NULL,
          `instagram_link` text DEFAULT NULL,
          `timer` tinyint(1) unsigned NOT NULL DEFAULT '0',
          `timer_layout` varchar(255) DEFAULT NULL,
          `timer_date` datetime NULL,
          `timelapse_display` tinyint(1) unsigned NOT NULL DEFAULT '0',
          `email_subscribe` tinyint(1) unsigned NOT NULL DEFAULT '0',
          `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
          `date_add` datetime NOT NULL,
          `date_upd` datetime NOT NULL,
          PRIMARY KEY  (`id_wk_maintenance`)
      ) ENGINE="._MYSQL_ENGINE_." DEFAULT CHARSET=utf8;",
        "CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."wk_maintenance_lang` (
          `id_wk_maintenance` int(10) unsigned NOT NULL,
          `id_lang` int(10) unsigned NOT NULL,
          `headline` text,
          `description` text,
          `footer_text` text,
          PRIMARY KEY (`id_wk_maintenance`, `id_lang`)
      ) ENGINE="._MYSQL_ENGINE_." DEFAULT CHARSET=utf8;");
    }
}
