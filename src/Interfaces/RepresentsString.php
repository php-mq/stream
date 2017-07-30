<?php declare(strict_types=1);
/**
 * @author hollodotme
 */

namespace PHPMQ\Stream\Interfaces;

/**
 * Interface RepresentsString
 * @package PHPMQ\Stream\Interfaces
 */
interface RepresentsString extends \JsonSerializable
{
	public function toString() : string;

	public function __toString() : string;
}
