<?php
namespace NN\NnAddress\Controller;

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
 *
 *
 * @package nn_address
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class PersonController extends \NN\NnAddress\Mvc\Controller\ActionController {

	/**
	 * personRepository
	 *
	 * @var \NN\NnAddress\Domain\Repository\PersonRepository
	 * @inject
	 */
	protected $personRepository;
	
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$this->setOrderings($this->personRepository,'lastName');
		
		// Filter by groups?
		if ( !empty($this->settings['groups']) ) {
			$persons = $this->personRepository->findByGroups($this->settings['groups']);
		} else {
			$persons = $this->personRepository->findAll();
		}
		
		$this->view->assign('persons', $persons);
	}

	/**
	 * action show
	 *
	 * @param \NN\NnAddress\Domain\Model\Person $person
	 * @return void
	 */
	public function showAction(\NN\NnAddress\Domain\Model\Person $person) {
		$this->view->assign('person', $person);
	}
	
	/**
	 * action single
	 *
	 * @return void
	 */
	public function singleAction() {
		// A little trick for the Persons from pages used by content_designer Ext.
		if ( preg_match_all("/([0-9]{1,}):(.*),/siU",$this->settings['persons'],$m) ) {
			$pList = '';
			foreach ( $m[1] as $key => $uid ) {
				$pList        .= $uid.',';
				$pidList[$uid] = $m[2][$key];
			}
			
			$this->view->assign('pidList', $pidList);
		} else {
			$pList = &$this->settings['persons'];
		}
		
		$persons = $this->personRepository->findByUids($pList);
		
		$this->view->assign('persons', $persons);
	}

}
?>