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
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*----------------              E-COMMERCE      -------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
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
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*----------------              IMMOBILIER      -------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
    /**
     * @Route("/exclusivite/immobilier", name="immobilier")
     */
    public function immobilier()
    {
        return $this->render('exclusivite/immobilier.html.twig');
    }

    /**
     * @Route("/exclusivite/immobilier/page2", name="immobilier2")
     */
    public function immobilier2()
    {
        return $this->render('exclusivite/immobilier2.html.twig');
    }

    /**
     * @Route("/exclusivite/immobilier/page3", name="immobilier3")
     */
    public function immobilier3()
    {
        return $this->render('exclusivite/immobilier3.html.twig');
    }

/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*----------------              VTC             -------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
    /**
     * @Route("/exclusivite/vtc", name="vtc")
     */
    public function vtc()
    {
        return $this->render('exclusivite/vtc.html.twig');
    }
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*----------------              HABITAT         -------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
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
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*----------------              RESTAURANT      -------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
    /**
     * @Route("/exclusivite/restaurant", name="restaurant")
     */
    public function restaurant()
    {
        return $this->render('exclusivite/restaurant.html.twig');
    }

    /**
     * @Route("/exclusivite/restaurant/page2", name="restaurant2")
     */
    public function restaurant2()
    {
        return $this->render('exclusivite/restaurant2.html.twig');
    }

    /**
     * @Route("/exclusivite/restaurant/page3", name="restaurant3")
     */
    public function restaurant3()
    {
        return $this->render('exclusivite/restaurant3.html.twig');
    }
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*----------------              PORTFOLIO       -------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
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
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*----------------              LIBERAL         -------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
    /**
     * @Route("/exclusivite/liberal", name="liberal")
     */
    public function liberal()
    {
        return $this->render('exclusivite/liberal.html.twig');
    }

/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*----------------              CONCOURS        -------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
    /**
     * @Route("/concours", name="concours")
     */
    public function concours()
    {
        return $this->render('concours.html.twig');
    }
}