<?php
use SvenSchrodt\PhPlay\Frontend\Html\PhpTemplate;

$t = new PhpTemplate('foo.phtml');
$t->title = 'Hallo Welt!';
$t->assign('author', 'Bobo');

$t->list = ['Bobo', 'KnappeSven', 'Darth1904'];
$t->main = 'Lorem ipsum dolorit amt F00!!';
$doc = new PhpTemplate('doc.phtml');
$doc->title = $t->title;
$doc->body = $t;
echo $doc;

try {
$foo = new \SvenSchrodt\PhPlay\BinaryArithmetic\Entity\Nerd();

} catch (Exception $e) {
echo $e->getMessage();
}

use SvenSchrodt\GlobalHelper as GH;

var_dump(new Bit(true, 5));
echo GH::getVendorPrefix('Foo\Bar');
echo PHP_EOL;
echo GH::getVendorPrefix('FooBar');
echo PHP_EOL;
echo PHP_INT_MAX;

// foo.phtml