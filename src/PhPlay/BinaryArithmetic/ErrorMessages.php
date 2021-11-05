<?php declare(strict_types=1);
/**
 * SvenSchrodt\PhPlay\BinaryArithmetic\ErrorMessages - Class
 *
 * @package PhPlay
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/PhPlay
 * @version 0.1
 * @since 05.11.21
 */


namespace SvenSchrodt\PhPlay\BinaryArithmetic;

class ErrorMessages
{
    const ERROR_MAPPING = [
        0 => 'Undefined error',

        5 => 'Out of bound error: the value for "numbering" MUST be between LSB: %s and MSB: %s - %s given!'
];


    public static function getMessage(int $code, array $message)
    {
        switch ($code) {
            case 5:
                return sprintf(self::ERROR_MAPPING[$code], $message[0], $message[1], $message[2]);

            case '0':
            default :
                return self::ERROR_MAPPING[0];
        }
    }
}