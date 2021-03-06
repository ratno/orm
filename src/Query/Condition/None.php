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

/**
 * Class None
 * @package QCubed\Query\Condition
 * @was QQConditionNone
 */
class None extends AbstractBase implements ConditionInterface {
	/**
	 * @param $mixParameterArray
	 * @throws Caller
	 */
	public function __construct($mixParameterArray) {
		if (count($mixParameterArray))
			throw new Caller('None clause takes in no parameters', 3);
	}
	public function UpdateQueryBuilder(Builder $objBuilder) {
		$objBuilder->AddWhereItem('1=0');
	}
}
