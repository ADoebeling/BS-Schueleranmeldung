<h2>Schule</h2>

<?php if (!empty($error)) foreach ($error as $tmp) $session->fehler($tmp); ?>

	<table id="formtable">
		<tr>
			<td>Letzte Schule, Ort</td>
			<td>
				<?=$schueler->getHtmlInput('letzteSchuleName', 120, 50);?>
				<?=$schueler->getHtmlInput('letzteSchuleOrt', 120, 50);?>
			</td>	
		</tr>

		<tr>
			<td>Letzte Schulart</td>
			<td>
				<?=$schueler->getHtmlSelect('zuletztBesuchteSchulartId', 'zuletztbesuchteschulart', false, 'schulart', null, 240);?>
			</td>	
		</tr>
		<tr>
			<td>Letzter Abschluss</td>
			<td>
				<?=$schueler->getHtmlSelect('abschlussAnSchulartId', 'abschlussanschulart', false, 'schulart', null, 240);?>
			</td>	
		</tr>
		
		<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
		
		<tr>
			<td>Höchster Abschluss</td>
			<td>
				<?=$schueler->getHtmlSelect('hoechsterBereitsErreichterAbschlussId', 'hoechsterbereitserreichterabschluss', false, 'abschluss', null, 240);?>
			</td>	
		</tr>
		
		<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
	</table>

<div id="weiterzurueck">
<input type="submit" name="form[weiter]" value="Weiter" id="weiter" />
<input type="submit" name="form[weiter]" value="Zurück" id="zurueck" />
</div>
