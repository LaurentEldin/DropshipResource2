<?php


namespace App\Controller;


use App\Entity\Blog;
use App\Form\BlogType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BlogRepository;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function blog(BlogRepository $blogRepository)
    {
        $blog = $blogRepository->findBy([],['id' => 'DESC']);

        return $this->render('blog/blog.html.twig', [
            'blog'=>$blog
        ]);
    }

    /**
     * @Route("/admin/blog/admin", name="blog_admin")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     * @throws \Exception
     */
    public function blogAdmin(Request $request, EntityManagerInterface $entityManager)
    {
        $blog = new Blog();
        $blog->setDate(new \DateTime('now'));

        $form = $this->createForm(BlogType::class, $blog);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('picture')->getData();
            $filePicture = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getParameter('upload_directory'), $filePicture);
            $blog->setPicture($filePicture);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($blog);
            $entityManager->flush();

            $this->addFlash('success', 'Blog crée avec succès.');
            return $this->redirectToRoute('blog');
        }

        return $this->render('blog/blog_admin.html.twig',
            array('blogForm' => $form->createView()
            )
        );
    }

    /**
     * @Route("/admin/blog/delete/{id}", name="blogDeleteId")
     * @param BlogRepository $blogRepository
     * @param EntityManagerInterface $entityManager
     * @param $id
     * @return RedirectResponse
     */
    public function deleteBlog(BlogRepository $blogRepository, EntityManagerInterface $entityManager, $id)
    {
        $blog = $blogRepository->find($id);
        $entityManager->remove($blog);
        $entityManager->flush();
        $this->addFlash('success', 'Suppression confirmée.');
        return $this->redirectToRoute('blog');
    }

    /**
     * @Route("/admin/blog/update/{id}", name="blogUpdateId")
     * @param BlogRepository $blogRepository
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param $id
     * @return RedirectResponse|Response
     */
    public function updateProduct(BlogRepository $blogRepository, Request $request, EntityManagerInterface $entityManager, $id)
    {
        $blog = $blogRepository->find($id);

        $form = $this->createForm(BlogType::class, $blog);

        if ($request->isMethod('post')) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->persist($blog);
                $entityManager->flush();
                $this->addFlash('success', 'Modification confirmée.');
                return $this->redirectToRoute('blog');
            }
        }

        $formView = $form->createView();

        return $this->render('blog/blog_update.html.twig', [
            'formView' => $formView
        ]);
    }

    /**
     * @Route("/blog/recherche_categories",name="recherche_categories")
     * @param BlogRepository $blogRepository
     * @param Request $request
     * @return Response
     */

    public function searchCategories(BlogRepository $blogRepository, Request $request)
    {
        $categorie = $request->query->get(('categorie'));

        $blog = $blogRepository->getByField($categorie);

        return $this->render('blog/blog.html.twig', [
            'blog' => $blog,
            'categorie'=>$categorie
        ]);
    }

    /**
     * @Route("/blog/article/{id}",name="details_article")
     * @param BlogRepository $blogRepository
     * @param $id
     * @return Response
     */
    public function showOneBlog(BlogRepository $blogRepository, $id)
    {
        $blog = $blogRepository->find($id);

        $blogB = $blogRepository->findBy([],['id' => 'DESC']);

        return $this->render('blog/one_blog.html.twig',[
            'blog'=>$blog,
            'blogB'=>$blogB
        ]);
    }
}