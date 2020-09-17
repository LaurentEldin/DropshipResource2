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
     * @Route("/exclusivite/e-commerce/page2", name="ecommerce2")
     */
    public function ecommerce2()
    {
        return $this->render('exclusivite/ecommerce2.html.twig');
    }
    /**
     * @Route("/exclusivite/e-commerce/page3", name="ecommerce3")
     */
    public function ecommerce3()
    {
        return $this->render('exclusivite/ecommerce3.html.twig');
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
     * @Route("/exclusivite/habitat/page2", name="habitat2")
     */
    public function habitat2()
    {
        return $this->render('exclusivite/habitat2.html.twig');
    }
    /**
     * @Route("/exclusivite/habitat/page3", name="habitat3")
     */
    public function habitat3()
    {
        return $this->render('exclusivite/habitat3.html.twig');
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
    /**
     * @Route("/exclusivite/portfolio/page2", name="portfolio2")
     */
    public function portfolio2()
    {
        return $this->render('exclusivite/portfolio2.html.twig');
    }

    /**
     * @Route("/exclusivite/liberal", name="liberal")
     */
    public function liberal()
    {
        return $this->render('exclusivite/liberal.html.twig');
    }

    /**
     * @Route("/concours", name="concours")
     */
    public function concours()
    {
        return $this->render('concours.html.twig');
    }
}