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

class ProaccountDefaultModuleFrontController extends ModuleFrontController
{

    public $proaccount_cms;

    public function __construct()
    {
        parent::__construct();

        $this->proaccount_cms = new CMS(
            Configuration::get(
                'PROACCOUNT_PAGE_CMS_ID',
                0
            ),
            (int)$this->context->language->id
        );
        if (!Validate::isLoadedObject($this->proaccount_cms) ||
            !Configuration::get('PS_B2B_ENABLE')) {
            $this->redirect_after = $this->context->link->getPageLink('pagenotfound');
            $this->redirect();
        }
    }

    public function setMedia()
    {
        parent::setMedia();
        if (DmVersion::isVersion17()) {
            $this->registerStylesheet('cms-proaccount', _THEME_CSS_DIR_.'cms.css');
        } else {
            $this->addCSS(_THEME_CSS_DIR_.'cms.css');
        }
    }

    public function initContent()
    {
        parent::initContent();
        $this->context->smarty->assign(array(
            'proaccount_cms' => $this->proaccount_cms,
            'path' => $this->module->displayName,
        ));
        $template = DmVersion::isVersion17() ? 'module:proaccount/views/templates/front/default-17.tpl' : 'default.tpl';
        $this->setTemplate($template);
    }
}
