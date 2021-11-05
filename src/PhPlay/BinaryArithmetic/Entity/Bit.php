<?php declare(strict_types=1);
/**
 * SvenSchrodt\PhPlay\BinaryArithmetic\Entity\Bit - Class
 *
 * @package PhPlay
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/PhPlay
 * @version 0.1
 * @since 05.11.21
 */


namespace SvenSchrodt\PhPlay\BinaryArithmetic\Entity;
use SvenSchrodt\PhPlay\BinaryArithmetic\Foundation;

class Bit
{


    /**
     * Flag, if bit ist set to true (int:1) || false (int:1)
     *
     * @see $intValue
     * @var bool
     */
    protected bool $value;

    /**
     * Integer representation of Bit's current state
     *
     * @see $value
     * @var int
     */
    protected int $intValue;

    /**
     * Numbering of current Bits's position (o...n)
     *
     * @var int|mixed
     */
    protected int $numbering;

    /**
     * Numeric value (= $intValue * 2^$numbering)
     *
     * @var int
     */
    protected int $numericValue;



    public function __construct(bool $value = true, $numbering=0)
    {
        $this->value = $value;
        $this->numbering = $numbering;
        $this->update();
    }

    protected function update()
    {
        $this->intValue = ($this->value) ? 1 :0;
        $this->numericValue = $this->intValue * pow(Foundation::BASE, $this->numbering );
    }

    /**
     * @return bool
     */
    public function isValue(): bool
    {
        return $this->value;
    }

    /**
     * @param bool $value
     * @return Bit
     */
    public function setValue(bool $value): Bit
    {
        $this->value = $value;
        $this->update();
        return $this;
    }

    /**
     * @return int|mixed
     */
    public function getNumbering(): mixed
    {
        return $this->numbering;
    }

    /**
     * @param int|mixed $numbering
     * @return Bit
     */
    public function setNumbering(mixed $numbering): Bit
    {
        $this->numbering = $numbering;
        $this->update();
        return $this;
    }

    /**
     * @return int
     */
    public function getIntValue(): int
    {
        return $this->intValue;
    }

    /**
     * @return int
     */
    public function getNumericValue(): int
    {
        return $this->numericValue;
    }


}