<?php

namespace visualiserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('visualiserBundle:Default:index.html.twig');
    }

    /**
     * @Route("/google-charts")
     */
    public function gchartsAction()
    {
        return $this->render('visualiserBundle:Default:gcharts.html.twig');
    }

    /**
     * @Route("/highcharts")
     */
    public function highChartsAction()
    {
        return $this->render('visualiserBundle:Default:highcharts.html.twig');
    }

    /**
     * @Route("/d3js")
     */
    public function d3jsAction()
    {
        return $this->render('visualiserBundle:Default:d3js.html.twig');
    }

    /**
     * @Route("/todo")
     */
    public function todoAction()
    {
        return $this->render('visualiserBundle:Default:todo.html.twig');
    }
}
