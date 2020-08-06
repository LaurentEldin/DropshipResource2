<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AgenceController extends AbstractController
{
    /**
     * @Route("/agence", name="agence")
     */
    public function agence()
    {
        return $this->render('agence/agence.html.twig');
    }


}