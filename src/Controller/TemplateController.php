<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TemplateController extends AbstractController
{
    /**
     * @Route("/exclusivite", name="exclusivite")
     */
    public function exclusivite()
    {
        return $this->render('exclusivite/template.html.twig');
    }


}