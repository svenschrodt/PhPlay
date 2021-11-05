<?php declare(strict_types=1);
/**
 * SvenSchrodt\PhPlay\BinaryArithmetic\Entity\Nibble - Class
 *
 * @package PhPlay
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/PhPlay
 * @version 0.1
 * @since 05.11.21
 */


namespace SvenSchrodt\PhPlay\BinaryArithmetic\Entity;
use SvenSchrodt\PhPlay\BinaryArithmetic\Entity\BitSequence;
use SvenSchrodt\PhPlay\BinaryArithmetic\Foundation;

class Nibble extends BitSequence
{
    public function __construct(array $values =[])
    {
        //@TODO check if (count($values)!==8) !!
        if(!count($values)) {
            $values = array_fill(Foundation::LSB_ALL, Foundation::MSB_NIBBLE +1, false);

        }
        parent::__construct(Foundation::LSB_ALL, Foundation::MSB_BYTE, $values);
    }
}