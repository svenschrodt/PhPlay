<?php declare(strict_types=1);
/**
 * PhPlayTest\BitSequenceTest - Class
 *
 * @package PhPlay
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/PhPlay
 * @version 0.1
 * @since 05.11.21
 */


namespace PhPlayTest;

use PHPUnit\Framework\TestCase;
use SvenSchrodt\PhPlay\BinaryArithmetic\Entity\BitSequence;

class BitSequenceTest extends TestCase
{
    public function testBasix()
    {
        $foo = new BitSequence(0, 7, [true, false, false, true, false, false, true, false]);
        $this->assertSame(73, $foo->getNumericValue());
        $this->assertSame(73, bindec($foo->getLiteral()));

    }
}