<?php declare(strict_types=1);
/**
 * SvenSchrodt\GlobalHelper - Class handling actions in gloobal context( bootstrapping etc.)
 *
 * @package PhPlay
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @link https://github.com/svenschrodt/PhPlay
 * @version 0.1
 * @since 05.11.21
 */


namespace SvenSchrodt;

class GlobalHelper
{
    const ERROR_AUTOLOAD_404 = 'No such file: %s found, when trying to invoke "%s"';

    const ERROR_MAPPING = [
        0 => 'An undefined error occured',
        404 => self::ERROR_AUTOLOAD_404,
    ];

    public static function getErrormessage(int $code, array $info = [])
    {
        if (!array_key_exists($code, self::ERROR_MAPPING)) {
            $code = 0;
        }

        switch ($code) {
            case 0:
                return self::ERROR_MAPPING;
                break;

            case 404:
                return sprintf(self::ERROR_AUTOLOAD_404, $info[0], $info[1]);
                break;
        }
    }

    public static function getVendorPrefix(string $fqClassName)
    {
        if(!strstr($fqClassName, '\\')) {
            return $fqClassName;
        }
        // Getting parts of (sub) namespaces from class name
        $parts = explode('\\', $fqClassName);
        return $parts[0];
    }
}