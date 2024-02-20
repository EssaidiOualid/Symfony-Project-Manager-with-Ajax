<?php

namespace App\Controller;

use Knp\Snappy\Pdf;
use App\Entity\Candidate;
use App\Entity\Session;
use App\Repository\PostRepository;
use App\Repository\TypeRepository;
use App\Repository\SessionRepository;
use App\Repository\CandidateRepository;
use App\Repository\CategorieRepository;

use App\Repository\SpecialiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\OrderBy;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CandidateController extends AbstractController
{
    private $TypeRepository;
    private $PostRepository;
    private $categorieRepository;
    private $specialiteRepository;
    private $candidateRepository;
    private $sessionRepository;
    private $manager;
    public function __construct(
        EntityManagerInterface $manger,
        CandidateRepository $candidateRepository,
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
        $this->candidateRepository = $candidateRepository;
        $this->manager = $manger;
    }

    #[Route('/candidate', name: 'app_candidate')]
    public function index(): Response
    {
        $type = $this->TypeRepository->findAll();
        $candidatList2 = $this->PostRepository->findAll();
        $categorie = $this->categorieRepository->findAll();
        $candidatList1 = [];
        $spC = $this->specialiteRepository->findAllSpecialiteContra();
        $spB = $this->specialiteRepository->findAllSpecialiteB();
        foreach ($candidatList2 as $post)
            if ($post->getNbrReste() > 0 and !in_array($post->getSpecialite(), $candidatList1)) {
                $candidatList1[] = $post->getSpecialite();
            }

        $candidatList = $this->candidateRepository->findAllCandidateR();

        return $this->render('candidate/index.html.twig', [
            'candidat_list' => $candidatList,
            'Specialite_list' => $candidatList1,
            'categorie_list' => $categorie,
            'post_list' => $candidatList2,
            'type_list' => $type,
            'spC' => $spC,
            'spB' => $spB
        ]);

        return $this->render('candidate/index.html.twig')->getContent();
    }

    #[Route('/candidate/update/{id}/{id1}/{id2}', name: 'update_candidate', methods: 'POST')]
    public function update(Request $request, $id, $id1, $id2): Response
    {
        $condidat = $this->candidateRepository->find($id);
        $specialite = $this->specialiteRepository->find($id1);
        $categorie = $this->categorieRepository->find($id2);
        $condidat->setSpecialite($specialite)
            ->setCategorie($categorie);
        if ($specialite->getIntitule() != 'Sans choix') {
            $post = $this->PostRepository->findOneBy([

                'Specialite' => $specialite,
                'Categorie' => $categorie,
            ]);

            $post->setNbrReste($post->getNbrReste() - 1);
            $this->manager->persist($post);
        }
        $this->manager->persist($condidat);

        $this->manager->flush();
        return new Response('updated');
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

    #[Route('/candidate/pdf_{id}', name: 'candidate_PDf', methods: 'get')]
    public function pdfAction(Pdf $knpSnappyPdf, $id = -1)
    {
        $type = [];
        if ($id == -1) {
            $type = $this->TypeRepository->findAll();
        } else {

            $type[] = $this->TypeRepository->find($id);
        }

        $posts = $this->PostRepository->findBySession();
        $categories = $this->categorieRepository->findAll();
        //$totaltype = $this->PostRepository->findSommeByTypeT();
        // $total = $this->PostRepository->findTotalByTypeT();

        $table = [];
        foreach ($posts as $post) {
            $table[$post->getSpecialite()->getId()][$post->getCategorie()->getId()] = $post->getNbrPost();
        }

        $table[0][0] = $this->PostRepository->findTotal()['total'];
        $reception = $this->PostRepository->findSommeBySpecialite();
        $total = $this->PostRepository->findTotalT();
        $totalBySpecialite = [];
        $totalByType = $this->PostRepository->findSommeByTypeT();

        foreach ($reception as $tableSomme) {
            $totalBySpecialite[$tableSomme["specialite_id"]] = $tableSomme["somme"];
        }

        //  dd($posts[1]->getCategorie()->getCandidates());
        $candidatListA = $this->candidateRepository->findAllCandidate(); //liste des candidate affecter
        // dd($candidatListA);
        $condid = [];
        $i = 0;
        foreach ($candidatListA as $cand) {
            $condid[$cand->getCategorie()->getId()][$cand->getSpecialite()->getId()] = $cand;
            $i++;
        }
        // dd($condid);
        $session = $this->sessionRepository->findOneBy([
            'active' => 1
        ]);
        if ($id == -1)
            $knpSnappyPdf->setOption('footer-center', '[page]');

        $html = $this->renderView('candidate/pdf.html.twig', array(
            'candidate_list_affecter' => $condid,
            'type_list' => $type,
            'post_list' => $posts,
            //'total_type' => $totalByType,
            'totalBySpecialite' => $totalBySpecialite,
            'totalByType' => $totalByType,
            'Total' => $total,
            'Categorie' => $categories,
            'session' => $session
        ));

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html),
            'PV ' . date('Y_m_d') . '.pdf'
        );
    }

    #[Route('/candidate/pdf/vide', name: 'candidate_PDf_vide', methods: 'get')]
    public function pdfActionVide(Pdf $knpSnappyPdf)
    {
        $type = $this->TypeRepository->findAll();
        $posts = $this->PostRepository->findBySession();
        $candidatListA = $this->candidateRepository->findAllCandidate(); //liste des candidate affecter
        $table = [];
        foreach ($posts as $post) {
            $table[$post->getSpecialite()->getId()][$post->getCategorie()->getId()] = $post->getNbrPost();
        }

        $table[0][0] = $this->PostRepository->findTotal()['total'];
        $reception = $this->PostRepository->findSommeBySpecialite();
        $total = $this->PostRepository->findTotalT();
        $totalBySpecialite = [];
        $totalByType = $this->PostRepository->findSommeByTypeT();

        foreach ($reception as $tableSomme) {
            $totalBySpecialite[$tableSomme["specialite_id"]] = $tableSomme["somme"];
        }

        $session = $this->sessionRepository->findOneBy([
            'active' => 1
        ]);
        $knpSnappyPdf->setOption('footer-center', '[page]');

        $html = $this->renderView('candidate/pdfVide.html.twig', array(
            'candidate_list_affecter' => $candidatListA,
            'totalByType' => $totalByType,
            'session' => $session,
            'Total' => $total,
            'type_list' => $type,
        ));

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html),
            'PV ' . date('Y_m_d') . '.pdf'
        );
    }

    #[Route('/candidate/pdf/Absence', name: 'candidate_PDf_Absence', methods: 'get')]
    public function pdfActionAbse(Pdf $knpSnappyPdf)
    {
        $type = $this->TypeRepository->findAll();

        $candidatListA = $this->candidateRepository->findAllABS(); //liste des candidate absence

        $ABS_total = $this->candidateRepository->findAllABSTotal();
        $session = $this->sessionRepository->findOneBy([
            'active' => 1
        ]);

        $knpSnappyPdf->setOption('footer-center', '[page]');

        $html = $this->renderView('candidate/pdfAbsence.html.twig', array(
            'candidate_list_absence' => $candidatListA,
            'type_list' => $type,
            'session' => $session,
            'total_absence' => $ABS_total
        ));

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html),
            'PV ' . date('Y_m_d') . '.pdf'
        );
    }
    #[Route('/candidate/Attestation/{id}', name: 'candidate_PDf_attestation', methods: 'get')]
    public function pdfActionAttestation(Pdf $knpSnappyPdf, $id)
    {
        $condidat = $this->candidateRepository->find($id);


        $html = $this->renderView('candidate/attestation.html.twig', array(
            'Candidate'  => $condidat

        ));

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html),
            'Attestation ' . $condidat->getCIN() . '.pdf'
        );
    }
}
