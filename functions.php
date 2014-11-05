<?php

	class Functions
	{
		public static $_androidVersions = 
		[
			'2.2', '2.2.2', '2.2.3', '2.3', '2.3.2', '2.3.3', '2.3.4',
			'2.3.6', '2.3.7', '3.0', '3.1', '3.2', '4.0', '4.0.2',
			'4.0.3', '4.0.4', '4.1', '4.2', '4.3'
		];

		public static function GenerateRandomAndroidVersion()
		{
			return self::$_androidVersions[array_rand(self::$_androidVersions)];
		}

		public static function CleanString($input)
		{
			return stripslashes(strip_tags(trim($input)));
		}

		// Stolen from https://gist.github.com/paparts/9113258
		public static function CleanHtml($input)
		{
			$filters =
			[
				// Remove HTML comments except IE conditions
				'/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s'  	=> '', 
				
				// Remove comments in the form /* */
				'/(?<!\S)\/\/\s*[^\r\n]*/'								=> '',

				// Shorten multiple white spaces 
				'/\s{2,}/'												=> '',

				// Collapse new lines 
				'/(\r?\n)/'												=> '', 
			];
		
			return preg_replace(array_keys($filters), array_values($filters), $input);
		}
	}
?>