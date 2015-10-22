<?php
namespace NN\NnAddress\Domain\Model;

    /***************************************************************
     *  Copyright notice
     *  (c) 2014 Hendrik Reimers <h.reimers@neonaut.de>, Neonaut GmbH
     *  All rights reserved
     *  This script is part of the TYPO3 project. The TYPO3 project is
     *  free software; you can redistribute it and/or modify
     *  it under the terms of the GNU General Public License as published by
     *  the Free Software Foundation; either version 3 of the License, or
     *  (at your option) any later version.
     *  The GNU General Public License can be found at
     *  http://www.gnu.org/copyleft/gpl.html.
     *  This script is distributed in the hope that it will be useful,
     *  but WITHOUT ANY WARRANTY; without even the implied warranty of
     *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *  GNU General Public License for more details.
     *  This copyright notice MUST APPEAR in all copies of the script!
     ***************************************************************/

/**
 * @package nn_address
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * addresses
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NN\NnAddress\Domain\Model\Address>
     * @lazy
     */
    protected $addresses;
    /**
     * birthday
     * @var \DateTime
     */
    protected $birthday;
    /**
     * categories
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category>
     */
    protected $categories;
    /**
     * firstName
     * @var \string
     */
    protected $firstName;
    /**
     * flexform
     * @var \string
     */
    protected $flexform;
    /**
     * gender
     * @var \integer
     */
    protected $gender;
    /**
     * groups
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NN\NnAddress\Domain\Model\Group>
     * @lazy
     */
    protected $groups;
    /**
     * image
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @cascade remove
     */
    protected $image = NULL;
    /**
     * lastName
     * @var \string
     */
    protected $lastName;
    /**
     * mails
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NN\NnAddress\Domain\Model\Mail>
     * @lazy
     */
    protected $mails;
    /**
     * notes
     * @var \string
     */
    protected $notes;
    /**
     * organisation
     * @var \string
     */
    protected $organisation;
    /**
     * phones
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NN\NnAddress\Domain\Model\Phone>
     * @lazy
     */
    protected $phones;
    /**
     * secondFirstName
     * @var \string
     */
    protected $secondFirstName;
    /**
     * title
     * @var \string
     */
    protected $title;
    /**
     * website
     * @var \string
     */
    protected $website;

    /**
     * __construct
     * @return Person
     */
    public function __construct() {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Adds a Address
     * @param \NN\NnAddress\Domain\Model\Address $address
     * @return void
     */
    public function addAddress(\NN\NnAddress\Domain\Model\Address $address) {
        $this->addresses->attach($address);
    }

    /**
     * Adds a Category
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $category
     * @return void
     */
    public function addCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $category) {
        $this->categories->attach($category);
    }

    /**
     * Adds a Group
     * @param \NN\NnAddress\Domain\Model\Group $group
     * @return void
     */
    public function addGroup(\NN\NnAddress\Domain\Model\Group $group) {
        $this->groups->attach($group);
    }

    /**
     * Adds a FileReference
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
        $this->image->attach($image);
    }

    /**
     * Adds a Mail
     * @param \NN\NnAddress\Domain\Model\Mail $mail
     * @return void
     */
    public function addMail(\NN\NnAddress\Domain\Model\Mail $mail) {
        $this->mails->attach($mail);
    }

    /**
     * Adds a Phone
     * @param \NN\NnAddress\Domain\Model\Phone $phone
     * @return void
     */
    public function addPhone(\NN\NnAddress\Domain\Model\Phone $phone) {
        $this->phones->attach($phone);
    }

    /**
     * Returns the addresses
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NN\NnAddress\Domain\Model\Address> $addresses
     */
    public function getAddresses() {
        return $this->addresses;
    }

    /**
     * Sets the addresses
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NN\NnAddress\Domain\Model\Address> $addresses
     * @return void
     */
    public function setAddresses(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $addresses) {
        $this->addresses = $addresses;
    }

    /**
     * Returns the birthday
     * @return \DateTime $birthday
     */
    public function getBirthday() {
        return $this->birthday;
    }

    /**
     * Sets the birthday
     * @param \DateTime $birthday
     * @return void
     */
    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    /**
     * Returns the categories
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $categories
     */
    public function getCategories() {
        return $this->categories;
    }

    /**
     * Sets the categories
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\Category> $categories
     * @return void
     */
    public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories) {
        $this->categories = $categories;
    }

    /**
     * Returns the firstName
     * @return \string $firstName
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Sets the firstName
     * @param \string $firstName
     * @return void
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    /**
     * Returns the flexform
     * @return \array $flexform
     */
    public function getFlexform() {
        if (!empty($this->flexform)) {
            $ffh = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Service\\FlexFormService');
            $flexArray = $ffh->convertFlexFormContentToArray($this->flexform);

            return $flexArray;
        } else return array();
    }

    /**
     * Returns the gender
     * @return \integer $gender
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * Sets the gender
     * @param \integer $gender
     * @return void
     */
    public function setGender($gender) {
        $this->gender = $gender;
    }

    /**
     * Returns the groups
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NN\NnAddress\Domain\Model\Group> $groups
     */
    public function getGroups() {
        return $this->groups;
    }

    /**
     * Sets the groups
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NN\NnAddress\Domain\Model\Group> $groups
     * @return void
     */
    public function setGroups(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $groups) {
        $this->groups = $groups;
    }

    /**
     * Returns the image
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Sets the image
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $image) {
        $this->image = $image;
    }

    /**
     * Returns the lastName
     * @return \string $lastName
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * Sets the lastName
     * @param \string $lastName
     * @return void
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    /**
     * Returns the mails
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NN\NnAddress\Domain\Model\Mail> $mails
     */
    public function getMails() {
        return $this->mails;
    }

    /**
     * Sets the mails
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NN\NnAddress\Domain\Model\Mail> $mails
     * @return void
     */
    public function setMails(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $mails) {
        $this->mails = $mails;
    }

    /**
     * Returns the notes
     * @return \string $notes
     */
    public function getNotes() {
        return $this->notes;
    }

    /**
     * Sets the notes
     * @param \string $notes
     * @return void
     */
    public function setNotes($notes) {
        $this->notes = $notes;
    }

    /**
     * Returns the organisation
     * @return \string $organisation
     */
    public function getOrganisation() {
        return $this->organisation;
    }

    /**
     * Sets the organisation
     * @param \string $organisation
     * @return void
     */
    public function setOrganisation($organisation) {
        $this->organisation = $organisation;
    }

    /**
     * Returns the phones
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NN\NnAddress\Domain\Model\Phone> $phones
     */
    public function getPhones() {
        return $this->phones;
    }

    /**
     * Sets the phones
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\NN\NnAddress\Domain\Model\Phone> $phones
     * @return void
     */
    public function setPhones(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $phones) {
        $this->phones = $phones;
    }

    /**
     * Returns the secondFirstName
     * @return \string $secondFirstName
     */
    public function getSecondFirstName() {
        return $this->secondFirstName;
    }

    /**
     * Sets the secondFirstName
     * @param \string $secondFirstName
     * @return void
     */
    public function setSecondFirstName($secondFirstName) {
        $this->secondFirstName = $secondFirstName;
    }

    /**
     * Returns the title
     * @return \string $title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Sets the title
     * @param \string $title
     * @return void
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Returns the website
     * @return \string $website
     */
    public function getWebsite() {
        return $this->website;
    }

    /**
     * Sets the website
     * @param \string $website
     * @return void
     */
    public function setWebsite($website) {
        $this->website = $website;
    }

    /**
     * Removes a Address
     * @param \NN\NnAddress\Domain\Model\Address $addressToRemove The Address to be removed
     * @return void
     */
    public function removeAddress(\NN\NnAddress\Domain\Model\Address $addressToRemove) {
        $this->addresses->detach($addressToRemove);
    }

    /**
     * Removes a Category
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove The Category to be removed
     * @return void
     */
    public function removeCategory(\TYPO3\CMS\Extbase\Domain\Model\Category $categoryToRemove) {
        $this->categories->detach($categoryToRemove);
    }

    /**
     * Removes a Group
     * @param \NN\NnAddress\Domain\Model\Group $groupToRemove The Group to be removed
     * @return void
     */
    public function removeGroup(\NN\NnAddress\Domain\Model\Group $groupToRemove) {
        $this->groups->detach($groupToRemove);
    }

    /**
     * Removes a FileReference
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove The FileReference to be removed
     * @return void
     */
    public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $imageToRemove) {
        $this->image->detach($imageToRemove);
    }

    /**
     * Removes a Mail
     * @param \NN\NnAddress\Domain\Model\Mail $mailToRemove The Mail to be removed
     * @return void
     */
    public function removeMail(\NN\NnAddress\Domain\Model\Mail $mailToRemove) {
        $this->mails->detach($mailToRemove);
    }

    /**
     * Removes a Phone
     * @param \NN\NnAddress\Domain\Model\Phone $phoneToRemove The Phone to be removed
     * @return void
     */
    public function removePhone(\NN\NnAddress\Domain\Model\Phone $phoneToRemove) {
        $this->phones->detach($phoneToRemove);
    }

    /**
     * Initializes all ObjectStorage properties.
     * @return void
     */
    protected function initStorageObjects() {
        /**
         * Do not modify this method!
         * It will be rewritten on each save in the extension builder
         * You may modify the constructor of this class instead
         */
        $this->addresses = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->phones = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->groups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->image = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

}

?>