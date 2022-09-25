<?php
 
 /**
 * This model class to handle curl operations for fetching details from Api.
 *
 * @SpecialFeature
 */
namespace Currency\Webservices;
use Phalcon\Mvc\Model;

class RestfulServices extends Model
{
 /**
 * This method handles the curl operations for API request.
 *
 * @SpecialFeature
 */
  public function makeApiRequest ($url) {
    $ch_session = curl_init();
    curl_setopt($ch_session, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch_session, CURLOPT_URL, $url);
    $result_url = curl_exec($ch_session);
    return $result_url;
  }
}