<?php
require __DIR__.'/vendor/autoload.php';

use ApiReddit\Searcher;

//Executes a new search
$search = new Searcher();
$json=$search->execSearch( 'php', 'composer', 'hot', 5);
$data =  json_decode($json);

//Loads the results in Twig
$loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
$twig = new Twig_Environment($loader, array());

//Renders our view
echo $twig->render('index.twig', array(
    'results' => $data->data->children,
));

?>