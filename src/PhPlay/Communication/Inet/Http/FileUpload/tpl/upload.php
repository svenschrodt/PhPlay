<pre>
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
var_dump($_FILES);
//move_uploaded_file($_FILES['File']['tmp_name']['CV'] , 'CV_' . $_FILES['File']['name']['CV'] );
//move_uploaded_file($_FILES['File']['tmp_name']['profile'] , 'PROFILE__' . $_FILES['File']['name']['profile'] );
$d = dir(".");
echo "Handle: " . $d->handle . "\n";
echo "Pfad: " . $d->path . "\n";
while (false !== ($entry = $d->read())) {
    echo $entry."\n";
}
$d->close();