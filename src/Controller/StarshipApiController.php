<?php

namespace App\Controller;

use App\Model\Starship;
use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipApiController extends AbstractController
{
    #[Route('/api/starships')]
    public function getCollection(StarshipRepository $respository): Response
    {
        //dd($logger);
        //$logger->info('Starship collection retrived');
        //dd($respository);
        $starships = $respository->findAll();
        return $this->json($starships);
    }
}
