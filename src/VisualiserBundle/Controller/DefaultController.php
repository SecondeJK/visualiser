<?php

namespace VisualiserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

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
		
		$cityIndex = ['Birmingham','Manchester','Leeds','Nottingham','Bristol'];
		$cityRawData = [];
		
		// Get the api key
		$apiKey = $this->getParameter('zoopla_api_key');
		
		foreach ($cityIndex as $city) {
		
			$response = $client->request('GET', 'property_listings.json', [
				'query' => [
					'area' => $city,
					'listing_status' => 'rent',
					'include_rented' => 0,
					'radius' => 10,
					'summarized' => 1,
					'api_key' => $apiKey
				]
			]);
			
			$fullRawData = json_decode($response->getBody(), true);
			$cityRawData[$city] = $fullRawData;	
		}

		$chartData = $this->refactorApiDataForChart($cityRawData);
		
		dump($chartData);
		
        return $this->render('VisualiserBundle:Default:zoopla.html.twig');
    }
    
    /**
     * @param array $groupedApiData
     */
    public function refactorApiDataForChart(array $groupedApiData)
    {
		$refactoredData = [];

		foreach ($groupedApiData as $city => $cityData) {
			$totalRentPrice = 0;
			$i = 0;
				
			foreach ($cityData['listing'] as $listing) {
				$totalRentPrice += $listing['price'];
				$i++;
			}
			
			$refactoredData[$city] = $totalRentPrice / $i;
		}
		
		return $refactoredData;
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
