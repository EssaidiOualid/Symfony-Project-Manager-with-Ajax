<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Repository\CandidateRepository;
use App\Repository\CategorieRepository;
use App\Repository\PostRepository;
use App\Repository\SpecialiteRepository;
use App\Repository\TypeRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CandidateController extends AbstractController
{
    private $TypeRepository;
    private $PostRepository;
    private $categorieRepository;
    private $specialiteRepository;
    private $clientRepository;
    private $manager;
    public function __construct(
        EntityManagerInterface $manger,
        CandidateRepository $clientRepository,
        SpecialiteRepository $specialiteRepository,
        CategorieRepository $categorieRepository,
        PostRepository $postRepository,
        TypeRepository $typeRepository
    ) {
        $this->TypeRepository = $typeRepository;
        $this->PostRepository = $postRepository;
        $this->categorieRepository = $categorieRepository;
        $this->specialiteRepository = $specialiteRepository;
        $this->clientRepository = $clientRepository;
        $this->manager = $manger;
    }

    #[Route('/candidate', name: 'app_candidate')]
    public function index(): Response
    {
        $type = $this->TypeRepository->findAll();
        $candidatList2 = $this->PostRepository->findAll();
        $categorie = $this->categorieRepository->findAll();
        $candidatList1 = $this->specialiteRepository->findAll();
        $candidatList = $this->clientRepository->findBy([
            'Specialite' => null
        ]);



        return $this->render('candidate/index.html.twig', [
            'candidat_list' => $candidatList,
            'Specialite_list' => $candidatList1,
            'categorie_list' => $categorie,
            'post_list' => $candidatList2,
            'type_list' => $type
        ]);

        return $this->render('candidate/index.html.twig')->getContent();
    }
}
