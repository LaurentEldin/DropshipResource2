<?php


namespace App\Controller;


use App\Entity\Recruitement;
use App\Form\RecruitementType;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RecruitementRepository;

class RecruitementController extends AbstractController
{
    /**
     * @Route("/recruitement", name="recruitement")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     * @throws Exception
     */
    public function Recruitement(Request $request, EntityManagerInterface $entityManager)
    {
        $recruitement = new Recruitement();
        $recruitement->setDate(new \DateTime('now'));

        $form = $this->createForm(RecruitementType::class, $recruitement);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                //$file = $recruitement->getDocument();
                $file = $form->get('document')->getData();
                $fileDocument = md5(uniqid()).'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_directory'), $fileDocument);
                $recruitement->setDocument($fileDocument);

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($recruitement);
                $entityManager->flush();

                $this->addFlash('success', 'Demande envoyée avec succès!');
                return $this->redirectToRoute('recruitement');
                }

        return $this->render('recruitement/recruitement.html.twig',
            array('recruitementForm' => $form->createView()
            )
        );
    }

    /**
     * @Route("admin/recruitement", name="recruitement_admin")
     * @param RecruitementRepository $recruitementRepository
     * @return Response
     */
    public function RecruitementAdmin(recruitementRepository $recruitementRepository)
    {
        $recruitement = $recruitementRepository->findBy([],['date' => 'DESC']);

        return $this->render('recruitement/recruitement_admin.html.twig', ['recruitement' => $recruitement]);
    }

    /**
     * @Route("admin/recruitement/delete/{id}", name="recruitement_admin_id")
     * @param RecruitementRepository $recruitementRepository
     * @param EntityManagerInterface $entityManager
     * @param $id
     * @return RedirectResponse
     */
    public function deleteRecruitement(RecruitementRepository $recruitementRepository, EntityManagerInterface $entityManager, $id)
    {
        $recruitement = $recruitementRepository->find($id);

        $entityManager->remove($recruitement);

        $entityManager->flush();

        return $this->redirectToRoute('recruitement_admin');
    }
}