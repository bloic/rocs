<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class CategoryFixtures extends Fixture
{
    const CATEGORY = ['artistique', 'course', 'hockey', 'rink hockey', 'randonnée', 'ecole de patinage'];

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 1; $i++) {
            foreach (self::CATEGORY as $name) {
                $category = new Category();
                $category->setName($name);
                $category->setCoach($faker->name);
                $category->setRepresentative($faker->name);
                $category->setNumberSkaters($faker->numberBetween(0, 100));
                $manager->persist($category);
            }
        }
            $manager->flush();
        }
    }
