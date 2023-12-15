<?php

require 'vendor/autoload.php';


use GuzzleHttp\Client;
use Lucsv1\BuscadorCursos\BuscadorDeCursos;
use Lucsv1\BuscadorCursos\BuscadorDeCursos as BuscadorDeCursosAlias;
use Symfony\Component\DomCrawler\Crawler;

$cliente = new Client( ['base_uri' => 'https://www.alura.com.br/','verify' => false]);
$crawler = new Crawler();



$buscador = new BuscadorDeCursos($cliente, $crawler);
$achei = $buscador->buscador('/cursos-online-programacao/php');

foreach ($achei as $curso){
     echo exbieMensagem($curso);
}
