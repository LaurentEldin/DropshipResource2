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
            ->from('zozo@gmail.com')
            ->to('atif.developpeur@gmail.com')
            ->subject('test')
            ->text('test');

        $mailer->send($email);
    }
}