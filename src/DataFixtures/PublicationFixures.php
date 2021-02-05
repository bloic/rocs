<?php

namespace App\DataFixtures;

use App\Entity\Publication;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use  Faker;


class PublicationFixures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 5; $i++) {
            $publication = new Publication();
            $image = 'https://loremflickr.com/800/800/';
            $publication->setTitle($faker->text(20));
            $publication->setDescription($faker->realText(3000));
            $publication->setDate($faker->dateTime());
            $publication->setPicture($image);
            $manager->persist($publication);
        }
        $manager->flush();
    }
}
