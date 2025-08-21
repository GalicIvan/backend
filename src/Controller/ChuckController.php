<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ChuckController extends AbstractController
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    #[Route('/api/chuck', name: 'api_chuck', methods: ['GET'])]
    public function index(): JsonResponse
    {

        $response = $this->client->request(
            'GET',
            'https://api.chucknorris.io/jokes/random'
        );

        $data = $response->toArray();

        return $this->json([
            'joke' => $data['value']
        ]);
    }
}
