<?php

/*
* File: /upgrade/Upgrade-1.6.11.php
*/
function upgrade_module_1_6_11($object) {
	return $object->registerHook('orderConfirmation');
}