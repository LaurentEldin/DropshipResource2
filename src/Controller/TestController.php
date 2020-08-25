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
            ->from('microsoft@gmail.com')
            ->to('atif.developpeur@gmail.com')
            ->subject('on vous embauche')
            ->text('6000 / mois ');

        $mailer->send($email);
    }
}