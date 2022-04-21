<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UsersCrudController extends AbstractCrudController
{
    public const INSTRUCTOR_BASE_PATH = 'assets/upload/images/instructeur';
    public const INSTRUCTOR_UPLOAD_DIR = 'public/assets/upload/images/instructeur';

    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email'),
            ArrayField::new('roles'),
            TextEditorField::new('password'),
            TextField::new('name'),
            TextField::new('lastname'),
            TextField::new('pseudo'),
            ImageField::new('picture', 'photo de profil')
                ->setBasePath(self::INSTRUCTOR_BASE_PATH)
                ->setUploadDir(self::INSTRUCTOR_UPLOAD_DIR)
                ->setSortable(false),

            TextField::new('description'),
        ];
    }
}
