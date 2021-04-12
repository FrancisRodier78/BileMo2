<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Client;
use App\Entity\Produit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * L'encoder de mot de passe
     *
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for($i = 1; $i <= 12; $i++) {
            $produit = new Produit();

            $nom = $faker->sentence(1);
            $description = $faker->sentence(9);

            $produit->setNom($nom)
                ->setDescription($description);

            $manager->persist($produit);
        }

        $client = new Client();

        $hash = $this->encoder->encodePassword($client, "password");

        $client->setNom('SFR');
        $client->setDescription('Opérateur SFR.');
        $client->setEmail('SFR@yahoo.fr');
        $client->setPassword($hash);
        $client->setRoles([]);

        $manager->persist($client);

        for($i = 1; $i <= 5; $i++) {
            $user = new User();

            $prenom = $faker->firstNameMale;
            $nom = $faker->lastName;
            $adresse = $faker->address;
            $description = $faker->sentence(7);

            $user->setPrenom($prenom)
                ->setNom($nom)
                ->setAdresse($adresse)
                ->setDescription($description)
                ->setClient($client);

            $manager->persist($user);
        }

        $client = new Client();

        $hash = $this->encoder->encodePassword($client, "password");

        $client->setNom('Orange');
        $client->setDescription('Opérateur Orange.');
        $client->setEmail('Orange@yahoo.fr');
        $client->setPassword($hash);
        $client->setRoles([]);

        $manager->persist($client);

        for($i = 1; $i <= 7; $i++) {
            $user = new User();

            $prenom = $faker->firstNameMale;
            $nom = $faker->lastName;
            $adresse = $faker->address;
            $description = $faker->sentence(7);

            $user->setPrenom($prenom)
                ->setNom($nom)
                ->setAdresse($adresse)
                ->setDescription($description)
                ->setClient($client);

            $manager->persist($user);
        }

        $client = new Client();

        $hash = $this->encoder->encodePassword($client, "password");

        $client->setNom('Bouygues');
        $client->setDescription('Opérateur Bouygues.');
        $client->setEmail('Bouygues@yahoo.fr');
        $client->setPassword($hash);
        $client->setRoles([]);

        $manager->persist($client);

        for($i = 1; $i <= 9; $i++) {
            $user = new User();

            $prenom = $faker->firstNameMale;
            $nom = $faker->lastName;
            $adresse = $faker->address;
            $description = $faker->sentence(7);

            $user->setPrenom($prenom)
                ->setNom($nom)
                ->setAdresse($adresse)
                ->setDescription($description)
                ->setClient($client);

            $manager->persist($user);
        }

        $manager->flush();
    }
    /* Nom des routes
    * @Route(name="login", path="/api/login_check", methods={"GET"})
    */
}
