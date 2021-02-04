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
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 5; $i++){
            $publication = new Publication();
            $publication->setTitle($faker->text(20));
            $publication->setDescription($faker->realText(1000));
            $publication->setPicture($faker->imageUrl());
            $publication->setDate($faker->dateTime());
            $manager->persist($publication);
        }
        $manager->flush();
    }
}
