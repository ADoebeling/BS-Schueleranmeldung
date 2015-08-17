<h2><?=isset($_SESSION['alter']) && $_SESSION['alter'] < 18 ? 'Erziehungsberechtigte' : 'Kontaktpersonen'?></h2>

<?php if (!empty($error)) foreach ($error as $tmp) $session->fehler($tmp);

$vormund = $_SESSION['alter'] < 18 ? array('Vater', 'Mutter', 'Vormund') : array('Vater', 'Mutter', 'Vormund', 'Sonstiges');

?>

	<table id="formtable">
		<!-- Abstand -->
		<tr><td style="height:20px" colspan="2"></td></tr>	
	
		
		<tr>
			<td><b>1. <?=isset($_SESSION['alter']) && $_SESSION['alter'] < 18 ? 'Erziehungsb.' : 'Kontaktperson'?></b></td>
			<td>
				<?=$schueler->getHtmlSelect('erzbStatus1', $vormund, true)?>
			</td>	
		</tr>
		<tr>
			<td>Vorname, Nachname</td>
			<td>
				<?=$schueler->getHtmlInput('erzbVorname1', 120, 40)?>
				<?=$schueler->getHtmlInput('erzbNachname1', 120, 40)?>
			</td>	
		</tr>
		
		<tr>
			<td>Straﬂe und Hausnummer</td>
			<td>
				<?=$schueler->getHtmlInput('erzbStrasse1', 120, 30)?> <?=$schueler->getHtmlInput('erzbHausnummer1', 120, 10)?>
			</td>	
		</tr>
		<tr>
			<td>PLZ und Ort</td>
			<td>
				<?=$schueler->getHtmlInput('erzbPostleitzahl1', 120, 5)?>
				<?=$schueler->getHtmlInput('erzbWohnort1', 120, 30)?>
			</td>	
		</tr>
		
		<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
		
		<tr>
			<td>Telefon und eMail</td>
			<td>
				<?=$schueler->getHtmlInput('erzbTelefon1', 120, 25)?>
				<?=$schueler->getHtmlInput('erzbEmail1', 120, 50)?>
			</td>	
		</tr>
		
				<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
		<tr>
			<td><b>2. <?=isset($_SESSION['alter']) && $_SESSION['alter'] < 18 ? 'Erziehungsb.' : 'Kontaktperson'?></b></td>
			<td>
				<?=$schueler->getHtmlSelect('erzbStatus2', $vormund, true)?>
			</td>	
		</tr>
		<tr>
			<td>Vorname, Nachname</td>
			<td>
				<?=$schueler->getHtmlInput('erzbVorname2', 120, 40)?>
				<?=$schueler->getHtmlInput('erzbNachname2', 120, 40)?>
			</td>	
		</tr>
		
		<tr>
			<td>Straﬂe und Hausnummer</td>
			<td>
				<?=$schueler->getHtmlInput('erzbStrasse2', 120, 30)?> <?=$schueler->getHtmlInput('erzbHausnummer2', 120, 10)?>
			</td>	
		</tr>
		<tr>
			<td>PLZ und Ort</td>
			<td>
				<?=$schueler->getHtmlInput('erzbPostleitzahl2', 120, 5)?>
				<?=$schueler->getHtmlInput('erzbWohnort2', 120, 30)?>
			</td>	
		</tr>
		
		<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
		
		<tr>
			<td>Telefon und eMail</td>
			<td>
				<?=$schueler->getHtmlInput('erzbTelefon2', 120, 25)?>
				<?=$schueler->getHtmlInput('erzbEmail2', 120, 50)?>
			</td>	
		</tr>

	</table>

<div id="weiterzurueck">
<input type="submit" name="form[weiter]" value="Weiter" id="weiter" />
<input type="submit" name="form[weiter]" value="Zur¸ck" id="zurueck" />
</div>