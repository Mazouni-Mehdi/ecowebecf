<?php

namespace App\Controller\Admin;

use App\Entity\Lesson;
use App\Entity\Section;
use App\Entity\Training;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ){
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(LessonCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ECOIT');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Utilisateurs');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter un utilisateur', 'fas fa-plus', Users::class )->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('liste des utilisateurs ', 'fas fa-eye', Users::class )
        ]);

        yield MenuItem::section('Leçons');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter une leçon', 'fas fa-plus', Lesson::class )->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des leçons', 'fas fa-eye', Lesson::class )
        ]);

        yield MenuItem::section('Sections');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter une section', 'fas fa-plus', Section::class )->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des sections', 'fas fa-eye', Section::class )
        ]);

        yield MenuItem::section('Formations');

        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter une formation', 'fas fa-plus', Training::class )->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste des formation', 'fas fa-eye', Training::class )
        ]);

    }
}
