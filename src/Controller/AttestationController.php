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

    #[Route('/attestation_impr/{id}', name: 'app_attestation_impr')]
    public function recherch($id,Pdf $knpSnappyPdf): Response
    {

        $candidate = $this->candidateRepository->find($id);
            $html= $this->renderView('attestation/attestation.html.twig', [ 'candidate'=> $candidate]);

        return new PdfResponse(
            $knpSnappyPdf->getOutputFromHtml($html,array('orientation' => 'Portrait')),
            'personnel-data.pdf' ,
            
        );

       // return $this->render('attestation/attestation.html.twig', [ ]);
    }



    #[Route('/attestation/rcandidat', name: 'rcandidat', methods: 'Post')]
    public function getClient(Request $request) //: JsonResponse
    {

        $candidate = $this->candidateRepository->findBy(['CIN'=>$request->get('cin')])[0]; 
       // $candidate=count($candidates)>=1??$candidates[0]; 
        $candidate_data = [
            'id' => $candidate->getId(),
            'nom' => $candidate->getNom(),
            'prenom' => $candidate->getPrenom(),
            'cin' => $candidate->getCIN(),
            'cne' => $candidate->getCNE(),
            'specialite'=>$candidate->getSpecialite()?->getIntitule(),
        ];
        return new JsonResponse($candidate_data);
    }

 

}
