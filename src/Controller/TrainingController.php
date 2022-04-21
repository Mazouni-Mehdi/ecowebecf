<?php

namespace App\Controller;

use App\Entity\Training;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrainingController extends AbstractController
{
    #[Route('/formation', name: 'section')]
    public function section(Training $training): Response
    {
        $section = $training->getSections();

        return $this->render('profile/index.html.twig', [
            'section' => $trainingRepository->findBy([])
        ]);
    }
}