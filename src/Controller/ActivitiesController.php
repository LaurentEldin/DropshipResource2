<?php


namespace App\Controller;


use App\Entity\Activities;
use App\Form\ActivitiesType;
use App\Repository\ActivitiesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActivitiesController extends AbstractController
{
    /**
     * @Route("/activities", name="activities")
     * @param ActivitiesRepository $activitiesRepository
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function indexActivities(ActivitiesRepository $activitiesRepository, EntityManagerInterface $entityManager)
    {
        $activities = $activitiesRepository->findAll();

        return $this->render('activities/activities.html.twig', [
            'activites'=>$activities,
        ]);
    }

    /**
     * @Route("/activities/admin",name="create_activities")
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function create(EntityManagerInterface $entityManager, Request $request)
    {
        $activities = new Activities();
        $form = $this->createForm(ActivitiesType::class, $activities);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('picture')->getData();
            $filePicture = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'), $filePicture);
            $activities->setPicture($filePicture);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($activities);
            $entityManager->flush();

            $this->addFlash('success', 'Article créé avec succès !');
            return $this->redirectToRoute('activities');
        }

        return $this->render('activities/activities_admin.html.twig', [
            'activitiesForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/activities/admin/edit/{id}",name="edit_activities")
     * @param Activities $activities
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return RedirectResponse|Response
     */
    public function editBlog(Activities $activities, Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(ActivitiesType::class, $activities);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($activities);
            $entityManager->flush();

            $this->addFlash('success', 'Article modifié avec succès');
            return $this->redirectToRoute('activities');
        }

        return $this->render('activities/activities_admin.html.twig', [
            'activitiesForm' => $form->createView(),
        ]);
    }


    /**
     * @Route("/activities/admin/{id}/delete",name="delete_activities")
     * @param ActivitiesRepository $activitiesRepository
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function deleteBlog(ActivitiesRepository $activitiesRepository, EntityManagerInterface $entityManager, Request $request, $id)
    {
        $activities = $activitiesRepository->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($activities);
        $entityManager->flush();

        $this->addFlash('success', 'Suppression confirmé.');
        return $this->redirectToRoute('activities');
    }

    /**
     * @Route("/activities/leeds",name="leeds")
     */
    public function leeds()
    {
        return $this->render('activities/leeds.html.twig');
    }
    /**
     * @Route("/activities/website",name="website")
     */
    public function website()
    {
        return $this->render('activities/website.html.twig');
    }
    /**
     * @Route("/activities/community",name="community")
     */
    public function community()
    {
        return $this->render('activities/community.html.twig');
    }
}