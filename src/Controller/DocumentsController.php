<?php


namespace App\Controller;


use App\Entity\Documents;
use App\Repository\DocumentsRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DocumentsController extends AbstractController
{
    /**
     * @Route("/espace_client/documents",name="documents")
     * @param DocumentsRepository $documentsRepository
     * @return Response
     */
    public function documents(DocumentsRepository $documentsRepository)
    {
        $documents=  $documentsRepository->findAll();

        return $this->render('documents.html.twig', [
            'documents' => $documents
        ]);
    }

}