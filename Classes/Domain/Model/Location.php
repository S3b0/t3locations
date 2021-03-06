<?php
namespace S3b0\T3locations\Domain\Model;


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
 * Location
 */
class Location extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var boolean
	 */
	protected $hidden = TRUE;

	/**
	 * @var integer
	 */
	protected $sorting = 0;

	/**
	 * title
	 *
	 * @var string
	 * @validate S3b0\T3locations\Validation\Validator\NotEmpty
	 */
	protected $title = '';

	/**
	 * logo
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $logo = NULL;

	/**
	 * freetext
	 *
	 * @var string
	 */
	protected $freetext = '';

	/**
	 * fieldToUseInSearchMask
	 *
	 * @var integer
	 * @validate S3b0\T3locations\Validation\Validator\NotEmpty
	 */
	protected $fieldToUseInSearchMask = 0;

	/**
	 * fieldToUseInHeadline
	 *
	 * @var integer
	 */
	protected $fieldToUseInHeadline = 0;

	/**
	 * userDefinedHeadline
	 *
	 * @var string
	 */
	protected $userDefinedHeadline = '';

	/**
	 * contactPerson
	 *
	 * @var string
	 */
	protected $contactPerson = '';

	/**
	 * address
	 *
	 * @var string
	 */
	protected $address = '';

	/**
	 * streetAddress
	 *
	 * @var string
	 */
	protected $streetAddress = '';

	/**
	 * zip
	 *
	 * @var string
	 */
	protected $zip = '';

	/**
	 * city
	 *
	 * @var string
	 */
	protected $city = '';

	/**
	 * phone
	 *
	 * @var string
	 */
	protected $phone = '';

	/**
	 * facsimile
	 *
	 * @var string
	 */
	protected $facsimile = '';

	/**
	 * mobile
	 *
	 * @var string
	 */
	protected $mobile = '';

	/**
	 * email
	 *
	 * @var string
	 */
	protected $email = '';

	/**
	 * web
	 *
	 * @var string
	 */
	protected $web = '';

	/**
	 * type
	 *
	 * @var \S3b0\T3locations\Domain\Model\LocationType
	 */
	protected $type = NULL;

	/**
	 * socialMedia
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\T3locations\Domain\Model\SocialMediaLink>
	 * @cascade remove
	 */
	protected $socialMedia = NULL;

	/**
	 * googleMaps
	 *
	 * @var \S3b0\T3locations\Domain\Model\Map
	 */
	protected $googleMaps = NULL;

	/**
	 * state
	 *
	 * @var \S3b0\T3locations\Domain\Model\State
	 */
	protected $state = NULL;

	/**
	 * country
	 *
	 * @var \S3b0\T3locations\Domain\Model\Region
	 * @validate S3b0\T3locations\Validation\Validator\NotEmpty
	 */
	protected $country = NULL;

	/**
	 * coverage
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\T3locations\Domain\Model\Region>
	 */
	protected $coverage = NULL;

	/**
	 * region
	 *
	 * @var \S3b0\T3locations\Domain\Model\Region
	 */
	protected $region = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->socialMedia = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->coverage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * @param boolean $hidden
	 */
	public function setHidden($hidden) {
		$this->hidden = $hidden;
	}

	/**
	 * @return boolean
	 */
	public function isHidden() {
		return $this->hidden;
	}

	/**
	 * @return int
	 */
	public function getSorting() {
		return $this->sorting;
	}

	/**
	 * @param int $sorting
	 */
	public function setSorting($sorting) {
		$this->sorting = $sorting;
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the logo
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $logo
	 */
	public function getLogo() {
		return $this->logo;
	}

	/**
	 * Sets the logo
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $logo
	 * @return void
	 */
	public function setLogo(\TYPO3\CMS\Extbase\Domain\Model\FileReference $logo = NULL) {
		$this->logo = $logo;
	}

	/**
	 * Returns the freetext
	 *
	 * @return string $freetext
	 */
	public function getFreetext() {
		return $this->freetext;
	}

	/**
	 * Sets the freetext
	 *
	 * @param string $freetext
	 * @return void
	 */
	public function setFreetext($freetext) {
		$this->freetext = $freetext;
	}

	/**
	 * Returns the fieldToUseInSearchMask
	 *
	 * @return integer $fieldToUseInSearchMask
	 */
	public function getFieldToUseInSearchMask() {
		return $this->fieldToUseInSearchMask;
	}

	/**
	 * Sets the fieldToUseInSearchMask
	 *
	 * @param integer $fieldToUseInSearchMask
	 * @return void
	 */
	public function setFieldToUseInSearchMask($fieldToUseInSearchMask) {
		$this->fieldToUseInSearchMask = $fieldToUseInSearchMask;
	}

	/**
	 * Returns the fieldToUseInHeadline
	 *
	 * @return integer $fieldToUseInHeadline
	 */
	public function getFieldToUseInHeadline() {
		return $this->fieldToUseInHeadline;
	}

	/**
	 * Sets the fieldToUseInHeadline
	 *
	 * @param integer $fieldToUseInHeadline
	 * @return void
	 */
	public function setFieldToUseInHeadline($fieldToUseInHeadline) {
		$this->fieldToUseInHeadline = $fieldToUseInHeadline;
	}

	/**
	 * Returns the userDefinedHeadline
	 *
	 * @return string $userDefinedHeadline
	 */
	public function getUserDefinedHeadline() {
		return $this->userDefinedHeadline;
	}

	/**
	 * Sets the userDefinedHeadline
	 *
	 * @param string $userDefinedHeadline
	 * @return void
	 */
	public function setUserDefinedHeadline($userDefinedHeadline) {
		$this->userDefinedHeadline = $userDefinedHeadline;
	}

	/**
	 * Returns the contactPerson
	 *
	 * @return string $contactPerson
	 */
	public function getContactPerson() {
		return $this->contactPerson;
	}

	/**
	 * Sets the contactPerson
	 *
	 * @param string $contactPerson
	 * @return void
	 */
	public function setContactPerson($contactPerson) {
		$this->contactPerson = $contactPerson;
	}

	/**
	 * Returns the address
	 *
	 * @return string $address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Sets the address
	 *
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * Returns the streetAddress
	 *
	 * @return string
	 */
	public function getStreetAddress() {
		return $this->streetAddress;
	}

	/**
	 * Sets the streetAddress
	 *
	 * @param string $streetAddress
	 */
	public function setStreetAddress($streetAddress) {
		$this->streetAddress = $streetAddress;
	}

	/**
	 * Returns the zip
	 *
	 * @return string $zip
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * Sets the zip
	 *
	 * @param string $zip
	 * @return void
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * Returns the city
	 *
	 * @return string $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Sets the city
	 *
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * Returns the phone
	 *
	 * @return string $phone
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * Sets the phone
	 *
	 * @param string $phone
	 * @return void
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * Returns the facsimile
	 *
	 * @return string $facsimile
	 */
	public function getFacsimile() {
		return $this->facsimile;
	}

	/**
	 * Sets the facsimile
	 *
	 * @param string $facsimile
	 * @return void
	 */
	public function setFacsimile($facsimile) {
		$this->facsimile = $facsimile;
	}

	/**
	 * Returns the mobile
	 *
	 * @return string $mobile
	 */
	public function getMobile() {
		return $this->mobile;
	}

	/**
	 * Sets the mobile
	 *
	 * @param string $mobile
	 * @return void
	 */
	public function setMobile($mobile) {
		$this->mobile = $mobile;
	}

	/**
	 * Returns the email
	 *
	 * @return array $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Returns the email
	 *
	 * @return array $email
	 */
	public function getEmailList() {
		return \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(PHP_EOL, $this->email, TRUE);
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Returns the web
	 *
	 * @return array $web
	 */
	public function getWeb() {
		return $this->web;
	}

	/**
	 * Returns the web
	 *
	 * @return array $web
	 */
	public function getWebList() {
		return \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(PHP_EOL, $this->web, TRUE);
	}

	/**
	 * Sets the web
	 *
	 * @param string $web
	 * @return void
	 */
	public function setWeb($web) {
		$this->web = $web;
	}

	/**
	 * Returns the type
	 *
	 * @return \S3b0\T3locations\Domain\Model\LocationType
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param \S3b0\T3locations\Domain\Model\LocationType $type
	 */
	public function setType(\S3b0\T3locations\Domain\Model\LocationType $type = NULL) {
		$this->type = $type;
	}

	/**
	 * Adds a SocialMediaLink
	 *
	 * @param \S3b0\T3locations\Domain\Model\SocialMediaLink $socialMedium
	 * @return void
	 */
	public function addSocialMedium(\S3b0\T3locations\Domain\Model\SocialMediaLink $socialMedium) {
		$this->socialMedia->attach($socialMedium);
	}

	/**
	 * Removes a SocialMediaLink
	 *
	 * @param \S3b0\T3locations\Domain\Model\SocialMediaLink $socialMediumToRemove The SocialMediaLink to be removed
	 * @return void
	 */
	public function removeSocialMedium(\S3b0\T3locations\Domain\Model\SocialMediaLink $socialMediumToRemove) {
		$this->socialMedia->detach($socialMediumToRemove);
	}

	/**
	 * Returns the socialMedia
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\T3locations\Domain\Model\SocialMediaLink> $socialMedia
	 */
	public function getSocialMedia() {
		return $this->socialMedia;
	}

	/**
	 * Sets the socialMedia
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\T3locations\Domain\Model\SocialMediaLink> $socialMedia
	 * @return void
	 */
	public function setSocialMedia(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $socialMedia) {
		$this->socialMedia = $socialMedia;
	}

	/**
	 * Returns the googleMaps
	 *
	 * @return \S3b0\T3locations\Domain\Model\Map $googleMaps
	 */
	public function getGoogleMaps() {
		return $this->googleMaps;
	}

	/**
	 * Sets the googleMaps
	 *
	 * @param \S3b0\T3locations\Domain\Model\Map $googleMaps
	 * @return void
	 */
	public function setGoogleMaps(\S3b0\T3locations\Domain\Model\Map $googleMaps = NULL) {
		$this->googleMaps = $googleMaps;
	}

	/**
	 * Returns the state
	 *
	 * @return \S3b0\T3locations\Domain\Model\State $state
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * Sets the state
	 *
	 * @param \S3b0\T3locations\Domain\Model\State $state
	 * @return void
	 */
	public function setState(\S3b0\T3locations\Domain\Model\State $state = NULL) {
		$this->state = $state;
	}

	/**
	 * Returns the country
	 *
	 * @return \S3b0\T3locations\Domain\Model\Region $country
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Sets the country
	 *
	 * @param \S3b0\T3locations\Domain\Model\Region $country
	 * @return void
	 */
	public function setCountry(\S3b0\T3locations\Domain\Model\Region $country = NULL) {
		$this->country = $country;
	}

	/**
	 * Adds a Country
	 *
	 * @param \S3b0\T3locations\Domain\Model\Region $coverage
	 * @return void
	 */
	public function addCoverage(\S3b0\T3locations\Domain\Model\Region $coverage) {
		$this->coverage->attach($coverage);
	}

	/**
	 * Removes a Country
	 *
	 * @param \S3b0\T3locations\Domain\Model\Region $coverageToRemove The Country to be removed
	 * @return void
	 */
	public function removeCoverage(\S3b0\T3locations\Domain\Model\Region $coverageToRemove) {
		$this->coverage->detach($coverageToRemove);
	}

	/**
	 * Returns the coverage
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\T3locations\Domain\Model\Region> $coverage
	 */
	public function getCoverage() {
		if ( $this->coverage->contains($this->country) ) {
			$this->coverage->detach($this->country);
		}

		return $this->coverage;
	}

	/**
	 * Sets the coverage
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\S3b0\T3locations\Domain\Model\Region> $coverage
	 * @return void
	 */
	public function setCoverage(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $coverage = NULL) {
		$this->coverage = $coverage;
	}

	/**
	 * Returns the region
	 *
	 * @return \S3b0\T3locations\Domain\Model\Region $region
	 */
	public function getRegion() {
		return $this->region;
	}

	/**
	 * Sets the region
	 *
	 * @param \S3b0\T3locations\Domain\Model\Region $region
	 * @return void
	 */
	public function setRegion(\S3b0\T3locations\Domain\Model\Region $region = NULL) {
		$this->region = $region;
	}

	/**
	 * Returns the headline
	 *
	 * @param $returnBoolean boolean
	 * @return string
	 */
	public function getHeadline($returnBoolean = FALSE) {
		switch ( $this->fieldToUseInHeadline ) {
			case 1:
				return $returnBoolean ?: $this->country->getTitle();
				break;
			case 2:
				return $returnBoolean ?: $this->region->getTitle();
				break;
			case 3:
				return $returnBoolean ?: $this->userDefinedHeadline;
				break;
			case 4:
				return $returnBoolean ? FALSE : '';
				break;
			default:
				return $returnBoolean ?: $this->title;
		}
	}

	public function getFlagIconSource() {
		$source = NULL;
		$countryFlag = preg_replace('/\s+/im', '', strtr(utf8_decode($this->country->getFlagIconName()),
			utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),
			'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy'));
		if ( file_exists(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:t3locations/Resources/Public/Images/FlagIcons/' . $countryFlag . '.png')) ) {
			$source = array(
				\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:t3locations/Resources/Public/Images/FlagIcons/' . $countryFlag . '.png'),
				$this->country->getIsoCodeA3(),
				$this->country->getTitle()
			);
		}
		if ( $this->region instanceof \S3b0\T3locations\Domain\Model\Region ) {
			$regionFlag = preg_replace('/\s+/im', '', strtr(utf8_decode($this->region->getFlagIconName()),
				utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'),
				'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy'));
			if ( file_exists(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:t3locations/Resources/Public/Images/FlagIcons/' . $regionFlag . '.png')) ) {
				$source = array(
					\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:t3locations/Resources/Public/Images/FlagIcons/' . $regionFlag . '.png'),
					$this->region->getIsoCodeA3(),
					$this->region->getTitle()
				);
			}
		}

		return $source;
	}

	/****************************************************
	 * ParseFunctions for replacements in address field *
	 ***************************************************/

	/**
	 * @return string
	 */
	private function getParsedPropertyType() {
		return $this->type->getTitle();
	}

	/**
	 * @return string
	 */
	private function getParsedPropertyTitle() {
		return '<span class="fn org">' . $this->title . '</span>';
	}

	/**
	 * @return string
	 */
	public function getParsedPropertyAddress() {
		$replacePlain = preg_match_all('/\{\{\{([a-z0-9]+)\}\}\}/im', $this->address, $matches);
		if ( $replacePlain ) {
			foreach ( $matches[1] as $property ) {
				if ( $this->_hasProperty($property) ) {
					$this->address = str_replace('{{{' . $property . '}}}', $this->_getProperty($property), $this->address);
				}
			}
		}

		$replace = preg_match_all('/\{\{([a-z0-9]+)\}\}/im', $this->address, $matches);
		if ( $replace ) {
			foreach ( $matches[1] as $property ) {
				if ( method_exists($this, 'getParsedProperty' . ucfirst($property)) ) {
					$this->address = str_replace('{{' . $property . '}}', call_user_func(array( $this, 'getParsedProperty' . ucfirst($property) )), $this->address);
				} elseif ( $this->_hasProperty($property) ) {
					$this->address = str_replace('{{' . $property . '}}', $this->_getProperty($property), $this->address);
				}
			}
		}

		return '<div class="adr">' . $this->address . '</div>';
	}

	/**
	 * @return string
	 */
	private function getParsedPropertyStreetAddress() {
		return '<span class="adr street-address">' . $this->streetAddress . '</span>';
	}

	/**
	 * @return string
	 */
	private function getParsedPropertyZip() {
		return '<span class="adr postal-code">' . $this->zip . '</span>';
	}

	/**
	 * @return string
	 */
	private function getParsedPropertyCity() {
		return '<span class="adr locality">' . $this->city . '</span>';
	}

	/**
	 * @return string
	 */
	private function getParsedPropertyState() {
		return '<span class="adr region">' . $this->state->getTitle() . '</span>';
	}

	/**
	 * @return string
	 */
	private function getParsedPropertyStateAbbreviation() {
		return '<span class="adr region"><abbr title="' . $this->state->getTitle() . '">' . $this->state->getAbbreviation() . '</abbr></span>';
	}

	/**
	 * @return string
	 */
	private function getParsedPropertyCountry() {
		return '<span class="adr country-name">' . $this->country->getTitle() . '</span>';
	}

	/**
	 * @return string
	 */
	private function getParsedPropertyCountryIsoCodeA2() {
		return '<span class="adr country-name"><abbr title="' . $this->country->getTitle() . '">' . $this->country->getIsoCodeA2() . '</abbr></span>';
	}

	/**
	 * @return string
	 */
	private function getParsedPropertyCountryIsoCodeA3() {
		return '<span class="adr country-name"><abbr title="' . $this->country->getTitle() . '">' . $this->country->getIsoCodeA3() . '</abbr></span>';
	}

	/**
	 * @return string
	 */
	private function getParsedPropertyRegion() {
		return $this->region->getTitle();
	}

	/**
	 * @return string
	 */
	private function getParsedPropertyCoverage() {
		$output = '';
		if ( $this->coverage->count() ) {
			/** @var \S3b0\T3locations\Domain\Model\Region $country */
			foreach ( $this->coverage as $country ) {
				$output .= ', ' . $country->getTitle();
			}
		}

		return substr($output, 2);
	}

}