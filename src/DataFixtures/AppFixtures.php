<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create('fr_FR');

        $categories = [];
        $produits = [];
    
        for ($i = 0; $i < 20; $i++) {
          $category = new Category();
          $category->setName($faker->word());
    
          $manager->persist($category);
          $categories[] = $category;
        }
    
        for ($j = 0; $j < 70; $j++) {
          $produit = new Produit();
          $produit->setName($faker->words(5, true))
            ->setDescription($faker->words(5, true))
            ->setPrice($faker->numberBetween(5, 100));
    
          $manager->persist($produit);
        }
        $manager->flush();
    }
}
