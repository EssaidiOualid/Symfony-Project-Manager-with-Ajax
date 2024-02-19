<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\CategorieRepository;
use App\Repository\MessageRepository;
use App\Repository\PostRepository;
use App\Repository\ProjectRepository;
use App\Repository\TaskRepository;
use App\Repository\TypeRepository;
use App\Repository\UserRepository;
use Carbon\Carbon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class DashboardController extends AbstractController
{
    private $projectRepository;
    private $messageRepository;
    private $taskRepository;
    private $userRepository;
    private $postRepository;
    private $typeRepository;
    private $categorieRepository;

    public function __construct(
        PostRepository $postRepository,
        TypeRepository $typeRepository,
        CategorieRepository $categorieRepository
    ) {
        $this->postRepository = $postRepository;
        $this->typeRepository = $typeRepository;
        $this->categorieRepository = $categorieRepository;
    }
    #[Route('/dashboard', name: 'dashboard')]
    public function index(Security $security): Response
    {
        /** @var User*/
        $user = $security->getUser();
        $types =$this->typeRepository->findAll();
        $posts =$this->postRepository->findBySession();
        $categories =$this->categorieRepository->findAll();
        $style = 
        [
            [
                'icon' => "bx-plus-medical",
                'color' => "text-primary"
            ],
            [
                'icon' => "bx-cut",
                'color' => "text-danger"
            ],
            [
                'icon' => "bx-dna",
                'color' => "text-secondary"
            ],
            [
                'icon' => "bx-test-tube",
                'color' => "text-info"
            ]
        ];
        /*$typeTable = [];
        for($i = 0 ; $i < count($types) ; $i++){
            array_push($typeTable, [
                'id' => $types['id'],
                'intitule' => $types['intitule'],
                'specialites' => $types['specialites']
            ]);
        }*/


       //dd($posts);

       $table = [];
        foreach( $posts as $post){
            $table[$post->getSpecialite()->getId()][$post->getCategorie()->getId()] = $post->getNbrPost();

        }

        $table[0][0] = $this->postRepository->findTotal()['total'];
        $reception = $this->postRepository->findSommeBySpecialite();

        $totalBySpecialite = [];
        $totalByType_temp = $this->postRepository->findSommeByType();

        foreach($reception as $tableSomme){
            $totalBySpecialite[$tableSomme["specialite_id"]] = $tableSomme["somme"];
        }

        $totalByType = [];

        $i = 0;
        foreach($totalByType_temp as $type){
            array_push($totalByType, ['intitule' => $type['intitule'], 'somme' => $type['somme'], 'codeIcon' => $style[$i]['icon'], 'codeColor' => $style[$i]['color']]);
            $i++;
        }

        //dd($totalByType);
      

        return $this->render('dashboard/index.html.twig', [
            'posts' => $table,
            'types' => $types,
            'categories' => $categories,
            'totalBySpecialite' => $totalBySpecialite,
            'totalByType' => $totalByType,
        ]);
    }

    
}
