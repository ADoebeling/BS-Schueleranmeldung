<?php
/**
 * Klasse zur Sessionverwaltung und allgemeinen Steuerung
 */
class session extends MDB_QueryTool
{
	var $table        	= 'session';
	var $primaryCol 	= 'sid';
	var $captchaCheck 	= false;

	/**
	 * Verifizierung der Session
	 *
	 * @param string $captcha
	 */
	public function __construct($captcha = NULL)	
	{
		parent::__construct(DSN);
		
		$this->reset();
		$this->setWhere('sid = "'.SID.'"');
		$this->addWhere('ip = "'.IP.'"');
		$this->addWhere('valid = true');
		if ($ret = $this->getAll())
		{
			$this->captchaCheck = true;
			$this->debug("Captcha in DB valid");
		}
		else
		{		
			$this->reset();
			$this->setWhere('sid = "'.SID.'"');
			$this->addWhere('ip = "'.IP.'"');
			$this->addWhere('captcha = "'.trim($captcha).'"');
			if ($this->getCount())
			{
				$this->update(array('valid' => 1));	
				$this->captchaCheck = true;
				$this->debug("Captcha korrekt eingegeben");
			}
			else
			{
				$this->makeCaptcha();
				$this->debug("Captcha neu generieren");
			}
		}
	}
	
	/**
	 * Gibt zurück ob Captcha valide bestätigt schueler
	 *
	 * @return bool
	 */
	public function getCaptchaCheck()
	{
		return (bool)$this->captchaCheck;
	}

	/**
	 * Gibt den Seitennamen zurück
	 *
	 * @param array $form
	 * @param array $error
	 * @return string
	 */
	public function getSeite($form, $error = 0)
	{
		global $nav;
		
		if (empty($seite)) $seite = DEFAULT_SEITE;
		$array = array_keys($nav);
		$id = array_search($_SESSION['seitenId'], $array);
		
		if (!isset($array[$id]))
		{
			$session->debug("defaultseite, da keine ID");
			$return = DEFAULT_SEITE;
		}
		else if($form['weiter'] == "Zurück")
		{
			$this->debug('Zurück');
			$anzahl = count($nav);
			if ($id > 0)
			{
				$this->debug('Außerhalb des Seitenbereiches');
				$return = $array[$id-1];
			}
			else
			{
				$return = $array[$id];
			}
		}
		else if ($error)
		{
			$this->debug('Aktuelle Seite enthält Fehler, daher kein Seitenwechsel erlaubt');
			$return = $array[$id];
		}
		else if($form['weiter'] == "Weiter")
		{
			$this->debug('Weiter');
			$anzahl = count($nav);
			
			$return = $id < $anzahl ? $id+1 : $id;
			$return = $array[$return];
		}
		else
		{
			$return = $array[$id];
		}
		
		if (!file_exists(DIR_SEITE.$return.'.inc.php') ||  !$this->getCaptchaCheck())
		{
			$return = DEFAULT_SEITE;
			$this->debug("Defaultseite, da Datei $seite nicht vorhanden");
		}
		$this->debug("Einbinden d. Seite $return");
		$_SESSION['seitenId'] = $return;
		return $return;
	}
	
	/**
	 * Erstellen des Captcha und Rückgabe der verschlüsselten Zeichenfolge
	 *
	 * @return string
	 */
	public function makeCaptcha()
	{
		// Set CAPTCHA options (font must exist!)
		$imageOptions = array(
		    'font_size'        => 24,
		    'font_path'        => './',
		    //'font_file'        => 'COUR.TTF',
		    'font_file'        => 'arial.ttf',
		    'text_color'       => '#0D2FB4',
		    'lines_color'      => '#FD4430',
		    'background_color' => '#DDDDDD'
		);
		
		// Set CAPTCHA options
		$options = array(
		    'width' => 200,
		    'height' => 50,
		    'output' => 'png',
		    'imageOptions' => $imageOptions
		);
		          
		// Generate a new Text_CAPTCHA object, Image driver
		$c = Text_CAPTCHA::factory('Image');
		$retval = $c->init($options);
		if (PEAR::isError($retval)) {
		    printf('Error initializing CAPTCHA: %s!',
		        $retval->getMessage());
		    exit;
		}
		
		// Get CAPTCHA secret passphrase
		//$_SESSION['phrase'] = $c->getPhrase();
		$this->captcha = $c->getPhrase();
		
		// Get CAPTCHA image (as PNG)
		$png = $c->getCAPTCHAAsPNG();
		if (PEAR::isError($png)) {
		    echo 'Error generating CAPTCHA!';
		    echo $png->getMessage();
		    exit;
		}
		
		file_put_contents(DIR_CAPTCHA.md5(session_id()) . '.png', $png);

		$this->reset();
		$this->setTable('session');
		$this->primaryCol = 'sid';
		$this->setWhere('sid = "'.SID.'"');
		
		if ($this->getCount() > 0)
		{
			$this->update(array('captcha' => $c->_phrase, 'time' => 'NOW()'));
		}
		else
		{
			$this->reset();
			$this->setTable('session');
			$this->primaryCol = 'sid';
			$this->add(array('sid' => SID, 'ip' => IP, 'captcha' => $c->_phrase, 'time' => 'NOW'));
		}
		return $c->_phrase;
	}
	
	/**
	 * Methode zur formatierten Ausgabe von Fehlern
	 *
	 * @param string $string
	 */
	public function fehler($string)
	{
		if ($_SESSION['weiter'] != "Zurück")
		{
		?>
		<div style="padding-bottom:10px;">
			<div class="fehler"><?=nl2br($string)?></div>
		</div>
		<?php
		}
	}
	
	/**
	 * Debug-Methode
	 * alias für schueler::debug
	 */
	function debug($debug)
	{
		schueler::debug($debug);
	}
}
?>