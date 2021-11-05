<?php declare(strict_types=1);
/**
 *  PhPlay
 *
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @package PhPlay
 * @since 2021-12-23
 * @link https://github.com/svenschrodt/PhPlay
 * @link https://travis-ci.org/svenschrodt/PhPlay
 * @license https://github.com/svenschrodt/PhPlay/blob/master/LICENSE.md
 * @copyright Sven Schrodt<sven@schrodt-service.net>
 * @version 0.1
 */

require_once 'Bootstrap.php';

use SvenSchrodt\PhPlay\BinaryArithmetic\Entity\Byte;

$foo = new Byte([true, true, true, true, true, true, true, true]);

$foo->setBit(27, true);