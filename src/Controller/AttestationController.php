<?php

namespace App\Controller;

use App\Repository\CandidateRepository;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AttestationController extends AbstractController
{
    private $candidateRepository;

    public function __construct(

        CandidateRepository $candidateRepository,
    ) {

        $this->candidateRepository = $candidateRepository;
    }


    #[Route('/attestation', name: 'app_attestation')]
    public function index(): Response
    {
        return $this->render('attestation/index.html.twig', [
            'controller_name' => 'AttestationController',
        ]);
    }

    //Imprimer candidate
    #[Route('/attestation_impr/{id}', name: 'app_attestation_impr')]
    public function imprimer($id,Pdf $knpSnappyPdf): Response
    {

        $candidate = $this->candidateRepository->find($id);
            $html= $this->renderView('attestation/attestation.html.twig', [ 'candidate'=> $candidate]);

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html,array('orientation' => 'Portrait')),
            'personnel-data.pdf' ,
            
        );

    }

    //Imprimer candidate
    #[Route('/attestation_Reussite', name: 'app_attestation_Reussite')]
    public function attestationReussite(Pdf $knpSnappyPdf): Response
    {

        $candidates = $this->candidateRepository->findAllCandidateValide();
            $html= $this->renderView('attestation/attestation_Reussite.html.twig', [ 'candidates'=> $candidates]);

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html,array('orientation' => 'Portrait')),
            'Attestation_Reussites.pdf' ,
            
        );

    }


    // Recherche à candidate
    #[Route('/attestation/rcandidat', name: 'rcandidat', methods: 'Post')]
    public function rcandidat(Request $request) : JsonResponse
    {

        $candidate = $this->candidateRepository->findAllCandidateRo("%".$request->get('cin')."%"); 
        $candidate_data=[];
foreach($candidate as $cand){
    $candidate_data[]=[
        'id' => $cand->getId(),
        'nom' => $cand->getNom(),
        'prenom' => $cand->getPrenom(),
        'cin' => $cand->getCIN(),
        'cne' => $cand->getCNE(),
        'specialite'=>$cand->getSpecialite()?->getIntitule(),
    ];
}
       
        return new JsonResponse($candidate_data);
    }

 

}
