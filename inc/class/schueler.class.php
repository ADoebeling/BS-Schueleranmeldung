<?php
require_once 'MDB/QueryTool.php';
require_once 'Text/CAPTCHA.php';

define('DSN', 'mysql://'.DB_USER.':'.DB_PWD.'@'.DB_SERVER.'/'.DB_NAME);

/**
 * Klasse zur Erstellung des Schüleranmeldeformulars und
 * zum Hinzufügen der Daten zur Datenbank
 */
class schueler extends MDB_QueryTool
{	
	var 	$table        	= 'schueler';
	private $captcha;    
	public 	$validSession 	= false;

	/**
	 * Initiale Methoden
	 */
	public function __construct()
	{
		parent::__construct(DSN);
	}
	
	/*
	 * Validiert Benutzereingaben und schreibt diese in Session
	 * 
	 * @param array $form
	 */
	public function validate($form)
	{		
		if(!is_array($form)) return false;
				
		//Format: $error = array('captcha' => "Der von Ihnen eingebenene Captcha-Code ist ungülig")
		$error = array();

		// Scheiß LeseRechtschreibschwäche für StiWi
		if (isset($form['leseRecht']))
		{
			$form['leseSchreibSchwaeche'] = $form['leseRecht'] == 1 ? 1 : 0;
			$form['leseSchreibStoerung'] = $form['leseRecht'] == 2 ? 1 : 0;
		}

		foreach ($form as $feld => $wert)
		{
			$wert = strip_tags(trim($wert));
			$wert = mysql_escape_string($wert);
			$wert = htmlspecialchars($wert);
			
			switch ($feld)
			{
				/*
		 		* Daten
		 		*/
				case 'vorname':
					if (strlen($wert) < 3 || strlen($wert) > 40 || $wert == "bin") 
					$error[vorname] = "Bitte geben Sie den Vornamen ein";
					break;
					
				case 'nachname':
					if (strlen($wert) < 3 || strlen($wert) > 40 || $wert == "laden") 
					$error[$feld] = "Bitte geben Sie den Nachnamen ein";
					break;
					
				case 'strasse':
					if (strlen($wert) < 3 || strlen($wert) > 30) 
					$error[$feld] = "Bitte geben Sie die Straße ein";
					break;
					
				case 'hausnummer':
					if (strlen($wert) < 1 || strlen($wert) > 10) 
					$error[$feld] = "Bitte geben Sie die Hausnummer ein";
					break;
					
				case 'postleitzahl':
					//$wert = (int)$wert;
					//if (strlen((int)$wert) < 4 || strlen((int)$wert) > 5)
					if (strlen($wert) != 5) //|| !is_int($wert) 
					$error[$feld] = "Bitte geben Sie die PLZ ein".is_int($wert);
					break;
					
				case 'wohnort':
					if (strlen($wert) < 3 || strlen($wert) > 30) 
					$error[$feld] = "Bitte geben Sie den Wohnort ein";
					break;
					
				case 'telefon':
					if (strlen($wert) < 5 || strlen($wert) > 25) 
					$error[$feld] = "Bitte geben Sie die Telefonnummer (inkl. Vorwahl) ein";
					break;
					
				case 'email':
					if (!empty($wert) && (strlen($wert) < 6 || strlen($wert) > 50 || !strstr($wert, '@') || !strstr($wert, '.'))) 
					$error[$feld] = "Bitte korrigieren Sie die E-Mail-Adresse oder lassen Sie das Feld frei";
					break;
					
				case 'gebTag':
					$_SESSION['geburtsdatum'] = date('Y-m-d', mktime(NULL, NULL, NULL, $form['gebMon'], $form['gebTag'], $form['gebJahr']));
					$_SESSION['alter'] = $this->getAlter($_SESSION['geburtsdatum']);
					$tmp = date('d', mktime(NULL, NULL, NULL, $form['gebMon'], $form['gebTag'], $form['gebJahr']));
					if ($tmp != $wert || $_SESSION['alter'] <= 14 || $_SESSION['alter'] >= 65 )
					{
						$error[$feld] = "Bitte geben Sie Ihr korrektes Geburtsdatum ein";
					}
					$wert = $tmp;
					break;
					
				case 'gebMon':
					$wert = date('m', mktime(NULL, NULL, NULL, $form['gebMon'], $form['gebTag'], $form['gebJahr']));
					break;
					
				case 'gebJahr':
					$wert = date('Y', mktime(NULL, NULL, NULL, $form['gebMon'], $form['gebTag'], $form['gebJahr']));
					break;
								
				case 'geburtsStadt':
					if (strlen($wert) < 3 || strlen($wert) > 50) 
					$error[$feld] = "Bitte geben Sie den Geburtsort ein";
					break;
					
				case 'bekenntnis':
					// Ich erschieße denjenigen, der die Spalte "bekenntnisfreiText" angelegt hat...
					if ($wert == 'sonst' && (strlen($form['bekenntnisfreiText']) < 2 || strlen($form['bekenntnisfreiText']) > 40))
					{
						 $error['bekenntnisfreiText'] = "Sie haben als Bekenntnis 'Sonstiges' gewählt.\nBitte tragen Sie daher Ihr Bekenntnis in das nebenstehende Feld ein.";
					}
					break;
					
				case 'bekenntnisfreiText':
					if ($form['bekenntnis'] != 'sonst')
					{
						$wert = NULL;
					}
					break;
					
				case 'religionsunterricht':
					// Ich erschieße denjenigen, der die Spalte "bekenntnisfreiText" angelegt hat...
					if ($wert == 'Ethik' && empty($form['grundFuerEthik']))
					{
						 $error['grundFuerEthik'] = "Sie haben als Religionsunterricht 'Ethik' gewählt.\nBitte wählen Sie den Grund hierfür aus.";
					}
//					else if ($wert != 'Ethik')
//					{
//						$form[] = NULL;
//					}
					break;

				case 'grundFuerEthik':
					if ($form['religionsunterricht'] != 'Ethik') $wert = NULL;
					break;
					
				//Zuzugsdatum
				case 'zuzugsTag':
					$j = $form['zuzugsJahr'];
					$m = $form['zuzugsMon'];
					$t = $form['zuzugsTag'];
					$_SESSION['zugangInBrdAm'] = date('Y-m-d', mktime(NULL, NULL, NULL, $m, $t, $j));
					$tmp = date('d', mktime(NULL, NULL, NULL, $m, $t, $j));
					if ($tmp != $wert)
					{
						$error[$feld] = "Bitte geben Sie einen korrekten Beginn der Ausbildung an";
					}
					$wert = $tmp;
					break;
					
				case 'zuzugsMon':
					$j = $form['zuzugsJahr'];
					$m = $form['zuzugsMon'];
					$t = $form['zuzugsTag'];
					$wert = date('m', mktime(NULL, NULL, NULL, $m, $t, $j));
					break;
					
				case 'zuzugsJahr':
					$j = $form['zuzugsJahr'];
					$m = $form['zuzugsMon'];
					$t = $form['zuzugsTag'];
					$wert = date('Y', mktime(NULL, NULL, NULL, $m, $t, $j));
					break;
					
				/*
				 * Erziehungsberechtigte
				 */
				case 'erzbVorname1':
					if (strlen($wert) < 3 || strlen($wert) > 20) 
					$error[$feld] = "Bitte geben Sie den Vornamen der 1. Person ein";
					break;
					
				case 'erzbNachname1':
					if (strlen($wert) < 3 || strlen($wert) > 30) 
					$error[$feld] = "Bitte geben Sie den Nachname der 1. Person ein";
					break;
					
				case 'erzbStrasse1':
					if (strlen($wert) < 3 || strlen($wert) > 30) 
					$error[$feld] = "Bitte geben die Straße der 1. Person ein";
					break;
					
				case 'erzbHausnummer1':
					if (strlen($wert) < 1 || strlen($wert) > 10) 
					$error[$feld] = "Bitte geben Sie die Hausnummer der 1. Person ein";
					break;
					
				case 'erzbWohnort1':
					if (strlen($wert) < 3 || strlen($wert) > 30) 
					$error[$feld] = "Bitte geben Sie den Wohnort der 1. Person ein";
					break;
					
				case 'erzbPostleitzahl1':
					if (strlen($wert) < 4 || strlen($wert) > 5) 
					$error[$feld] = "Bitte geben Sie die Postleitzahl der 1. Person ein";
					break;
					
				case 'erzbTelefon1':
					if (strlen($wert) < 3 || strlen($wert) > 25) 
					$error[$feld] = "Bitte geben Sie die Telefonnummer der 1. Person ein";
					break;
					
				case 'erzbEmail1':
					if (!empty($wert) && (strlen($wert) < 6 || strlen($wert) > 50 || !strstr($wert, '@') || !strstr($wert, '.'))) 
					$error[$feld] = "Bitte korrigieren Sie die E-Mail-Adresse oder lassen Sie das Feld frei";
					break;
					
				case 'erzbEmail2':
					if (!empty($wert) && (strlen($wert) < 6 || strlen($wert) > 50 || !strstr($wert, '@') || !strstr($wert, '.'))) 
					$error[$feld] = "Bitte korrigieren Sie die E-Mail-Adresse oder lassen Sie das Feld frei";
					break;
				
				/*
				 * Ausbildung
				 */
				case 'artDesVertrags':
					if (($wert == 'Ausbildungsvertrag' || $wert == 'ungelernte Arbeitskraft') && empty($form['firma']))
					{
						 $error['firma'] = "Bitte ergänzen Sie die Informationen zu Ihrem Betrieb";
					}
					break;
				
				case 'firma':
					if ((strlen($wert) < 3 || strlen($wert) > 50) && ($form['artDesVertrags'] == 'Ausbildungsvertrag' || $form['artDesVertrags'] == 'ungelernte Arbeitskraft')) 
					$error[$feld] = "Bitte geben Sie den Firmennamen ein";
					break;
					
				case 'ausbStrasse':
					if ((strlen($wert) < 3 || strlen($wert) > 30) && ($form['artDesVertrags'] == 'Ausbildungsvertrag' || $form['artDesVertrags'] == 'ungelernte Arbeitskraft')) 
					$error[$feld] = "Bitte geben die Straße ein";
					break;
					
				case 'ausbHausnummer':
					if ((strlen($wert) < 1 || strlen($wert) > 10) && ($form['artDesVertrags'] == 'Ausbildungsvertrag' || $form['artDesVertrags'] == 'ungelernte Arbeitskraft')) 
					$error[$feld] = "Bitte geben Sie die Hausnummer ein";
					break;
					
				case 'ausbWohnort':
					if ((strlen($wert) < 3 || strlen($wert) > 30) && ($form['artDesVertrags'] == 'Ausbildungsvertrag' || $form['artDesVertrags'] == 'ungelernte Arbeitskraft')) 
					$error[$feld] = "Bitte geben Sie den Wohnort ein";
					break;
					
				case 'ausbPostleitzahl':
					if ((strlen($wert) < 4 || strlen($wert) > 5) && ($form['artDesVertrags'] == 'Ausbildungsvertrag' || $form['artDesVertrags'] == 'ungelernte Arbeitskraft')) 
					$error[$feld] = "Bitte geben Sie die Postleitzahl ein";
					break;
					
				case 'ausbTelefon':
					if ((strlen($wert) < 3 || strlen($wert) > 25) && ($form['artDesVertrags'] == 'Ausbildungsvertrag' || $form['artDesVertrags'] == 'ungelernte Arbeitskraft')) 
					$error[$feld] = "Bitte geben Sie die Telefonnummer ein";
					break;		

				case 'ausbFax':
					if ((strlen($wert) < 3 || strlen($wert) > 25) && ($form['artDesVertrags'] == 'Ausbildungsvertrag' || $form['artDesVertrags'] == 'ungelernte Arbeitskraft')) 
					$error[$feld] = "Bitte geben Sie die Faxnummer ein";
					break;
					
				case 'ausbEmail':
					if ((strlen($wert) < 3 || strlen($wert) > 50) && ($form['artDesVertrags'] == 'Ausbildungsvertrag' || $form['artDesVertrags'] == 'ungelernte Arbeitskraft')) 
					$error[$feld] = "Bitte geben Sie die eMail ein";
					break;	
					
				//Ausbildungsbeginn
				case 'ausbAnfTag':
					$j = $form['ausbAnfJahr'];
					$m = $form['ausbAnfMon'];
					$t = $form['ausbAnfTag'];
					$_SESSION['beginnDerAusbildung'] = date('Y-m-d', mktime(NULL, NULL, NULL, $m, $t, $j));
					$tmp = date('d', mktime(NULL, NULL, NULL, $m, $t, $j));
					if ($tmp != $wert)
					{
						$error[$feld] = "Bitte geben Sie einen korrekten Beginn der Ausbildung an";
					}
					$wert = $tmp;
					break;
					
				case 'ausbAnfMon':
					$j = $form['ausbAnfJahr'];
					$m = $form['ausbAnfMon'];
					$t = $form['ausbAnfTag'];
					$wert = date('m', mktime(NULL, NULL, NULL, $m, $t, $j));
					break;
					
				case 'ausbAnfJahr':
					$j = $form['ausbAnfJahr'];
					$m = $form['ausbAnfMon'];
					$t = $form['ausbAnfTag'];
					$wert = date('Y', mktime(NULL, NULL, NULL, $m, $t, $j));
					break;
					
				//Ausbildungsende
				case 'ausbEndTag':
					$j = $form['ausbEndJahr'];
					$m = $form['ausbEndMon'];
					$t = $form['ausbEndTag'];
					$_SESSION['endeDerAusbildung'] = date('Y-m-d', mktime(NULL, NULL, NULL, $m, $t, $j));
					$tmp = date('d', mktime(NULL, NULL, NULL, $m, $t, $j));
					if ($tmp != $wert)
					{
						$error[$feld] = "Bitte geben Sie ein korrektes Ende der Ausbildung an";
					}
					$wert = $tmp;
					break;
					
				case 'ausbEndMon':
					$j = $form['ausbEndJahr'];
					$m = $form['ausbEndMon'];
					$t = $form['ausbEndTag'];
					$wert = date('m', mktime(NULL, NULL, NULL, $m, $t, $j));
					break;
					
				case 'ausbEndJahr':
					$j = $form['ausbEndJahr'];
					$m = $form['ausbEndMon'];
					$t = $form['ausbEndTag'];
					$wert = date('Y', mktime(NULL, NULL, NULL, $m, $t, $j));
					break;
					
				//Berufsschulbeginn	
				case 'bsAnfTag':
					$j = $form['bsAnfJahr'];
					$m = $form['bsAnfMon'];
					$t = $form['bsAnfTag'];
					$_SESSION['eintrittBs'] = date('Y-m-d', mktime(NULL, NULL, NULL, $m, $t, $j));
					$tmp = date('d', mktime(NULL, NULL, NULL, $m, $t, $j));
					if ($tmp != $wert)
					{
						$error[$feld] = "Bitte geben Sie einen korrekten Beginn der Ausbildung an";
					}
					$wert = $tmp;
					break;
					
				case 'bsAnfMon':
					$j = $form['bsAnfJahr'];
					$m = $form['bsAnfMon'];
					$t = $form['bsAnfTag'];
					$wert = date('m', mktime(NULL, NULL, NULL, $m, $t, $j));
					break;
					
				case 'bsAnfJahr':
					$j = $form['bsAnfJahr'];
					$m = $form['bsAnfMon'];
					$t = $form['bsAnfTag'];
					$wert = date('Y', mktime(NULL, NULL, NULL, $m, $t, $j));
					break;
					
				/*
				 * Schulbildung
				 */
				case 'letzteSchuleName':
					if (strlen($wert) < 3 || strlen($wert) > 50) 
					$error[$feld] = "Bitte geben Sie den Namen Ihrer letzten Schule ein";
					break;
					
				case 'letzteSchuleOrt':
					if (strlen($wert) < 3 || strlen($wert) > 50) 
					$error[$feld] = "Bitte geben Sie den Ort Ihrer letzten Schule ein";
					break;
			}
			$_SESSION[$feld] = $wert;
		}
		return $error;
	}
	
