<?php
/**
*
* Part of the QCubed PHP framework.
*
* @license MIT
*
*/

namespace QCubed\Codegen;

use QCubed\Exception\Caller;
use QCubed\Type;

/**
 * Used by the QCubed Code Generator to describe a column reference
 * (aka a Foreign Key)
 * @package Codegen
 *
 * @property string $KeyName
 * @property string $Table
 * @property string $Column
 * @property string $PropertyName
 * @property string $VariableName
 * @property string $VariableType
 * @property boolean $IsType
 * @property ReverseReference ReverseReference
 * @property string $Name
 * @was QReference
 */
class Reference extends \QCubed\AbstractBase {

	/////////////////////////////
	// Protected Member Variables
	/////////////////////////////

	/**
	 * Name of the foreign key object, as defined in the database or create script
	 * @var string KeyName
	 */
	protected $strKeyName;

	/**
	 * Name of the table that is being referenced
	 * @var string Table
	 */
	protected $strTable;

	/**
	 * Name of the column that is being referenced
	 * @var string Column
	 */
	protected $strColumn;

	/**
	 * Name of the referenced object as an class Property
	 * So if the column that this reference points from is named
	 * "primary_annual_report_id", it would be PrimaryAnnualReport
	 * @var string PropertyName
	 */
	protected $strPropertyName;

	/**
	 * Name of the  referenced object as an class protected Member object
	 * So if the column that this reference poitns from is named
	 * "primary_annual_report_id", it would be objPrimaryAnnualReport
	 * @var string VariableName
	 */
	protected $strVariableName;

	/**
	 * The type of the protected member object (should be based off of $this->strTable)
	 * So if referencing the table "annual_report", it would be AnnualReport
	 * @var string VariableType
	 */
	protected $strVariableType;

	/**
	 * If the table that this reference points to is a type table, then this is true
	 * @var string IsType
	 */
	protected $blnIsType;

	/**
	 * The reverse reference pointing back to this reference.
	 *
	 * @var ReverseReference
	 */
	protected $objReverseReference;

	/**
	 * The name of the object, used by json and other encodings.
	 *
	 * @var string
	 */
	protected $strName;



	////////////////////
	// Public Overriders
	////////////////////

	/**
	 * Override method to perform a property "Get"
	 * This will get the value of $strName
	 *
	 * @param string $strName Name of the property to get
	 * @throws Caller
	 * @return mixed
	 */
	public function __get($strName) {
		switch ($strName) {
			case 'KeyName':
				return $this->strKeyName;
			case 'Table':
				return $this->strTable;
			case 'Column':
				return $this->strColumn;
			case 'PropertyName':
				return $this->strPropertyName;
			case 'VariableName':
				return $this->strVariableName;
			case 'VariableType':
				return $this->strVariableType;
			case 'IsType':
				return $this->blnIsType;
			case 'ReverseReference':
				return $this->objReverseReference;
			case 'Name':
				return $this->strName;
			default:
				try {
					return parent::__get($strName);
				} catch (Caller $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
		}
	}

	/**
	 * Override method to perform a property "Set"
	 * This will set the property $strName to be $mixValue
	 *
	 * @param string $strName Name of the property to set
	 * @param string $mixValue New value of the property
	 * @throws Caller
	 * @return mixed
	 */
	public function __set($strName, $mixValue) {
		try {
			switch ($strName) {
				case 'KeyName':
					return $this->strKeyName = Type::Cast($mixValue, Type::String);
				case 'Table':
					return $this->strTable = Type::Cast($mixValue, Type::String);
				case 'Column':
					return $this->strColumn = Type::Cast($mixValue, Type::String);
				case 'PropertyName':
					return $this->strPropertyName = Type::Cast($mixValue, Type::String);
				case 'VariableName':
					return $this->strVariableName = Type::Cast($mixValue, Type::String);
				case 'VariableType':
					return $this->strVariableType = Type::Cast($mixValue, Type::String);
				case 'IsType':
					return $this->blnIsType = Type::Cast($mixValue, Type::Boolean);
				case 'ReverseReference':
					return $this->objReverseReference = $mixValue;
				case 'Name':
					return $this->strName = Type::Cast($mixValue, Type::String);
				default:
					return parent::__set($strName, $mixValue);
			}
		} catch (Caller $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}
	}
}