<?php


namespace App\Controller;



use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EspaceclientController extends AbstractController
{
    /**
     * @Route("/espace_client/{id}", name="espace_client")
     * @param UserRepository $userRepository
     * @param int $id
     * @return Response
     */

    public function EspaceClient (UserRepository $userRepository, $id)
    {
        $users = $userRepository->findBy(['id'=>$id]);

        return $this->render('espace.client.html.twig', ['users' => $users]);
    }

    /**
     * @Route("/espace_client/{id}/edit",name="edit_client")
     * @param User $user
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function EditClient(User $user, $id, Request $request)
    {
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('espace_client', ['id' => $user->getId()]);
        }

        $this->addFlash('success', 'Modification validés !');
        return $this->render('edit_client.html.twig', [
            'user' => $user,
            'userFormView' => $form->createView(),
        ]);
    }

    /**
     * @Route("espace_client/{id}/delete",name="delete_client")
     * @param Request $request
     * @param UserRepository $userRepository
     * @param EntityManagerInterface $entityManager
     * @param $id
     * @return RedirectResponse
     */
    public function delete(Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager, $id) : Response
    {
        $user = $userRepository->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        $this->addFlash('success', 'Suppression de votre compte confirmé, Nous sommes désolé de vous voir partir !');
        return $this->redirectToRoute('home');
    }
}