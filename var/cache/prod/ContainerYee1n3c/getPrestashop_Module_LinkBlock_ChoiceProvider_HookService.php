<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.module.link_block.choice_provider.hook' shared service.

return $this->services['prestashop.module.link_block.choice_provider.hook'] = new \PrestaShop\Module\LinkList\Form\ChoiceProvider\HookChoiceProvider(${($_ = isset($this->services['doctrine.dbal.default_connection']) ? $this->services['doctrine.dbal.default_connection'] : $this->getDoctrine_Dbal_DefaultConnectionService()) && false ?: '_'}, 'psw0_');
