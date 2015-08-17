<h2>Anmeldung von Sch�lern</h2>

Willkommen bei der staatlichen Berufsschule Erlangen. Mittels des folgenden Formulares k�nnen 
Sie als Ausbilungsbetrieb oder als k�nftiger Auszubildender sich bei unserer 
Schule einschreiben.

<p />

Um mit der Anmeldung zu beginnen geben Sie bitte das links abgebildete Bild in das Eingabefeld daneben ein.
Dies ist notwendig um einen automatisierten Missbrauch zu verhinden.

<p />
<?php
if (!$session->getCaptchaCheck() && !empty($form['captcha']))
{
	$session->fehler("Bitte geben Sie das Captcha korrekt ein");
}
if ($session->getCaptchaCheck() != true)
{
	?>
	<img src="<?=DIR_CAPTCHA.md5(session_id())?>.png"/>
	<input type="text" name="form[captcha]">
	<?php 
}
?>

<input type="submit" name="form[weiter]" value="Weiter" id="weiter">

<p />
<?php

if ($session->getCaptchaCheck() != true)
{
	?>
	Sollt das Bild nicht lesbar sein, dr�cken Sie bitte auf "Weiter". Es wird ein neues Bild f�r Sie generiert.
	<?php
}
?>
