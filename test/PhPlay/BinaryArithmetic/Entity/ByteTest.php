<?php declare(strict_types=1);
/**
 * PhPlayTest\ByteTest - Class
 *
 * @package PhPlay
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/PhPlay
 * @version 0.1
 * @since 05.11.21
 */


namespace PhPlayTest;

use SvenSchrodt\PhPlay\BinaryArithmetic\Entity\Byte;

class ByteTest extends \PHPUnit\Framework\TestCase
{
    public function testBasix()
    {
        $foo = new Byte([true, true, true, true, true, true, true, true]);
        $this->assertSame(255, $foo->getNumericValue());

        $foo = new Byte([false, true, true, true, true, true, true, false]);
        $this->assertSame(126, $foo->getNumericValue());
        $this->assertSame('01111110', $foo->getLiteral());
        $foo->setBit(7, true);
        $this->assertSame('11111110', $foo->getLiteral());
        $this->assertSame(254, $foo->getNumericValue());
    }

    public function testExceptionOnOutOfBound()
    {
        //
        $this->expectException('InvalidArgumentException');
        $foo = new Byte([true, true, true, true, true, true, true, true]);

        $foo->setBit(27, true);
    }

    public function testByteAutofill()
    {
        //
        $foo = new Byte();

        $this->assertTrue($foo->getLiteral() === '00000000');
    }
    public function testByteSettingSingleBits()
    {
        //
        $foo = new Byte();
        $foo->setBit(0, true);
        $foo->setBit(7, true);
        $this->assertSame(129, $foo->getNumericValue());
        $this->assertTrue($foo->getLiteral() === '10000001');
        $foo->flipBit(7);
        $foo->flipBit(1);
        var_dump($foo);
    }

}