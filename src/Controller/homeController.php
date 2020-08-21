<?php


namespace App\Controller;


use App\Entity\Contact;
use App\Entity\Newsletter;
use App\Form\NewsletterType;
use App\Repository\BlogRepository;
use App\Repository\ContactRepository;
use App\Repository\NewsletterRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactType;


class homeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param Swift_Mailer $mailer
     * @param UserRepository $userRepository
     * @return Response
     * @throws \Exception
     */
    public function home(Request $request, EntityManagerInterface $entityManager, Swift_Mailer $mailer, UserRepository $userRepository, BlogRepository $blogRepository)
    {
        $blog = $blogRepository->findBy([],['id' => 'DESC']);

        $contact = new Contact();
        $contact->setDate(new \DateTime('now'));
        $users = $userRepository->findAll();

        $form = $this->createForm(ContactType::class, $contact);

        if ($request->isMethod('Post')) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($contact);
                $entityManager->flush();
                $message = (new \Swift_Message('Demande de contact'))
                    ->setFrom('atif.developpeur@gmail.com')
                    ->setTo('atif.developpeur@gmail.com')
                    ->setBody('Nom: ' . $contact->getName() . '<br>' . 'Tel: ' . $contact->getPhone() . '<br>' . 'Email: ' . $contact->getMail() . '<br>' . 'Sujet: ' . $contact->getMessage(), 'text/html');
                $mailer->send($message);

                $this->addFlash('success', 'Votre message a bien été envoyé.');
                return $this->redirectToRoute('home');
            }
        }
        return $this->render('home.html.twig', [
            'contactForm' => $form->createView(),
            'users' => $users,
            'blog' => $blog,
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     * @param ContactRepository $contactRepository
     * @return Response
     */
    public function contact(ContactRepository $contactRepository)
    {
        $contact = $contactRepository->findBy([],['date' => 'DESC']);

        return $this->render('contact/contact.html.twig', ['contact' => $contact]);
    }

    /**
     * @Route("/contact/delete/{id}", name="contact_delete_id")
     * @param ContactRepository $contactRepository
     * @param EntityManagerInterface $entityManager
     * @param $id
     * @return RedirectResponse
     */
    public function deleteContact(ContactRepository $contactRepository, EntityManagerInterface $entityManager, $id)
    {
        $contact = $contactRepository->find($id);

        $entityManager->remove($contact);

        $entityManager->flush();

        return $this->redirectToRoute('contact');
    }

    /**
     * @Route("/contactform", name="contactForm")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param Swift_Mailer $mailer
     * @param UserRepository $userRepository
     * @return Response
     * @throws \Exception
     */
    public function contactform(Request $request, EntityManagerInterface $entityManager, Swift_Mailer $mailer, UserRepository $userRepository, BlogRepository $blogRepository)
    {
        $contact = new Contact();
        $contact->setDate(new \DateTime('now'));
        $users = $userRepository->findAll();

        $form = $this->createForm(ContactType::class, $contact);

        if ($request->isMethod('Post')) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($contact);
                $entityManager->flush();
                $message = (new \Swift_Message('Demande de contact'))
                    ->setFrom('atif.developpeur@gmail.com')
                    ->setTo('atif.developpeur@gmail.com')
                    ->setBody('Nom: ' . $contact->getName() . '<br>' . 'Tel: ' . $contact->getPhone() . '<br>' . 'Email: ' . $contact->getMail() . '<br>' . 'Sujet: ' . $contact->getMessage(), 'text/html');
                $mailer->send($message);

                $this->addFlash('success', 'Votre message a bien été envoyé.');
                return $this->redirectToRoute('home');
            }
        }
        return $this->render('contact/contactForm.html.twig', [
            'contactForm' => $form->createView(),
            'users' => $users,
        ]);
    }

    /**
     * @Route("/contact/validation", name="validationContact")
     */
    public function validationcontact()
    {
        return $this->render('contact/validationContact.html.twig');
    }

}