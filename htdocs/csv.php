<?php

// Includes
require_once('../inc/config.inc.php');
require_once(DIR_CLASSES.'schueler.class.php');

if ($_POST['pwd'] == CSV_PWD)
{
	$s = new schueler();
	$csv = $s->getCsv('csv');
	header("Content-Type: text/csv");
	header("Content-Disposition: attachment; filename=schueler.csv"); 
	echo $csv;
}
else
{
	?>
<form action="" method="post">
Passwort: <input type="password" name="pwd"><input type="submit">
</form>
	<?php
}
?>
