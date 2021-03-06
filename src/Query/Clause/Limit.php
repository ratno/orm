<?php
/**
 *
 * Part of the QCubed PHP framework.
 *
 * @license MIT
 *
 */

namespace QCubed\Query\Clause;

use QCubed\AbstractBase;
use QCubed\Exception\Caller;
use QCubed\Query\Builder;
use QCubed\Type;

/**
 * Class Limit
 * @package QCubed\Query\Clause
 * @was QQLimitInfo
 */
class Limit extends AbstractBase implements ClauseInterface {
	protected $intMaxRowCount;
	protected $intOffset;
	public function __construct($intMaxRowCount, $intOffset = 0) {
		try {
			$this->intMaxRowCount = Type::Cast($intMaxRowCount, Type::Integer);
			$this->intOffset = Type::Cast($intOffset, Type::Integer);
		} catch (Caller $objExc) {
			$objExc->IncrementOffset();
			throw $objExc;
		}
	}
	public function UpdateQueryBuilder(Builder $objBuilder) {
		if ($this->intOffset)
			$objBuilder->SetLimitInfo($this->intOffset . ',' . $this->intMaxRowCount);
		else
			$objBuilder->SetLimitInfo($this->intMaxRowCount);
	}
	public function __toString() {
		return 'QQLimitInfo Clause';
	}

	public function __get($strName) {
		switch ($strName) {
			case 'MaxRowCount':
				return $this->intMaxRowCount;
			case 'Offset':
				return $this->intOffset;
			default:
				try {
					return parent::__get($strName);
				} catch (Caller $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
		}
	}
}
