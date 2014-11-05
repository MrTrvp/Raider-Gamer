<?php
	
	include_once('functions.php');

	class Game
	{
		public $Name = "";
		public $Salt = "";
		public $ShortC = "";
		public $Version = "";
		public $UrlFormat = "";

		public function __construct($name, $salt, $shortC, $version)
		{
			$this->Name = $name;
			$this->Salt = $salt;
			$this->ShortC = $shortC;
			$this->UrlFormat = 'http://' . $shortC . '.storm8.com/apoints.php?version=' . $version . '&udid=%1$s&pf=%2$s&model=%3$s&sv=%4$s';
		}

		public function GenerateUrl($UDID)
		{
			$udid = $UDID;
			$md5Hash = md5($udid . ':' . $this->Salt);

			return sprintf($this->UrlFormat, $udid, $md5Hash, 'Droid', Functions::GenerateRandomAndroidVersion());
		}

		public function GetShortC()
		{
			return $this->ShortC;
		}
	}
	
?>