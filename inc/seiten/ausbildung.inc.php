<h2>Ausbildung</h2>

<?php if (!empty($error)) foreach ($error as $tmp) $session->fehler($tmp); ?>

	<table id="formtable">
		<tr>
			<td>Art der Anmeldung</td>
			<td style="width:370;">
				<?=$schueler->getHtmlSelect('artDesVertrags', array('Ausbildungsvertrag','BVJ','ohne Beruf/arbeitslos','ungelernte Arbeitskraft','Teilnehmer an Lehrgang der Arbeitsverwaltung'), true, null, null, 240); /*'Umschüler',*/?>
			</td>	
		</tr>
<?php
if ($_SESSION['artDesVertrags'] == 'Ausbildungsvertrag')
{
?>		
		<tr>
			<td>Ausbildungsberuf</td> 
			<td style="width:370;">
				<?=$schueler->getHtmlSelect('ausbildungsberufId', 'ausbildungsberuf', false, 'berufsbezeichnung', null, 240);?>
			</td>	
		</tr>
		<tr>
<?
}
if ($_SESSION['artDesVertrags'] == 'Ausbildungsvertrag')
{
?>
			<td>Umschüler</td>
			<td style="width:370;">
				<?=$schueler->getHtmlSelect('umschueler', array('nein', 'ja'), false);?>
			</td>	
		</tr>
<?
}
?>
		<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
<?php
if ($_SESSION['artDesVertrags'] == 'Ausbildungsvertrag' || $_SESSION['artDesVertrags'] == 'ungelernte Arbeitskraft')
{
?>
		<tr>
			<td>Ausbildungsbetrieb</td>
			<td>
				<?=$schueler->getHtmlInput('firma', 240, 50)?>
			</td>	
		</tr>
		
		<tr>
			<td>Straße, HausNr.</td>
			<td>
				<?=$schueler->getHtmlInput('ausbStrasse', 200, 30)?> <?=$schueler->getHtmlInput('ausbHausnummer', 40, 10)?>
			</td>	
		</tr>
		<tr>
			<td>PLZ, Ort</td>
			<td>
				<?=$schueler->getHtmlInput('ausbPostleitzahl', 50, 5, '910__')?>
				<?=$schueler->getHtmlInput('ausbWohnort', 190, 30, 'Erlangen')?>
			</td>	
		</tr>
		
		<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
		
		<tr>
			<td>Telefon, Fax</td>
			<td>
				<?=$schueler->getHtmlInput('ausbTelefon', 120, 25)?>
				<?=$schueler->getHtmlInput('ausbFax', 120, 50)?>
			</td>	
		</tr>
		<tr>
			<td>eMail</td>
			<td>
				<?=$schueler->getHtmlInput('ausbEmail', 120, 25)?>
			</td>	
		</tr>
		
		<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
<?php
}
?>		
		<tr>
			<td>Ausbildungsbeginn</td>
			<td style="width:370;">
				<?php
				for($i = 1; $i <= 31; $i++) $array[] = $i;
				$schueler->getHtmlSelect('ausbAnfTag', $array, true, NULL, NULL, 60);

				echo " ";
				
				$array = array(1 => 'Januar', 2 => 'Februar', 3 => 'März', 4 => 'April', 5 => 'Mai',6  => 'Juni', 7 => 'Juli', 8 => 'August', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Dezember');
				$schueler->getHtmlSelect('ausbAnfMon', $array, null, null, 9);

				echo " ";
				$array = NULL;
				
				for($i = date('Y')-1; $i <= date('Y')+1; $i++) $array[] = $i;
				$schueler->getHtmlSelect('ausbAnfJahr', $array, true, NULL, date('Y'), 60);
				?>
			</td>	
		</tr>
		<tr>
			<td>Ausbildungsende</td>
			<td style="width:370;">
				<?php
				$array = NULL;
				for($i = 1; $i <= 31; $i++) $array[] = $i;
				$schueler->getHtmlSelect('ausbEndTag', $array, true, NULL, 1, 60);

				echo " ";
				
				$array = array(1 => 'Januar', 2 => 'Februar', 3 => 'März', 4 => 'April', 5 => 'Mai',6  => 'Juni', 7 => 'Juli', 8 => 'August', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Dezember');
				$schueler->getHtmlSelect('ausbEndMon', $array, null, null, 8);

				echo " ";
				$array = NULL;
				
				for($i = date('Y')+1; $i <= date('Y')+4; $i++) $array[] = $i;
				$schueler->getHtmlSelect('ausbEndJahr', $array, true, NULL, date('Y')+3, 60);
				?>
			</td>	
		</tr>
		<tr>
			<td>Eintritt in BS</td>
			<td style="width:370;">
				<?php
				$array = NULL;
				for($i = 1; $i <= 31; $i++) $array[] = $i;
				$schueler->getHtmlSelect('bsAnfTag', $array, true, NULL, NULL, 60);

				echo " ";
				
				$array = array(1 => 'Januar', 2 => 'Februar', 3 => 'März', 4 => 'April', 5 => 'Mai',6  => 'Juni', 7 => 'Juli', 8 => 'August', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Dezember');
				$schueler->getHtmlSelect('bsAnfMon', $array, null, null, 9);

				echo " ";
				$array = NULL;
				
				for($i = date('Y')-1; $i <= date('Y')+1; $i++) $array[] = $i;
				$schueler->getHtmlSelect('bsAnfJahr', $array, true, NULL, date('Y'), 60);
				?>
			</td>	
		</tr>
		


	</table>

<div id="weiterzurueck">
<input type="submit" name="form[weiter]" value="Weiter" id="weiter" />
<input type="submit" name="form[weiter]" value="Zurück" id="zurueck" />
</div>