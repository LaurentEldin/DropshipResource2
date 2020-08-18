<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test-mail")
     */
    public function testMail(MailerInterface $mailer)
    {
        dump('coucou');
        $email = (new Email())
            ->from('samahz@hotmail.fr')
            ->to('atif.developpeur@gmail.com')
            ->subject('je te donne tout mon argent')
            ->text('et ce message a une valeur juridique');

        $mailer->send($email);
    }
}