<?php
namespace S3b0\T3locations\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>, ecom instruments GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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

/**
 * TerritoryController
 */
class TerritoryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$territories = $this->territoryRepository->findAll();
		$this->view->assign('territories', $territories);
	}

	/**
	 * action show
	 *
	 * @param \S3b0\T3locations\Domain\Model\Territory $territory
	 * @return void
	 */
	public function showAction(\S3b0\T3locations\Domain\Model\Territory $territory) {
		$this->view->assign('territory', $territory);
	}

	/**
	 * action new
	 *
	 * @param \S3b0\T3locations\Domain\Model\Territory $newTerritory
	 * @ignorevalidation $newTerritory
	 * @return void
	 */
	public function newAction(\S3b0\T3locations\Domain\Model\Territory $newTerritory = NULL) {
		$this->view->assign('newTerritory', $newTerritory);
	}

	/**
	 * action create
	 *
	 * @param \S3b0\T3locations\Domain\Model\Territory $newTerritory
	 * @return void
	 */
	public function createAction(\S3b0\T3locations\Domain\Model\Territory $newTerritory) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->territoryRepository->add($newTerritory);
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \S3b0\T3locations\Domain\Model\Territory $territory
	 * @ignorevalidation $territory
	 * @return void
	 */
	public function editAction(\S3b0\T3locations\Domain\Model\Territory $territory) {
		$this->view->assign('territory', $territory);
	}

	/**
	 * action update
	 *
	 * @param \S3b0\T3locations\Domain\Model\Territory $territory
	 * @return void
	 */
	public function updateAction(\S3b0\T3locations\Domain\Model\Territory $territory) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->territoryRepository->update($territory);
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \S3b0\T3locations\Domain\Model\Territory $territory
	 * @return void
	 */
	public function deleteAction(\S3b0\T3locations\Domain\Model\Territory $territory) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->territoryRepository->remove($territory);
		$this->redirect('list');
	}

}