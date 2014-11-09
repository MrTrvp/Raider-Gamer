<?php

	include_once('gameClass.php');

	class Base
	{
		private static $games = null;

		public static function SetGames()
		{
			if (!isset(self::$games))
			{
				self::$games =	[
							'iMobsters' => new Game('iMobsters', 'kIndl3F1rE158i', 'im', 'a1.63'),
							'World War' => new Game('World War', 'kIndl3F1rE158w', 'wwar', 'a1.63'),
							'Kingdoms Live' => new Game('Kingdoms Live', 'D0m1n1c158k', 'kl', 'a1.63'),
							'Ninjas Live' => new Game('Ninjas Live', '0yAk0D0n157n', 'nl', 'a1.63'),
							'Pets Live' => new Game('Pets Live', 'pUpp13s157p', 'pl', 'a1.63'),
							'Racing Live' => new Game('Racing Live', 'g0neIn60s3c158r', 'rl', 'a1.63'),
							'Vampires Live' => new Game('Vampires Live', 'P4ul158v', 'vl', 'a1.63'),
							'Zombies Live' => new Game('Zombies Live', 'R0tt1ng157z', 'zl', 'a1.63')
						];
			}
		}

		public static function UrlFromName($game, $udid)
		{
			self::SetGames();

			if (array_key_exists($game, self::$games))
			{
				return self::$games[$game]->GenerateUrl($udid);
			}

			return false;
		}

		public static function ShortCutFromName($game)
		{
			self::SetGames();

			if (array_key_exists($game, self::$games))
			{
				return self::$games[$game]->ShortC;
			}

			return false;
		}

		public static function GetGame($game)
		{
			self::SetGames();
			
			if (array_key_exists($game, self::$games))
			{
				return self::$games[$game];
			}

			return false;
		}

		public static function GetGames()
		{
			self::SetGames();

			return self::$games;
		}
	}
	
?>
