<?php

namespace App\DataFixtures;

use App\Entity\Books;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BooksFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr-FR');
        for ($i = 0; $i <300; $i++) {
            $Book = new Books();
            $Book->SetTitle($faker->sentence(10));
            $Book->SetCover($faker->imageUrl('220', '300'));
            $Book->SetReleasedate($faker->dateTimeBetween('-6 months'));
            $Book->SetDescription($faker->text);
            $Book->SetAuthor($faker->name);
            $Book->SetGenre($faker->randomElement($array = array('Histoire', 'Science-fiction', 'Jeunesse', 'Cuisine', 'Nature', 'Scolaire')));

        }

        $manager->flush();
    }
}

