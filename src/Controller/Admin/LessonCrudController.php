<?php

namespace App\Controller\Admin;

use App\Entity\Lesson;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

class LessonCrudController extends AbstractCrudController
{

    public const ACTION_DUPLICATE = 'duplicate';

    public static function getEntityFqcn(): string
    {
        return Lesson::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $duplicate = Action::new(self::ACTION_DUPLICATE)
            ->linkToCrudAction('duplicateLesson')
            ->setCssClass('btn btn-info');


        return $actions
            ->add(Crud::PAGE_EDIT, $duplicate)
            ->reorder(crud::PAGE_EDIT, [self::ACTION_DUPLICATE, Action::SAVE_AND_RETURN]);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title', 'Titre'),
            TextField::new('video', 'Vidéo'),
            TextareaField::new('explication', 'Explication textuelle'),
            TextField::new('resource', 'Ressources'),
            AssociationField::new('section'),
            BooleanField::new('is_finished', 'leçon terminée'),
            TextField::new('slug'),
        ];
    }

    public function duplicateLesson(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator,
        EntityManagerInterface $em
    ): Response {
        /** @var Lesson $lesson */
        $lesson = $context->getEntity()->getInstance();

        $duplicatedLesson = clone $lesson;

        parent::persistEntity($em, $duplicatedLesson);

        $url = $adminUrlGenerator->setController(self::class)
            ->setAction(Action::DETAIL)
            ->setEntityId($duplicatedLesson->getId())
            ->generateUrl();

        return $this->redirect($url);
    }
}