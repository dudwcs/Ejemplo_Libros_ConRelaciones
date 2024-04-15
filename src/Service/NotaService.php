<?php
namespace App\Service;
use App\Entity\Nota;
use App\Repository\NotaRepository;
use Doctrine\ORM\EntityManagerInterface;

class NotaService{
    //Constructor Promotion : https://www.php.net/manual/en/language.oop5.decon.php#language.oop5.decon.constructor.promotion
    public function __construct(private EntityManagerInterface $entityManagerInterface, private NotaRepository $notaRepository) {
        
    }

    public function create(Nota $nota){
        $this->entityManagerInterface->persist($nota);
        $this->entityManagerInterface->flush();
    }


    public function list(): array{
        return $this->notaRepository->findAll();

    }

}