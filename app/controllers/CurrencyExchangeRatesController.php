<?php

/**
 * This class is used to fetch currency exchange details from third part api
 * Caches the response for two minutes to avoid multiple request to Api
 *
 * @CurrencyExchangeRates(true)
 */

use Phalcon\Mvc\Controller;
use Currency\Webservices\RestfulServices;
use Phalcon\Mvc\View;
use Phalcon\Assets\Exception;
use Phalcon\Cache\Cache;
use Phalcon\Cache\AdapterFactory;
use Phalcon\Storage\SerializerFactory;

class CurrencyExchangeRatesController extends Controller
{

 /**
 * This method displays the currency rate information to the user.
 *
 * @SpecialFeature
 */
  public function displayExchangeRatesAction()
  {
      $this->assets->addJs('/public/js/jquery-min.js');
      $this->assets->addJs('/public/js/currency_exchange.js');
      $this->assets->addCss('/public/css/exchange_rates.css');
      $this->view->setVar('page_title', 'Currency Exchange Rates');
  }

 /**
 * This method fetches the currency rate information from the api 
 * and stores the deta in cache for improved performance.
 *
 * @SpecialFeature
 */
  public function getExchangeRatesAction()
  {
      $serializerFactory = new SerializerFactory();
      $adapterFactory    = new AdapterFactory($serializerFactory);

      $options = [
        'defaultSerializer' => 'Json',
        'lifetime'          => 7200
      ];

      $adapter = $adapterFactory->newInstance('apcu', $options);

      $cache = new Cache($adapter);

      $mCurrencyDetails = $cache->get('currency_details');

      if ($mCurrencyDetails) {
        return $mCurrencyDetails;
      }else{
        $url = "https://api.apilayer.com/fixer/latest?base=USD&symbols=EUR,GBP,INR,AED,AFN&apikey=5Q9x610GiLX9TGv4UWDhzzb1EX9sWPFS";
        $restService = new RestfulServices();
        $currency_details = $restService->makeApiRequest($url);
        $cache->set('currency_details', $currency_details, 120);
        return $currency_details;
      }
  }
}