<?php

namespace App\Controller\Admin;

use App\Entity\Learn;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LearnCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Learn::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
