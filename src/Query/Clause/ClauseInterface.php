<?php
/**
 *
 * Part of the QCubed PHP framework.
 *
 * @license MIT
 *
 */

namespace QCubed\Query\Clause;

use QCubed\Query\Builder;

/**
 * Class AbstractBase
 * Base class for all query clauses
 * @package QCubed\Query\Clause
 * @was QQClause
 */
interface ClauseInterface {
	public function UpdateQueryBuilder(Builder $objBuilder);
	public function __toString();
}
