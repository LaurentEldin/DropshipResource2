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
            ->from('hello@example.com')
            ->to('adrien.russo@gmail.com')
            ->subject('test')
            ->text('test du text');

        $mailer->send($email);
    }
}