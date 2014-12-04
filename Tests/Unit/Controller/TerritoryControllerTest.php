<?php
namespace S3b0\T3locations\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>, ecom instruments GmbH
 *  			
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

/**
 * Test case for class S3b0\T3locations\Controller\TerritoryController.
 *
 * @author Sebastian Iffland <Sebastian.Iffland@ecom-ex.com>
 */
class TerritoryControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \S3b0\T3locations\Controller\TerritoryController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('S3b0\\T3locations\\Controller\\TerritoryController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllTerritoriesFromRepositoryAndAssignsThemToView() {

		$allTerritories = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$territoryRepository = $this->getMock('', array('findAll'), array(), '', FALSE);
		$territoryRepository->expects($this->once())->method('findAll')->will($this->returnValue($allTerritories));
		$this->inject($this->subject, 'territoryRepository', $territoryRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('territories', $allTerritories);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenTerritoryToView() {
		$territory = new \S3b0\T3locations\Domain\Model\Territory();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('territory', $territory);

		$this->subject->showAction($territory);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenTerritoryToView() {
		$territory = new \S3b0\T3locations\Domain\Model\Territory();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newTerritory', $territory);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($territory);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenTerritoryToTerritoryRepository() {
		$territory = new \S3b0\T3locations\Domain\Model\Territory();

		$territoryRepository = $this->getMock('', array('add'), array(), '', FALSE);
		$territoryRepository->expects($this->once())->method('add')->with($territory);
		$this->inject($this->subject, 'territoryRepository', $territoryRepository);

		$this->subject->createAction($territory);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenTerritoryToView() {
		$territory = new \S3b0\T3locations\Domain\Model\Territory();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('territory', $territory);

		$this->subject->editAction($territory);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenTerritoryInTerritoryRepository() {
		$territory = new \S3b0\T3locations\Domain\Model\Territory();

		$territoryRepository = $this->getMock('', array('update'), array(), '', FALSE);
		$territoryRepository->expects($this->once())->method('update')->with($territory);
		$this->inject($this->subject, 'territoryRepository', $territoryRepository);

		$this->subject->updateAction($territory);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenTerritoryFromTerritoryRepository() {
		$territory = new \S3b0\T3locations\Domain\Model\Territory();

		$territoryRepository = $this->getMock('', array('remove'), array(), '', FALSE);
		$territoryRepository->expects($this->once())->method('remove')->with($territory);
		$this->inject($this->subject, 'territoryRepository', $territoryRepository);

		$this->subject->deleteAction($territory);
	}
}