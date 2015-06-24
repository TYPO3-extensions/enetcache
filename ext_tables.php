<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

// Add context sensitive help (csh) to the backend module (used for the scheduler tasks)
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_tools_txschedulerM1', 'EXT:enetcache/locallang_csh.xml');

// Use sprite icon API for clearContentCache icon in BE cache topMenu, 4.4 and above
\TYPO3\CMS\Backend\Sprite\SpriteManager::addSingleIcons(
	array(
		'clearcontentcache' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('enetcache') . 'res/delete_pi.png',
	),
	'enetcache'
);