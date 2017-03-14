<?php

namespace VisualiserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuzzleHttp\Client;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="visualiser_index")
     */
    public function indexAction()
    {
        return $this->render('VisualiserBundle:Default:index.html.twig');
    }

    /**
     * @Route("/google-charts", name="visualiser_googlecharts")
     */
    public function gchartsAction()
    {
        return $this->render('VisualiserBundle:Default:gcharts.html.twig');
    }
    
        /**
     * @Route("/zoopla", name="visualiser_zoopla")
     */
    public function zooplaAction()
    {
		// Get Guzzle
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://api.zoopla.co.uk/api/v1/'
		]);
		
		// Get the api key
		$apiKey = $this->getParameter('zoopla_api_key');
		dump($apiKey);
		
		$client->request('GET', 'zed_index', [
			'query' => [
				'area' => 'HA3',
				'output_type' => 'outcode',
				'api_key' => $apiKey,
			]
		]);

        return $this->render('VisualiserBundle:Default:zoopla.html.twig');
    }

    /**
     * @Route("/highcharts", name="visualiser_highcharts")
     */
    public function highChartsAction()
    {
        return $this->render('VisualiserBundle:Default:highcharts.html.twig');
    }

    /**
     * @Route("/d3js", name="visualiser_d3js")
     */
    public function d3jsAction()
    {
        return $this->render('VisualiserBundle:Default:d3js.html.twig');
    }
    
    /**
     * @Route("/dashboard", name="visualiser_dashboard")
     */
    public function dashboardAction()
    {
        return $this->render('VisualiserBundle:Default:d3js.html.twig');
    }
}
