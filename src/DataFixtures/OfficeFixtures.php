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
        $office->setName($faker->name);
        $office->setStatus($faker->jobTitle);
        $manager->persist($office);
        }

        $manager->flush();
    }
}
