<?php

namespace App\Controller;


use App\Repository\TrainingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/profile', name: 'profile')]
class ProfileController extends AbstractController
{
    #[Route('/', name: 'training')]
    public function training(TrainingRepository $trainingRepository): Response
    {
        return $this->render('profile/index.html.twig', [
            'training' => $trainingRepository->findby([])
        ]);
    }

}
