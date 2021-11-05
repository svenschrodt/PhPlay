<?php declare(strict_types=1);
/**
 *  PhPlay
 *
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @package PhPlay
 * @since 2021-11-09
 * @link https://github.com/svenschrodt/PhPlay
 * @link https://travis-ci.org/svenschrodt/PhPlay
 * @license https://github.com/svenschrodt/PhPlay/blob/master/LICENSE.md
 * @copyright Sven Schrodt<sven@schrodt-service.net>
 * @version 0.1
 */


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once 'src/GlobalHelper.php';
use SvenSchrodt\GlobalHelper as GH;

/**
 * Constant for application PHP namespace
 *
 * @var string
 */
define('PHPLAY_NS', 'SvenSchrodt\\PhPlay');


/**
 * Constant for path prefix to lib location
 *
 * @var string
 */
define('PHPLAY_LIB_PREFIX', 'src/');

define('VENDOR_PREFIX', 'SvenSchrodt');

/**
 * Registering project specific auto loading
 */
spl_autoload_register(function ($className) {


    // Check if namespace of class to be instantiated is belonging to us
    if (substr($className, 0, strlen(PHPLAY_NS)) === PHPLAY_NS) {

        $file = PHPLAY_LIB_PREFIX . str_replace([VENDOR_PREFIX, '\\'], ['', '/'], $className) . '.php';

        // Check if destination class file exists  and include it
        if (file_exists($file)) {
            require_once $file;
        } else { // throw exception, if not
            throw new \ErrorException(GH::getErrormessage(404,[$file, $className]));
        }
    }


});

