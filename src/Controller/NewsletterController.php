<?php


namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterType;
use App\Repository\NewsletterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class NewsletterController extends AbstractController
{
    /**
     * @Route("/newsletter", name="newsletter")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param NewsletterRepository $newsletterRepository
     * @return RedirectResponse|Response
     */
    public function newsletter(Request $request, EntityManagerInterface $entityManager, NewsletterRepository $newsletterRepository)
    {
        $newsletter = new Newsletter();


        if ($request->isMethod('Post')) {
            $newsletter->setMail($request->request->get('mail'));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newsletter);
            $entityManager->flush();

            $this->addFlash('success','Inscription validée!');
            return new JsonResponse(null, 202);

        }
        return new JsonResponse(null, 400);
    }

    /**
     * @Route("/admin/newsletter", name="newsletterAdmin")
     * @param NewsletterRepository $newsletterRepository
     * @return Response
     */
    public function newsletterAdmin(NewsletterRepository $newsletterRepository)
    {
        $newsletter = $newsletterRepository->findAll();

        return $this->render('newsletter/newsletter_admin.html.twig', ['newsletter'=>$newsletter]);
    }

    /**
     * @Route("admin/newsletter/delete/{id}", name="newsletterDeleteId")
     * @param NewsletterRepository $newsletterRepository
     * @param EntityManagerInterface $entityManager
     * @param $id
     * @return RedirectResponse
     */
    public function deleteNewsletter(NewsletterRepository $newsletterRepository, EntityManagerInterface $entityManager, $id)
    {
        $newsletter = $newsletterRepository->find($id);

        $entityManager->remove($newsletter);

        $entityManager->flush();

        return $this->redirectToRoute('newsletterAdmin');
    }

}