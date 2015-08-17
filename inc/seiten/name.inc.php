<h2>Schülerdaten</h2>

<?php if (!empty($error)) foreach ($error as $tmp) $session->fehler($tmp); ?>

	<table id="formtable">
		<tr>
			<td>Anrede</td>
			<td style="width:280px;">
				<?=$schueler->getHtmlSelect('geschlecht', array('männlich' => 'Herr', 'weiblich' => 'Frau'))?>
			</td>	
		</tr>
		<tr>
			<td>Vorname, Name</td>
			<td>
				<?=$schueler->getHtmlInput('vorname', 120, 40)?>
				<?=$schueler->getHtmlInput('nachname', 120, 40)?>
			</td>	
		</tr>
		
		<tr>
			<td>Straße, HausNr.</td>
			<td>
				<?=$schueler->getHtmlInput('strasse', 200, 30)?> <?=$schueler->getHtmlInput('hausnummer', 40, 10)?>
			</td>	
		</tr>
		<tr>
			<td>PLZ, Ort</td>
			<td>
				<?=$schueler->getHtmlInput('postleitzahl', 50, 5, '910__')?>
				<?=$schueler->getHtmlInput('wohnort', 190, 30, 'Erlangen')?>
			</td>	
		</tr>
		<tr>
			<td>Staatsangehörigkeit</td>
			<td>
				<?=$schueler->getHtmlSelect('staatsangehoerigkeitId', 'land', false, 'bezeichnung', 54, 120);?>
			</td>	
		</tr>
		<?php

		if ($_SESSION['staatsangehoerigkeitId'] != 54 && !empty($_SESSION['staatsangehoerigkeitId']))
		{
		?>
		<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
		
		<tr>
			<td>Zuzug in BRD</td>
			<td>
				<?=$schueler->getHtmlSelect('zugangInBrd', array('nein', 'Aussiedler' => 'Aussiedler','Kriegsflüchtling' => 'Kriegsflüchtling','Asylant' => 'Asylant','Asylbewerber' => 'Asylbewerber','sonstiger Zuzug' => 'sonstiger Zuzug'), true);?>
			</td>	
		</tr>
		
<tr>
			<td>Herkunftsland</td>
			<td>
				<?=$schueler->getHtmlSelect('herkunftslandId', 'land', false, 'bezeichnung', 219, 120);?>
			</td>	
		</tr>
		<tr>
			<td>Zuzugsdatum</td>
			<td>
				<?php
				for($i = 1; $i <= 31; $i++) $array[] = $i;
				$schueler->getHtmlSelect('zuzugsTag', $array, true, NULL, NULL, 60);

				echo " ";
				
				$array = array(1 => 'Januar', 2 => 'Februar', 3 => 'März', 4 => 'April', 5 => 'Mai',6  => 'Juni', 7 => 'Juli', 8 => 'August', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Dezember');
				$schueler->getHtmlSelect('zuzugsMon', $array);

				echo " ";
				$array = NULL;
				
				for($i = date('Y'); $i >= date('Y')-65; $i--) $array[] = $i;
				$schueler->getHtmlSelect('zuzugsJahr', $array, true, NULL, NULL, 60);
				?>
			</td>	
		</tr>	
			
		<?php
		}

		?>		
		
		<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
		
		<tr>
			<td>Telefon, eMail</td>
			<td>
				<?=$schueler->getHtmlInput('telefon', 120, 25)?>
				<?=$schueler->getHtmlInput('email', 120, 50)?>
			</td>	
		</tr>
		
		<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
		
		<tr>
			<td>Geburtsdatum</td>
			<td>
				<?php
				for($i = 1; $i <= 31; $i++) $array[] = $i;
				$schueler->getHtmlSelect('gebTag', $array, true, NULL, NULL, 60);

				echo " ";
				
				$array = array(1 => 'Januar', 2 => 'Februar', 3 => 'März', 4 => 'April', 5 => 'Mai',6  => 'Juni', 7 => 'Juli', 8 => 'August', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Dezember');
				$schueler->getHtmlSelect('gebMon', $array);

				echo " ";
				$array = NULL;
				
				for($i = date('Y')-15; $i >= date('Y')-65; $i--) $array[] = $i;
				$schueler->getHtmlSelect('gebJahr', $array, true, NULL, NULL, 60);
				?>
			</td>	
		</tr>
		
		<tr>
			<td>Geburtsort und -Land</td>
			<td>
				<?=$schueler->getHtmlInput('geburtsStadt', 120, 50)?>
				<?=$schueler->getHtmlSelect('geburtsLandId', 'land', false, 'bezeichnung', 54, 120);?>
			</td>	
		</tr>

		<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
		
		<tr>
			<td>Familienstand</td>
			<td>
					<?php 
					$array = array('ledig', 'verheiratet', 'geschieden', 'getrennt lebend');
					$schueler->getHtmlSelect('familienstand', $array, true)
					?>		
			</td>	
		</tr>
		<tr>
			<td>Wohnhaft bei</td>
			<td>
				<?php
				$array = array('Eltern', 'Vormund', 'eigene Wohnung');
				$schueler->getHtmlSelect('wohnhaftBei', $array, true)
				?>
			</td>	
		</tr>
		<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
		<tr>
			<td>Bekenntnis</td>
			<td>
					<?php 
					$array = array('ev', 'rk', 'sonst');
					$schueler->getHtmlSelect('bekenntnis', $array, true);
					
					if ($_SESSION['bekenntnis'] == 'sonst')
					{
						echo " ";
						$schueler->getHtmlInput('bekenntnisfreiText', 120, 40);
					}
					?>		
			</td>	
		</tr>	
		<tr>
			<td>Religionsunterricht</td>
			<td>
				<?php
				$array = array('ev', 'rk', 'Ethik');
				$schueler->getHtmlSelect('religionsunterricht', $array, true);
				
				if ($_SESSION['religionsunterricht'] == 'Ethik')
				{
					echo " ";
					
					$array = array('Austritt', 'Religionslosigkeit', 'kein Religionsunterricht');
					$schueler->getHtmlSelect('grundFuerEthik', $array, true);
				}
				?>
			</td>	
		</tr>
		
		<!-- Abstand -->
		<tr><td style="height:20px"></td></tr>
		
		<tr>
			<td>Einschränkung</td>
			<td>
				<?php
				$array = array(0 => 'keine', 1 => 'Lese-/Rechtschreibschwäche', 2 => 'Lese-/Rechtschreibstörung');
				$schueler->getHtmlSelect('leseRecht', $array, null, null, null, 240)
				?>
			</td>	
		</tr>

	</table>

<div id="weiterzurueck">
<input type="submit" name="form[weiter]" value="Weiter" id="weiter" />
<input type="submit" name="form[weiter]" value="Zurück" id="zurueck" />
</div>