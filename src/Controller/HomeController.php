<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'home_show')]
    public function show()
    {
        return $this->render('user/index.html.twig', []);
    }
}