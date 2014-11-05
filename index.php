<?php

	include_once('config.php');

	if (!$settings['allow'])
		exit();

	include_once('baseClass.php');
	include_once('functions.php');
	include_once('lib/Twig/Autoloader.php');

	Twig_Autoloader::register();
	$loader = new Twig_Loader_Filesystem('views/index');
	$twig = new Twig_Environment($loader);

	if (isset($_POST['gameName'], $_POST['udid']))
	{
		$gameName = Functions::CleanString($_POST['gameName']);
		$udid = Functions::CleanString($_POST['udid']);
		
		$game = Base::GetGame($gameName);
		$gameUrl = $game->GenerateUrl($udid);
		$gameSC = $game->GetShortC();

		if ($gameUrl)
		{
			echo Functions::CleanHtml($twig->render('game.twig',
											[
												'ingame' => true,
												'gameUrl' => $gameUrl,
												'gameSC' => $gameSC
											]));
			exit();
		}
	}

	echo Functions::CleanHtml($twig->render('login.twig', [ 'games' => Base::GetGames() ]));
?>