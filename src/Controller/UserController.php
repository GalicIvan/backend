<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/api/user', name: 'api_user', methods: ['GET'])]
    public function user(): JsonResponse
    {
        $users = [
            ['id'=> 1, 'name'=> 'Ivan', 'email'=> 'ivan@example.com'],
            ['id'=> 2, 'name'=> 'Galic', 'email'=> 'ivan@example.com'],
        ];

        return $this->json($users);
    }
}