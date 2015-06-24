<?php
/***************************************************************
*  Copyright notice
*  (c) 2009-2013 Christian Kuhn <lolli@schwarzbu.ch>
*  (c) 2010-2013 Markus Guenther <markus.guenther@e-netconsulting.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

use TYPO3\CMS\Core\Cache\Frontend\FrontendInterface;
use TYPO3\CMS\Scheduler\AdditionalFieldProviderInterface;
use TYPO3\CMS\Scheduler\Controller\SchedulerModuleController;
use TYPO3\CMS\Scheduler\Task\AbstractTask;

/**
 * Add an additional text input field for drop-by-tags task, to gain tags to be dropped.
 *
 * @author Markus Guenther <markus.guenther@e-netconsulting.com>
 */
class tx_enetcache_task_DropTags_AdditionalFieldProvider implements AdditionalFieldProviderInterface {

	/**
	 * Add a Text field
	 *
	 * @param array $taskInfo Reference to the array containing the info used in the add/edit form
	 * @param object $task When editing, reference to the current task object. Null when adding.
	 * @param SchedulerModuleController $parentObject Reference to the calling object (Scheduler's BE module)
	 * @return array Array containing all the information pertaining to the additional fields
	 *			The array is multidimensional, keyed to the task class name and each field's id
	 *			For each field it provides an associative sub-array with the following:
	 *			['code'] => The HTML code for the field
	 *			['label'] => The label of the field (possibly localized)
	 *			['cshKey'] => The CSH key for the field
	 *			['cshLabel'] => The code of the CSH label
	 */
	public function getAdditionalFields(array &$taskInfo, $task, SchedulerModuleController $parentObject) {
			// Initialize selected feeds field value
		if (empty($taskInfo['tags'])) {
			if ($parentObject->CMD == 'edit') {
					// In case of edit, set to internal value if no data was submitted already
				$taskInfo['tags'] = implode(',', $task->tags);
			} else {
					// Otherwise set an empty value, as it will not be used anyway
				$taskInfo['tags'] = '';
			}
		}

		// Write the code for the field
		$fieldID = 'enetcache_task_droptags';
		$fieldCode = '<textarea rows="5" cols="35" name="tx_scheduler[tags]" id="' . $fieldID . '" class="wide" >' . $taskInfo['tags'] . '</textarea>';
		$additionalFields = array();
		$additionalFields[$fieldID] = array(
			'code' => $fieldCode,
			'label' => 'LLL:EXT:enetcache/locallang.xml:scheduler.droptags.tagList',
			'cshKey' => '_MOD_tools_txschedulerM1',
			'cshLabel' => $fieldID
		);

		return $additionalFields;
	}


	/**
	 * This method checks any additional data that is relevant to the specific task
	 * If the task class is not relevant, the method is expected to return true
	 *
	 * @param array $submittedData Reference to the array containing the data submitted by the user
	 * @param SchedulerModuleController $parentObject Reference to the calling object (Scheduler's BE module)
	 * @return boolean True if validation was ok (or selected class is not relevant), false otherwise
	 */
	public function validateAdditionalFields(array &$submittedData, SchedulerModuleController $parentObject) {
		$tags = trim($submittedData['tags']);
		$isValid = $this->isValidTagList(explode(',', $tags));
		if (!$isValid) {
			$parentObject->addMessage($GLOBALS['LANG']->sL('LLL:EXT:enetcache/locallang.xml:scheduler.droptags.invalidTagList'), t3lib_FlashMessage::ERROR);
		}
		return $isValid;
	}

	/**
	 * This method is used to save any additional input into the current task object
	 * if the task class matches
	 *
	 * @param array $submittedData Array containing the data submitted by the user
	 * @param AbstractTask $task Reference to the current task object
	 * @return void
	 */
	public function saveAdditionalFields(array $submittedData, AbstractTask $task) {
		$tags = trim($submittedData['tags']);
		$task->tags = explode(',', $tags);
	}

	/**
	 * Sanitize tag list
	 *
	 * @param array $tags Tag list
	 * @return boolean TRUE if tag list validates
	 */
	protected function isValidTagList(array $tags = array()) {
		$isValid = TRUE;
		foreach ($tags as $tag) {
			if (!preg_match(FrontendInterface::PATTERN_TAG, $tag)) {
				$isValid = FALSE;
			}
		}

		return $isValid;
	}

}
