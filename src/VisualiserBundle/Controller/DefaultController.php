<?php

namespace VisualiserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class DefaultController extends Controller
{	
	protected $client;
	
	protected $apiKey;
	
	public function __construct()
	{
		// Get Guzzle
		$this->client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'http://api.zoopla.co.uk/api/v1/'
		]);
	}
	
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
		$this->apiKey = $this->getParameter('zoopla_api_key');
					
        return $this->render(
			'VisualiserBundle:Default:zoopla.html.twig', 
			array(
				'payload' => $this->zooplaGoogleChart(),
				'cityIndex' => $this->returnCityIndexForCharts(),
				'highchartData' => $this->zooplaHighChart()
			)
		);
    }
    
    /**
     * @param array $groupedApiData
     */
    public function refactorApiDataForChart(array $groupedApiData)
    {
		$refactoredData = [];
		
		// Set columns
		$columns = ['City','Average'];
		
		$refactoredData[] = $columns;

		foreach ($groupedApiData as $city => $cityData) {
			$totalRentPrice = 0;
			$i = 0;
				
			foreach ($cityData['listing'] as $listing) {
				$totalRentPrice += $listing['price'];
				$i++;
			}
			
			$refactoredDataColumn = [$city, $totalRentPrice / $i];
			$refactoredData[] = $refactoredDataColumn;
			unset($refactoredDataColumn);
		}
		
		return $refactoredData;
	}

    /**
     * @Route("/visualiser_highcharts", name="visualiser_highcharts")
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
    
    public function zooplaGoogleChart()
    {
		// At the moment this chart lives in the controller
		// This will be moved to a new class and then possibly service based
		$cityRawData = [];
	
		foreach ($this->returnCityIndexForCharts() as $city) {
		
			$response = $this->client->request('GET', 'property_listings.json', [
				'query' => [
					'area' => $city,
					'listing_status' => 'rent',
					'include_rented' => 0,
					'radius' => 10,
					'summarized' => 1,
					'api_key' => $this->apiKey,
					'page_size' => 50
				]
			]);
			
			$fullRawData = json_decode($response->getBody(), true);
			$cityRawData[$city] = $fullRawData;	
		}

		$chartData = $this->refactorApiDataForChart($cityRawData);
		return $chartData;
    }
    
    public function zooplaHighChart()
    {
		// At the moment this chart lives in the controller
		// This will be moved to a new class and then possibly service based
		$cityRawData = [];
	
		foreach ($this->returnCityIndexForCharts() as $city) {
		
			$response = $this->client->request('GET', 'property_listings.json', [
				'query' => [
					'area' => $city,
					'listing_status' => 'rent',
					'include_rented' => 0,
					'radius' => 10,
					'summarized' => 1,
					'api_key' => $this->apiKey,
					'page_size' => 50
				]
			]);
			
			$fullRawData = json_decode($response->getBody(), true);
			$cityRawData[$city] = $fullRawData;	
		}

		$chartData = $this->refactorApiDataForHighChart($cityRawData);
		return $chartData;
    }
    
    public function returnCityIndexForCharts()
    {
		$cityIndex = ['Birmingham','Manchester','Leeds','Nottingham','Bristol'];
		return $cityIndex;
	}
	
	    /**
     * @param array $groupedApiData
     */
    public function refactorApiDataForHighChart(array $groupedApiData)
    {
		$refactoredData = [];
		
		foreach ($groupedApiData as $city => $cityData) {
			$totalRentPrice = 0;
			$i = 0;
				
			foreach ($cityData['listing'] as $listing) {
				$totalRentPrice += $listing['price'];
				$i++;
			}
			
			$refactoredDataColumn = $totalRentPrice / $i;
			$refactoredData[] = $refactoredDataColumn;
			unset($refactoredDataColumn);
		}
		
		return $refactoredData;
	}
}
