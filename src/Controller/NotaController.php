<?php

namespace App\Controller;

use App\Entity\Nota;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NotaController extends AbstractController
{
    #[Route('/nota/new', name: 'app_nota_new')]
    public function new(EntityManagerInterface $entityManager): Response
    {
        $nota = new Nota();
        $nota->setTitulo("Mi primera nota");
        $nota->setDescripcion("bla bla");
        $nota->setFechaModificion(new \DateTime());

        $entityManager->persist($nota);
        $entityManager->flush();
        
        return $this->render('nota/index.html.twig', [
            'controller_name' => 'NotaController',
            'nota' => $nota
        ]);
    }
}