	/**
	 * Rückgabe des Datums
	 *
	 * @author MelloPie
	 * @link http://www.php-resource.de/forum/showthread.php?threadid=20691
	 * @param string $datum (YYYY-MM-DD)
	 * @return int
	 */
	public function getAlter($datum){
  		$age = explode("-",$datum);
		$alter = date("Y",time())-$age[0];
		if (mktime(0,0,0,date("m",time()),date("d",time()),date("Y",time())) < mktime(0,0,0,$age[1],$age[2],date("Y",time())))
		$alter--;
		return $alter;
	}
	
	/**
	 * Ausgabe eines Input-Feldes
	 *
	 * @param string $feld
	 * @param int $länge
	 * @param int $maxlength
	 * @param string $default
	 */
	public function getHtmlInput($feld, $länge = 60, $maxlength=30, $default = false)
	{
		global $error;
		if (isset($error[$feld])) 	$class = "class=\"fehler\"";
		else						$class = NULL;
		
		$value = empty($_SESSION[$feld]) && $default !== false ? $default :  $_SESSION[$feld];
		
		echo "<input type=\"text\" maxlength=\"$maxlength\" name=\"form[$feld]\" value=\"$value\" style=\"width:".$länge."px;\" $class/>";
	}
	
	/**
	 * Gibt ein HTML SELECT-Feld zurück
	 *
	 * @param string $feld
	 * @param [string|array] $tabel_or_array
	 * @param boot $enum
	 * @param string $feldDb
	 * @param string $default
	 * @param int $länge
	 */
	public function getHtmlSelect($feld, $tabel_or_array, $enum = false, $feldDb = false, $default = false, $länge = 120)
	{
		global $error;
		
		$class = isset($error["$feld"]) ? "class=\"fehler\"" : "";
		
		echo "<select name=\"form[$feld]\" style=\"width:".$länge."px\" $class>\n";
		if ($enum && is_array($tabel_or_array))
		{
			foreach ($tabel_or_array as $val) $array[$val] = $val;
		}
		elseif (!is_array($tabel_or_array))
		{
			$this->reset();
			$this->setTable($tabel_or_array);
			$feldDb = $feldDb ? $feldDb : $feld;
			$this->setSelect("id, $feldDb");
			$result = $this->getAll();
			foreach ($result as $row) $array[$row['id']] = $row[$feldDb];
		}

		else
		{
			$array = $tabel_or_array;
		}
		foreach ($array as $key => $val)
		{
			if($_SESSION[$feld] == $key || !isset($_SESSION[$feld]) && $default == $key) 
			{
				$selected = 'selected';
			}
			else
			{
				$selected = NULL;
			}
			echo "<option value=\"$key\" $selected>$val</option>";
		}		
		echo "</select>";
	}
	
