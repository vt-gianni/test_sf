<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Form\Type\ResaurantType;
use App\Repository\RestaurantRepository;
use App\Service\IndexService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager) {}

    #[Route('/', name: 'index_show')]
    public function show(Request $request, RestaurantRepository $repository): Response
    {
        $restaurant = new Restaurant();

        $form = $this->createForm(ResaurantType::class, $restaurant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($restaurant);
            $this->entityManager->flush();
        }
        return $this->render('index/show.html.twig', [
            'form' => $form->createView()
        ]);
    }
}