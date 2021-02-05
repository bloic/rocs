<?php

namespace App\DataFixtures;

use App\Entity\Office;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class OfficeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 11; $i++) {
            $office = new Office();
            $image = 'https://loremflickr.com/600/500/director';
            $office->setName($faker->name);
            $office->setStatus($faker->jobTitle);
            $office->setDescription($faker->realText(1500));
            $office->setPicture($image);
            $manager->persist($office);
        }

        $manager->flush();
    }
}
