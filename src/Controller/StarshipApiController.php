<?php

namespace App\Controller;

use App\Model\Starship;
use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(StarshipRepository $respository): Response
    {
        //dd($logger);
        //$logger->info('Starship collection retrived');
        //dd($respository);
        $starships = $respository->findAll();
        return $this->json($starships);
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function get(int $id, StarshipRepository $respository): Response {
        $starships = $respository->find($id);

        if(!$starships) {
            throw $this->createNotFoundException('Starship not found');
        }

        return $this->json($starships);
    }
}
