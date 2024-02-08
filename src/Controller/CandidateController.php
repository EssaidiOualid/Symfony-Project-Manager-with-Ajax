<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Repository\PostRepository;
use App\Repository\TypeRepository;
use App\Repository\CandidateRepository;
use App\Repository\CategorieRepository;
use App\Repository\SessionRepository;
use App\Repository\SpecialiteRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CandidateController extends AbstractController
{
    private $TypeRepository;
    private $PostRepository;
    private $categorieRepository;
    private $specialiteRepository;
    private $clientRepository;
    private $sessionRepository;
    private $manager;
    public function __construct(
        EntityManagerInterface $manger,
        CandidateRepository $clientRepository,
        SpecialiteRepository $specialiteRepository,
        CategorieRepository $categorieRepository,
        PostRepository $postRepository,
        TypeRepository $typeRepository,
        SessionRepository $sessionRepository
    ) {
        $this->sessionRepository = $sessionRepository;
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

    #[Route('/posts/get', name: 'get_posts', methods: 'get')]
    public function getposts(): JsonResponse
    {
        $posts = $this->PostRepository->findBy(['Session' => $this->sessionRepository->findOneBy(['active' => true])]);;
        $posts_data = [];
        foreach ($posts as $post)
            array_push(
                $posts_data,
                [
                    'id' => $post->getSpecialite()->getId(),
                    //'session' => $post->getSession()->getSession(),
                    'specialite' => $post->getSpecialite()->getIntitule(),
                    //'categorie' => $post->getCategorie()->getIntitule(),
                    //'nbr_post' => $post->getNbrPost(),
                    //'nbr_reste' => $post->getNbrReste()  
                    'nbr_reste' => [$post->getCategorie()->getIntitule() => $post->getNbrReste()]
                ]
            );
        $newArray = [];

        foreach ($posts_data as $item) {
            $id = $item['id'];
            $specialite = $item['specialite'];

            if (!isset($newArray[$id][$specialite])) {
                $newArray[$id][$specialite] = [
                    'id' => $id,
                    'specialite' => $specialite,
                    'nbr_reste' => []
                ];
            }

            $newArray[$id][$specialite]['nbr_reste'] = array_merge($newArray[$id][$specialite]['nbr_reste'], $item['nbr_reste']);
        }

        $newArray = array_map('array_values', $newArray);
        $newArray = array_merge(...$newArray);
        return new JsonResponse($newArray);
    }
}
