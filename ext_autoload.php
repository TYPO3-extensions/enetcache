<?php
$extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('enetcache');
return array(
	'tx_enetcache' => $extensionPath . 'Classes/class.tx_enetcache.php',
	'tx_enetcache_hook' => $extensionPath . 'Classes/class.tx_enetcache_hook.php',
	'tx_enetcache_tcahandler' => $extensionPath . 'Classes/class.tx_enetcache_tcahandler.php',
	'tx_enetcache_backendcontentcacheaction' => $extensionPath . 'hooks/class.tx_enetcache_backendContentCacheAction.php',
	'tx_enetcache_tcemain' => $extensionPath . 'hooks/class.tx_enetcache_tcemain.php',
	'tx_enetcache_hookable' => $extensionPath . 'interfaces/interface.tx_enetcache_hookable.php',
	'tx_enetcache_testcase' => $extensionPath . 'tests/class.tx_enetcache_testcase.php',
	'tx_enetcache_task_droptags' => $extensionPath . 'tasks/class.tx_enetcache_task_droptags.php',
	'tx_enetcache_task_droptags_additionalfieldprovider' => $extensionPath . 'tasks/class.tx_enetcache_task_droptags_additionalfieldprovider.php',
	'tx_enetcache_cli' => $extensionPath . 'cli/class.tx_enetcache_cli.php',
	'tx_enetcache_extensionwrappers_pi_abstract' => $extensionPath . 'Classes/extensionwrappers/class.tx_enetcache_extensionwrappers_pi_abstract.php',
	'tx_enetcache_extensionwrappers_vge_tagcloud_pi1' => $extensionPath . 'Classes/extensionwrappers/class.tx_enetcache_extensionwrappers_vge_tagcloud_pi1.php',
	'tx_enetcache_extensionwrappers_wec_map_pi_abstract' => $extensionPath . 'Classes/extensionwrappers/class.tx_enetcache_extensionwrappers_wec_map_pi_abstract.php',
	'tx_enetcache_extensionwrappers_wec_map_pi1' => $extensionPath . 'Classes/extensionwrappers/class.tx_enetcache_extensionwrappers_wec_map_pi1.php',
	'tx_enetcache_extensionwrappers_wec_map_pi2' => $extensionPath . 'Classes/extensionwrappers/class.tx_enetcache_extensionwrappers_wec_map_pi2.php',
	'tx_enetcache_extensionwrappers_wec_map_pi3' => $extensionPath . 'Classes/extensionwrappers/class.tx_enetcache_extensionwrappers_wec_map_pi3.php',
	'tx_enetcache_utility_compatibility' => $extensionPath . 'Classes/Utility/Compatibility.php',
);