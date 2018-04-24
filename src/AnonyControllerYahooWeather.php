<?php 
namespace YahooWeather\Weather;

use App\Http\Controllers\Controller;

class AnonyControllerYahooWeather extends Controller{

 
	 public static function Country($country,$lang,$query=null)
	 {
	 	$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
	    $yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$country.', '.$lang.'")  and u="c"';
	    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
	    // Make call with cURL
	    $session = curl_init($yql_query_url);
	    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
	    $json = curl_exec($session);
	     $phpObj =  json_decode($json);
	    // Convert JSON to PHP object
	   // get image status with preg_match //
                $string = $phpObj->query->results->channel->item->description;//'<img border="0" src="/images/image.jpg" alt="Image" width="100" height="100" />';
                preg_match('/<img(.*)src(.*)=(.*)"(.*)"/U', $string, $result);
                $image = array_pop($result);
             // get image status with preg_match //

      
         $high = $phpObj->query->results->channel->item->forecast[0]->high;
         $low  = $phpObj->query->results->channel->item->forecast[0]->low;
         $description = strip_tags($phpObj->query->results->channel->item->description);
         $description = str_replace('Full Forecast at Yahoo! Weather','',$description);
         $description = str_replace('provided by The Weather Channel','',$description);
         $description = str_replace(')','',$description);
         $description = str_replace('(','',$description);
         $description = str_replace(']]>','',$description);

         return ['high'=>$high,'low'=>$low,'image'=>$image,'name'=>$country,'description'=>$description];

	 } 


	 public static function YQL($query)
	 {
	 	$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
	    $yql_query = $query;
	    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
	    // Make call with cURL
	    $session = curl_init($yql_query_url);
	    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
	    $json = curl_exec($session);
	     $phpObj =  json_decode($json);
	    // Convert JSON to PHP object
	   // get image status with preg_match //
                $string = $phpObj->query->results->channel->item->description;//'<img border="0" src="/images/image.jpg" alt="Image" width="100" height="100" />';
                preg_match('/<img(.*)src(.*)=(.*)"(.*)"/U', $string, $result);
                $image = array_pop($result);
             // get image status with preg_match //

         $high = $phpObj->query->results->channel->item->forecast[0]->high;
         $low  = $phpObj->query->results->channel->item->forecast[0]->low;
         $description = strip_tags($phpObj->query->results->channel->item->description);
         $description = str_replace('Full Forecast at Yahoo! Weather','',$description);
         $description = str_replace('provided by The Weather Channel','',$description);
         $description = str_replace(')','',$description);
         $description = str_replace('(','',$description);
         $description = str_replace(']]>','',$description);

         return ['high'=>$high,'low'=>$low,'image'=>$image,'name'=>$country,'description'=>$description,'results'=>$phpObj->query->results];

	 } 
	
         public static function raw_query($query){
                $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
                $yql_query = $query;
                $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
                            // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            $phpObj =  json_decode($json);
            return $phpObj;
         }
}
