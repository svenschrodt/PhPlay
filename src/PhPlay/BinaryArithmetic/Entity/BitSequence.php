<?php declare(strict_types=1);
/**
 * SvenSchrodt\PhPlay\BinaryArithmetic\Entity\BitSequence - Class
 *
 * @package PhPlay
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/PhPlay
 * @version 0.1
 * @since 05.11.21
 */


namespace SvenSchrodt\PhPlay\BinaryArithmetic\Entity;
use SvenSchrodt\PhPlay\BinaryArithmetic\ErrorMessages as EM;
class BitSequence
{

    protected int $lsb;

    protected int $msb;

    protected array $bits = [];

    protected int $numericValue;

    protected string $literal;



    public function __construct(int $lsb, int $msb, array $values)
    {

            //@todo check count($values) == [$lsb ... $msb]
        $this->lsb = $lsb;
        $this->msb = $msb;
        for ($i = 0; $i < count($values); $i++) {
            $this->bits[$lsb + $i] = new Bit($values[$i], $lsb+$i);
        }
        $this->update();
    }


    protected function update()
    {
        $this->numericValue = 0;
        $mirror = '';
        for($i=$this->lsb;$i<$this->msb+1;$i++) {
            $this->numericValue += $this->bits[$i]->getNumericValue();
            $mirror .= (string) $this->bits[$i]->getIntValue();
        }
        $this->literal = strrev($mirror);
    }

    /**
     * @return int
     */
    public function getNumericValue(): int
    {
        return $this->numericValue;
    }

    /**
     * @return string
     */
    public function getLiteral(): string
    {
        return $this->literal;
    }

    public function __toString(): string
    {
        return $this->getLiteral();
    }

    public function setBit(int $numbering, bool $value) : BitSequence
    {
        //@FIXME check, if index is set!
        if($numbering < $this->lsb || $numbering > $this->msb) {
            throw new \InvalidArgumentException(EM::getMessage(5, [$this->lsb, $this->msb, $numbering]));
        }
        $this->bits[$numbering]->setValue($value);
        $this->update();
        return $this;
    }

    public function flipBit(int $numbering) : BitSequence
    {
        $this->bits[$numbering]->setValue(!($this->bits[$numbering]->getValue() === true));
        $this->update();
         return $this;
    }
}