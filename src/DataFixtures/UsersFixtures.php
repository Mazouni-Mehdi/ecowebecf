<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class UsersFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
    ){}

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $admin = new Users();
        $admin ->setEmail('admin@admin.fr');
        $admin ->SetName('durant');
        $admin ->SetLastname('mike');
        $admin ->SetPseudo('mikki');
        $admin ->SetPicture($faker->imageUrl('220','300'));
        $admin ->SetDescription('administrateur');
        $admin ->SetPassword(
            $this->passwordEncoder->hashPassword($admin, 'admin')
        );
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        $user = new Users();
        $user ->setEmail('user@user.fr');
        $user ->SetName('dupont');
        $user ->SetLastname('jean');
        $user ->SetPseudo('jean');
        $user ->SetPicture($faker->imageUrl('220','300'));
        $user ->SetDescription('utilisateur');
        $user ->SetPassword(
            $this->passwordEncoder->hashPassword($user, 'user')
        );
        $user->setRoles(['ROLE_USER']);

        $manager->persist($user);

        $manager->flush();
    }
}
