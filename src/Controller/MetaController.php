<?php


namespace App\Controller;

use App\Entity\Meta;
use App\Form\MetaType;
use App\Form\MetadescriptionType;
use App\Repository\MetaRepository;
use App\Repository\MetadescriptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MetaController extends AbstractController
{
    /**
     * @Route("/admin/meta", name="metaAdmin")
     */
    public function meta(MetadescriptionRepository $metadescriptionRepository, MetaRepository $metaRepository, Request $request)
    {
        $meta = new Meta();
        $form = $this->createForm(MetaType::class, $meta);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($meta);
            $entityManager->flush();

            $this->addFlash('success', 'clé prise en compte');
            return $this->redirectToRoute('metaAdmin');
        }

        $metaf = $metaRepository->findBy([],['id' => 'DESC']);
        $metadescription = $metadescriptionRepository->findBy([],['id' => 'DESC']);

        return $this->render('meta/meta.html.twig', [
            'metaf' => $metaf,
            'metadescription' => $metadescription,
            'form' => $form->createView(),
            'meta' => $meta,
        ]);
    }

    /**
     * @Route("/admin/meta/description/{id}", name="descriptionUpdateId")
     */
    public function UpdateDescription(MetadescriptionRepository $metadescriptionRepository, Request $request, EntityManagerInterface $entityManager, $id)
    {
        $metadescription = $metadescriptionRepository->find($id);

        $form = $this->createForm(MetadescriptionType::class, $metadescription);

        if ($request->isMethod('post')) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->persist($metadescription);
                $entityManager->flush();
                $this->addFlash('success', 'Modification confirmée.');
                return $this->redirectToRoute('metaAdmin');
            }
        }

        $formView = $form->createView();

        return $this->render('meta/metadescriptionUpdate.html.twig', [
            'formView' => $formView
        ]);
    }

    /**
     * @Route("/admin/meta/delete/{id}", name="metaDeleteId")
     */
    public function deleteMeta(MetaRepository $metaRepository, EntityManagerInterface $entityManager, $id)
    {
        $meta = $metaRepository->find($id);
        $entityManager->remove($meta);
        $entityManager->flush();
        $this->addFlash('success', 'Suppression confirmé.');
        return $this->redirectToRoute('metaAdmin');
    }

    /**
     * @param MetadescriptionRepository $metadescriptionRepository
     * @param MetaRepository $metaRepository
     * @return Response
     */
    public function metaRender(MetadescriptionRepository $metadescriptionRepository, MetaRepository $metaRepository)
    {
        $metaDescription = $metadescriptionRepository->findAll();
        $metaKeyWords = $metaRepository->findAll();

        return $this->render('meta/metatag.html.twig', [
            'metadescription' => $metaDescription,
            'metatags'=> implode(', ', $metaKeyWords)
        ]);
    }


}