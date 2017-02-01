<?php

namespace VisualiserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('VisualiserBundle:Default:index.html.twig');
    }

    /**
     * @Route("/google-charts")
     */
    public function gchartsAction()
    {
        return $this->render('VisualiserBundle:Default:gcharts.html.twig');
    }

    /**
     * @Route("/highcharts")
     */
    public function highChartsAction()
    {
        return $this->render('VisualiserBundle:Default:highcharts.html.twig');
    }

    /**
     * @Route("/d3js")
     */
    public function d3jsAction()
    {
        return $this->render('VisualiserBundle:Default:d3js.html.twig');
    }
}
