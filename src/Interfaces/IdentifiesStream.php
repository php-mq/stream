<?php declare(strict_types=1);
/**
 * @author hollodotme
 */

namespace PHPMQ\Stream\Interfaces;

/**
 * Interface IdentifiesStream
 * @package PHPMQ\Stream\Interfaces
 */
interface IdentifiesStream extends RepresentsString
{
	public function equals( IdentifiesStream $other ) : bool;
}
