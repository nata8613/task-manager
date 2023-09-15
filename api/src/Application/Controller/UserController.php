<?php

namespace App\Application\Controller;

use App\Application\Service\User\ListUserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private ListUserService $listUserService;

    public function __construct(ListUserService $listUserService)
    {
        $this->listUserService = $listUserService;
    }

    #[Route('/api/v1/users', methods: ['GET'])]
    public function getUsers(): Response
    {
        $users = $this->listUserService->execute();

        return $this->json(['data' => $users], Response::HTTP_OK);
    }
}
