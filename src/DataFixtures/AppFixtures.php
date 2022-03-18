<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product->setCode('code');
        $product->setPrice(10);
        $product->translate('fr')->setName('Chaussures');
        $product->translate('en')->setName('Shoes');
        $manager->persist($product);

        // In order to persist new translations, call mergeNewTranslations method, before flush
        $product->mergeNewTranslations();

        $product->translate('en')->getName();

        $manager->flush();
    }
}
