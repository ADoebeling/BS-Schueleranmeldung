<?php session_start();

// Includes
require_once('../inc/config.inc.php');
require_once(DIR_CLASSES.'schueler.class.php');
require_once(DIR_CLASSES.'session.class.php');

// Programm Start
$schueler = new schueler();
$error = $schueler->validate($_REQUEST['form']);

$session = new session($form['captcha']);
$seite = $session->getSeite($_REQUEST['form'], count($error));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!--

Staatliche Berufsschule Erlangen

Projekt: 			Schüleranmeldung
Team:				Döbeling, Kapp, Stepper, Wittmann
Klasse:				IFA 12B von 2008/09

Copyright: 			(C) 2009 Andreas Döbeling 
eMail:				Kontakt AT Doebeling PUNKT de

Dieser Hinweis darf nicht entfernt od. bearbeitet werden!

-->

	<head>
		<title>.: Berufsschule Erlangen :: Anmeldung :.</title>
		<link rel="stylesheet" type="text/css" href="main.css" />
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
	</head>

	<body tyle="text-align:center;">
		<form action="" method="post">


<div style="border:5px solid red; width:620px; padding:10px; margin:20px auto; background-color:white">
			<b>ACHTUNG:</b> Dies ist ist eine DEMO-Version des Anmeldescriptes. Dies ist <b>NICHT</b> die offizielle Anmeldung der Berufsschule Erlangen. <a href="https://github.com/ADoebeling/BS-Schueleranmeldung" target="_blank">Weitere Informationen finden Sie hier</a><br><br>

			Diese Demo ist voll funktionsfähig und speichert die von Ihnen eingegebenen Daten. Diese werden unverschlüsselt übertragen und sind im Anschluss öffentlich einsehbar. Daher bitte nur Testdatensätze einspielen. Danke.
		</div>
			<!-- <h1>.: Berufsschule Erlangen :: Anmeldung :.</h1> -->
			<table id="box">
				<tr>
					<td><img src="logo.png" /></td>
						<?php
							echo "<td rowspan=\"$navRowspan\" id=\"inhalt\">";
							include(DIR_SEITE.$seite.'.inc.php');
							echo "</td>";
						?>
					</tr>	
			<?php
			
				foreach ($nav as $file => $titel)
				{
					$tmpClass = $seite != $file ? "nav" : "navAktiv";	
					echo "	<tr>\n		<td class=\"$tmpClass\">$titel</td>";
					echo "\n	</tr>\n\n";
				}
				?>
			</table>		
		</form>
		<!-- Diese Zeile darf nicht bearbeitet/gelöscht/ausgeblendet werden -->
		<div id="footer">Copyright &copy; 2009 Staatl. Berufsschule Erlangen (<a href="http://www.Doebeling.de" style="color:black">Döbeling</a>, Kapp, Stepper, Wittmann) </div>
	
<?=$session->debug('<pre>'.print_r($_SESSION, true).'</pre>'); ?>
<?=$debugMsg?>


	</body>
</html>



