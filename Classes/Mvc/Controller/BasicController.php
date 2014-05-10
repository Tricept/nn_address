<?php
namespace NN\NnAddress\Mvc\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Hendrik Reimers <h.reimers@neonaut.de>, Neonaut GmbH
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
 * Basic functions used by PersonController
 *
 * @package nn_address
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class BasicController extends \NN\NnAddress\Mvc\Controller\ActionController {
	
	/**
	 * Find all persons, optional by selected groups
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult
	 */
	protected function getPersons() {
		$sword  = $this->getRequestArgument('sword', $this->settings['swordValidationExpr']);
		$groups = $this->getRequestArgument('group', '/^([0-9]{1,})$/');
		$groups = ( empty($this->settings['groups']) && $groups !== NULL ) ? $groups : $this->settings['groups'];
		
		if ( !empty($groups) ) {
			if ( !empty($sword) ) {
				return $this->personRepository->findByGroupsAndSword($groups, $sword, $this->settings['searchInFields']);
			} else return $this->personRepository->findByGroups($groups);
		} else {
			if ( !empty($sword) ) {
				return $this->personRepository->findBySword($sword, $this->settings['searchInFields']);
			} else return $this->personRepository->findAll();
		}
	}
	
	/**
	 * Set's to fluid the input fields if search is enabled
	 *
	 * @return void
	 */
	protected function setSearchPresets() {
		if ( $this->settings['enableSearch'] == 1 ) {
			$this->view->assign('sword', $this->getRequestArgument('sword', $this->settings['swordValidationExpr']));
			$this->view->assign('groups', $this->groupRepository->findAll());
			$this->view->assign('selectedGroup', $this->getRequestArgument('group', '/^([0-9]{1,})$/'));
		}
	}

}
?>