<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("admin/utilisateurs", name="utilisateurs")
     * @param UserRepository $userRepository
     * @return Response
     */
    public function usersList(UserRepository $userRepository)
    {
        $user = $userRepository->findAll();

        return $this->render('admin/users.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("admin/utilisateurs/modifier/{id}", name="modifier_utilisateur")
     * @param User $user
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return RedirectResponse|Response
     */
    public function editUser(User $user, Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/edituser.html.twig', [
            'userForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("admin/utilisateurs/{id}/delete",name="delete_utilisateur")
     * @param Request $request
     * @param UserRepository $userRepository
     * @param EntityManagerInterface $entityManager
     * @param $id
     * @return RedirectResponse
     */
    public function deleteUser(Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager, $id) : Response
    {
        $user = $userRepository->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        $this->addFlash('success', 'Suppression du compte confirmé.');
        return $this->redirectToRoute('admin');
    }


    /**
     * @Route("admin/recherche_utilisateurs",name="recherche_utilisateurs")
     * @param UserRepository $userRepository
     * @param Request $request
     * @return Response
     */

    public function searchUser(UserRepository $userRepository, Request $request)
    {
        $name = $request->query->get('name');
        $lastname = $request->query->get('lastname');
        $city = $request->query->get('city');
        $adresse = $request->query->get('adresse');

        $user = $userRepository->getByField($name, $lastname, $city, $adresse);

        return $this->render('admin/users.html.twig', [
            'user' => $user,
            'name' => $name,
            'lastname' => $lastname,
            'city' => $city,
            'adresse' => $adresse,
        ]);
    }
}
