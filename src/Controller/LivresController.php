<?php

namespace App\Controller;

use App\Entity\Livres;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LivresController extends AbstractController
{
    #[Route('/livres/{id}', name: 'app_livres_id')]
    public function findElement($id,ManagerRegistry $doctrine): Response
    {
        $rep=$doctrine->getRepository(Livres::class);
        $livre=$rep->find($id);
        dd($livre);
    }

    #[Route('/livres', name: 'app_livres')]
    public function findAllElements(ManagerRegistry $doctrine): Response
    {
        $rep=$doctrine->getRepository(Livres::class);
        $livres=$rep->findAll();
        //dd($livres);
        return $this->render('livres/findAll.html.twig',['livres'=>$livres]);
    }

    #[Route('/livres', name: 'app_livres_add')]
    public function add(ManagerRegistry $doctrine): Response
    {
        $rep=$doctrine->getRepository(Livres::class);
        $livres=$rep->findAll();
        dd($livres);
    }
    #[Route('/livres/update/{id}', name: 'app_livres_update')]
    public function update(Livres $livre,ManagerRegistry $doctrine): Response
    {
        $livre->setPrix(110);
        $rep=$doctrine->getManager();//fournir le crud
        $rep->flush();//envoyer vers le serveur
        dd($livre);
    }
    #[Route('/livres', name: 'app_livres_delete')]
    public function delete(Livres $livre,ManagerRegistry $doctrine): Response
    {
        $rep=$doctrine->getManager();
        $rep->remove($livre);
        $rep->flush();
        dd($livre);
    }
}
