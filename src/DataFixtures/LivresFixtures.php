<?php

namespace App\DataFixtures;

use App\Entity\Livres;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LivresFixtures extends Fixture
{
    public function load(ObjectManager $manager): void//charger la table livres par des lignes
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i=1;$i<=100;$i++){
            
            $livre = new Livres();
            $livre->setLibelle('titre n '.$i)
            ->setPrix(random_int(10,300))
            ->setDateEdition(new \DateTime('01-01-2023'))
            ->setImage('https://picsum.photos/300/?random='.$i)
            ->setEditeur('editeur n '.$i);
            $em=$manager->persist($livre);
        }

        $manager->flush();//envoyer une seule requète
    }
}