	/**
	 * Bearbeiten von Schülern
	 * 
	 * @TODO: Erstellung
	 *
	 */
	private function editSchueler ()
	{
		die("Schuler::editSchuler existiert (noch) nicht");
		return false;
	}
	
	/**
	 * Eintragen eines Schülerdatensatzes
	 */
	public function addSchueler()
	{
		$s = $_SESSION;	
		
		// Eintragen d. Adresse d. Schülers
		$array = array	(
							'strasse'		=>	$s['strasse'],
							'hausnummer'	=>	$s['hausnummer'],
							'postleitzahl'	=>	$s['postleitzahl'],
							'wohnort'		=>	$s['wohnort'],
							'telefon'		=>	$s['telefon'],
							'email'			=>	$s['email']
						);	
		$this->reset();
		$this->setTable('adresse');
		$idSchuelerAdresse = $this->add($array);
		$this->debug(mysql_error());
			
		// Eintragen d. Adresse d. 1. Kontaktperson
		$array = array	(
							'strasse'		=>	$s['erzbStrasse1'],
							'hausnummer'	=>	$s['erzbHausnummer1'],
							'postleitzahl'	=>	$s['erzbPostleitzahl1'],
							'wohnort'		=>	$s['erzbWohnort1'],
							'telefon'		=>	$s['erzbTelefon1'],
							'email'			=>	$s['erzbEmail1']
						);	
		$this->reset();
		$this->setTable('adresse');
		$idErzbAdresse1 = $this->add($array);
		//echo "1. Kontaktperson:$idErzbAdresse1";
		$this->debug(mysql_error());

		// Eintragen d. Namen d. 1. Kontaktperson
		$array = array	(
							'name'			=>	$s['erzbNachname1'],
							'vorname'		=>	$s['erzbVorname1'],
							'adresseId'		=>	$idErzbAdresse1,
							'kontakttyp'	=>	$s['erzbStatus1']
						);	
		$this->reset();
		$this->setTable('kontaktperson');
		$idErzb1 = $this->add($array);
		$this->debug(mysql_error());
		
		// Eintragen d. Adresse d. 2. Kontaktperson
		$array = array	(
							'strasse'		=>	$s['erzbStrasse2'],
							'hausnummer'	=>	$s['erzbHausnummer2'],
							'postleitzahl'	=>	$s['erzbPostleitzahl2'],
							'wohnort'		=>	$s['erzbWohnort2'],
							'telefon'		=>	$s['erzbTelefon2'],
							'email'			=>	$s['erzbEmail2']
						);	
		$this->reset();
		$this->setTable('adresse');
		$idErzbAdresse2 = $this->add($array);
		$this->debug(mysql_error());
			
		// Eintragen d. Namen d. 2. Kontaktperson
		$array = array	(
							'name'			=>	$s['erzbNachname2'],
							'vorname'		=>	$s['erzbVorname2'],
							'adresseId'		=>	$idErzbAdresse2,
							'kontakttyp'	=>	$s['erzbStatus2']
						);	
		$this->reset();
		$this->setTable('kontaktperson');
		$idErzb2 = $this->add($array);
		$this->debug(mysql_error());
		
		// Eintragen d. Adresse d. Ausbildungsbetriebes
		$array = array	(
							'strasse'		=>	$s['ausbStrasse'],
							'hausnummer'	=>	$s['ausbHausnummer'],
							'postleitzahl'	=>	$s['ausbPostleitzahl'],
							'wohnort'		=>	$s['ausbWohnort'],
							'telefon'		=>	$s['ausbTelefon'],
							'telefon'		=>	$s['ausbFax'],
							'email'			=>	$s['ausbEmail']
						);	
		$this->reset();
		$this->setTable('adresse');
		$idAusbAdresse = $this->add($array);
		$this->debug(mysql_error());
		
		// Eintragen d. Ausbildungsbetriebes
		$array = array	(
							'firma'			=>	$s['firma'],
							'adresseId'		=>	$idAusbAdresse
						);	
		$this->reset();
		$this->setTable('ausbildungsbetrieb');
		$idAusb = $this->add($array);
		$this->debug(mysql_error());
		
		// Eintragen d. Schüler
		$this->reset();
		$this->setTable('schueler');
		
		//Tmp Ausgabe d. Spalten
		//$tmp = $this->getDefaultValues();
		//foreach ($tmp as $key => $value) echo "'$key'		=>	\$s['$key'],\n";

		$array = array	(
							'letzteSchuleName'			=>	$s['letzteSchuleName'],
							'letzteSchuleOrt'			=>	$s['letzteSchuleOrt'],
							'nachname'					=>	$s['nachname'],
							'vorname'					=>	$s['vorname'],
							'geburtslandId'				=>	$s['geburtsLandId'], // l vs L!
							'staatsangehoerigkeitId'	=>	$s['staatsangehoerigkeitId'],
							'bekenntnisfreiText'		=>	$s['bekenntnisfreiText'],
							'wohnhaftBei'				=>	$s['wohnhaftBei'],
							'leseSchreibStoerung'		=>	$s['leseSchreibStoerung'],
							'leseSchreibSchwaeche'		=>	$s['leseSchreibSchwaeche'],
							'zugangInBrd'				=>	$s['zugangInBrd'],
							'grundFuerEthik'			=>	$s['grundFuerEthik'],
							'ausbildungsberufId'		=>	$s['ausbildungsberufId'],
							'umschueler'				=>	$s['umschueler'],
							'ausbildungsbetriebId'		=>	$idAusb,
							'zuletztBesuchteSchulartId'	=>	$s['zuletztBesuchteSchulartId'],
							'hoechsterBereitsErreichterAbschlussId'		=>	$s['hoechsterBereitsErreichterAbschlussId'],
							'adresseId'									=>	$idSchuelerAdresse,
							'herkunftslandId'							=>	$s['herkunftslandId'],
							//'klassenstufe'								=>	$s['klassenstufe'], //Ungenutzt!
							'abschlussAnSchulartId'						=>	$s['abschlussAnSchulartId'],
							'geburtsdatum'								=>	$s['geburtsdatum'],
							'geschlecht'								=>	$s['geschlecht'],
							'zugangInBrdAm'								=>	$s['zugangInBrdAm'],
							'eintrittBs'								=>	$s['eintrittBs'],
							'geburtsStadt'								=>	$s['geburtsStadt'],
							'familienstand'								=>	$s['familienstand'],
							'religionsunterricht'						=>	$s['religionsunterricht'],
							'beginnDerAusbildung'						=>	$s['beginnDerAusbildung'],
							'endeDerAusbildung'							=>	$s['endeDerAusbildung'],
							'bekenntnis'								=>	$s['bekenntnis'],
							'artDesVertrags'							=>	$s['artDesVertrags'],
							'kontaktperson1Id'							=>	$idErzb1,
							'kontaktperson2Id'							=>	$idErzb2,
							'hinzugefügtAm'								=>	date('Y-m-d G:i:s'),
						);	
		$this->reset();
		$this->setTable('schueler');
		$idAusbAdresse = $this->add($array);
		$this->debug(mysql_error());
	}
	
	/**
	 * Gibt ein Array oder CSV-File mit allen Daten zurück
	 *
	 * @param string $output [array|csv]
	 * @return array|csv
	 */
	public function getCsv($output = 'array')
	{
		$this->reset();
		$this->setTable('view_schueler');
		$this->setSelect('*');
		$array = $this->getAll();
		
		if ($output == "array")
		{
			return $array;
		}
		else
		{
			$csv = NULL;
			foreach($array as $row)
			{
				$i = 0;
				foreach ($row as $key => $val)
				{
					$i++;
					$csv .= $i == 1 ? '' : ',';
					$csv .= "\"$val\"";
				}
				$csv .= "\n";
			}
		}
		return $csv;
	}
	
	/**
	 * Ausgabe von Debugcode unterhalb d. Seite
	 * Wird vom QueryTool selbst aufgerufen
	 *
	 * @param string $debug
	 */
	public function debug($debug)
	{
		global $debugMsg;
		//$debugMsg .= "<div style=\"background-color:orange; color:black; border: 1px solid black; margin:10px;\">$debug</div>";
	}
}

?>
