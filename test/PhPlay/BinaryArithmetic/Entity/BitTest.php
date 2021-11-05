<?php declare(strict_types=1);
/**
 * PhPlayTest\BitTest - Class
 *
 * @package PhPlay
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/PhPlay
 * @version 0.1
 * @since 05.11.21
 */


namespace PhPlayTest;
use PHPUnit\Framework\TestCase;
use SvenSchrodt\PhPlay\BinaryArithmetic\Entity\Bit;

class BitTest extends TestCase
{
    public function testBasics()
    {
        $foo = new Bit(true, 3);
        $this->assertSame($foo->getNumericValue(), 8);
        $foo->setNumbering(5);
        $this->assertSame($foo->getNumericValue(), 32);
        $this->assertSame($foo->getIntValue(), 1);
    }
}