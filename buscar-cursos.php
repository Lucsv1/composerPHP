<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$cliente = new Client();
$response = $cliente->request('GET', 'https://cursos.alura.com.br/category/programacao');

$html = $response->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($html);

$cursos = $crawler->filter('.course-card__course-link');

foreach ($cursos as $curso){
     echo $curso->textContent . PHP_EOL;
}