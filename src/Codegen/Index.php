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
 * Used by the QCubed Code Generator to describe a table Index
 * @package Codegen
 *
 * @property string $KeyName
 * @property boolean $Unique
 * @property boolean $PrimaryKey
 * @property string[] $ColumnNameArray
 */
class Index extends \QCubed\AbstractBase {

	/////////////////////////////
	// Protected Member Variables
	/////////////////////////////

	/**
	 * Name of the index object, as defined in the database or create script
	 * @var string KeyName
	 */
	protected $strKeyName;

	/**
	 * Specifies whether or not the index is unique
	 * @var bool Unique
	 */
	protected $blnUnique;

	/**
	 * Specifies whether or not the column is the Primary Key index
	 * @var bool PrimaryKey
	 */
	protected $blnPrimaryKey;

	/**
	 * Array of strings containing the names of the columns that
	 * this index indexes (indexed numerically)
	 * @var string[] ColumnNameArray
	 */
	protected $strColumnNameArray;




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
			case 'Unique':
				return $this->blnUnique;
			case 'PrimaryKey':
				return $this->blnPrimaryKey;
			case 'ColumnNameArray':
				return $this->strColumnNameArray;
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
				case 'Unique':
					return $this->blnUnique = Type::Cast($mixValue, Type::Boolean);
				case 'PrimaryKey':
					return $this->blnPrimaryKey = Type::Cast($mixValue, Type::Boolean);
				case 'ColumnNameArray':
					return $this->strColumnNameArray = Type::Cast($mixValue, Type::ArrayType);
				default:
					return parent::__set($strName, $mixValue);
			}
		} catch (Caller $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}
	}
}