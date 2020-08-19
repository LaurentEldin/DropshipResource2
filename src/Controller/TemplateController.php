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

    /**
     * @Route("/exclusivite/e-commerce", name="ecommerce")
     */
    public function ecommerce()
    {
        return $this->render('exclusivite/ecommerce.html.twig');
    }

    /**
     * @Route("/exclusivite/immobilier", name="immobilier")
     */
    public function immobilier()
    {
        return $this->render('exclusivite/immobilier.html.twig');
    }

    /**
     * @Route("/exclusivite/vtc", name="vtc")
     */
    public function vtc()
    {
        return $this->render('exclusivite/vtc.html.twig');
    }

    /**
     * @Route("/exclusivite/habitat", name="habitat")
     */
    public function habitat()
    {
        return $this->render('exclusivite/habitat.html.twig');
    }

    /**
     * @Route("/exclusivite/restaurant", name="restaurant")
     */
    public function restaurant()
    {
        return $this->render('exclusivite/restaurant.html.twig');
    }

    /**
     * @Route("/exclusivite/portfolio", name="portfolio")
     */
    public function portfolio()
    {
        return $this->render('exclusivite/portfolio.html.twig');
    }


}