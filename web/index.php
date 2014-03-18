<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->debug = true; // Quitar para producción

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

use Symfony\Component\HttpFoundation\Request;

$app->get('/', function () {

	// TODO: renderizar plantilla con chart vacío

	return 1;
});


$app->match('/raw/get_hashtag_stats', function (Request $request) {

	// TODO: devolver json con los datos de los hashtags solicitados

	// datos estaticos de prueba

	$ht1 = array();
	$ht2 = array();

	for($i = 0; $i < 50; $i++)
	{
		$ht1[]=[$i, mt_rand(0,50)];
		$ht2[]=[$i, mt_rand(0,50)];
	}

	$hashtags = array();

	$hashtags[] = array('data'=>$ht1, 'label'=>"#betis");
	$hashtags[] = array('data'=>$ht2, 'label'=>"#sevilla");

	$ret = array('success' => true, 'data' => $hashtags);

	return json_encode($ret);
});

$app->run();

?>
