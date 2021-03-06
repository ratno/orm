<?php
/**
 *
 * Part of the QCubed PHP framework.
 *
 * @license MIT
 *
 */

namespace QCubed\Query\Condition;

use QCubed\Exception\Caller;
use QCubed\Query\Builder;
use QCubed\Query\PartialBuilder;

/**
 * Class AbstractBase
 * @package QCubed\Query\Condition
 * @abstract
 * @was QQCondition
 */
abstract class AbstractBase extends \QCubed\AbstractBase {
	protected $strOperator;
	protected $blnProcessed;

	abstract public function UpdateQueryBuilder(Builder $objBuilder);

	public function __toString() {
		return 'QQCondition Object';
	}


	/**
	 * Used internally by QCubed Query to get an individual where clause for a given condition
	 * Mostly used for conditional joins.
	 *
	 * @param Builder $objBuilder
	 * @param bool|false $blnProcessOnce
	 * @return null|string
	 * @throws \Exception
	 * @throws Caller
	 */
	public function GetWhereClause(Builder $objBuilder, $blnProcessOnce = false) {
		if ($blnProcessOnce && $this->blnProcessed)
			return null;

		$this->blnProcessed = true;

		try {
			$objConditionBuilder = new PartialBuilder($objBuilder);
			$this->UpdateQueryBuilder($objConditionBuilder);
			return $objConditionBuilder->GetWhereStatement();
		} catch (Caller $objExc) {
			$objExc->IncrementOffset();
			$objExc->IncrementOffset();
			throw $objExc;
		}
	}

	/**
	 * @abstract
	 * @param string $strTableName
	 * @return bool
	 */
	public function EqualTables($strTableName) {
		return true;
	}
}

