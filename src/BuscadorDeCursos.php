<?php

namespace Lucsv1\BuscadorCursos;
use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

require_once './buscar-cursos.php';

class BuscadorDeCursos
{
    private $httphClient;

    private $crawler;

    public function __construct(ClientInterface $httphClient, Crawler $crawler)
    {

        $this->httphClient = $httphClient;
        $this->crawler = $crawler;
    }

    public function buscador(string $url): array{

        $response = $this->httphClient->request('GET', $url);
        $html = $response->getBody();

        $this->crawler->addHtmlContent($html);
        $elementosCursos =  $this->crawler->filter('span.card-curso__nome');
        $cursosList = [];

        foreach ($elementosCursos as $curso )
        {
            $conteudo = $curso->textContent . PHP_EOL;
            $cursosList[] = $conteudo;
        }

        return $cursosList;
    }
}