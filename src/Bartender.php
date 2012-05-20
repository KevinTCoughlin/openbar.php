<?php
/** 	PHP Wrapper for BreweryDB API
  * 	Current BreweryDB API Version = 2.0
  * 	
  * 	@author 	Kevin Coughlin <coughli6@tcnj.edu>
  * 	@link 		http://github.com/kevintcoughlin
  * 	@version 	1.0
  * 	@since 		5/19/12
  */
class Bartender
{
    /** 
    * 	API Key public variable
    */
    public $key = "";
    /** 
    * 	API HTTP endpoint (Currently version 2.0)
    */
    public $endpoint = "http://api.brewerydb.com/v2/";

    /** 
    * 	Check status of BreweryDB API
    */
    public function status(){
    	$url = $this->endpoint."heartbeat?key=".$this->key;
    	$json = file_get_contents($url);
    	$json_output = json_decode($json);
    	$status = $json_output->{'status'};
	    	if($status == "success"){
	    		$result = "BreweryDB API is available.";
	    	}
	    	else{
	    		$result = "BreweryDB API is not available.";
	    	}
		return $result;
    }
    /** 
    * 	Get beer based on ID string
    */
    public function getBeer($id){
    	$url = $this->endpoint."beer/".$id."?key=".$this->key."&format=json";
    	$json = file_get_contents($url);
    	$json_output = json_decode($json);
    		return ($json_output->{'data'});
    }
    /** 
    * 	Get brewery based on ID string
    */
    public function getBrewery($id){
    	$url = $this->endpoint."beer/".$id."?key=".$this->key."&format=json";
    	$json = file_get_contents($url);
    	$json_output = json_decode($json);
    		return ($json_output->{'data'});
    }
    /** 
    * 	Search for beer based on name string
    */
    public function findBeer($name){
    	$url = $this->endpoint."search?q=".$name."&key=".$this->key."&format=json&type=beer";
    	$json = file_get_contents($url);
    	$json_output = json_decode($json);
    		return ($json_output->{'data'});
    }
    /** 
    * 	Search for brewery based on name string
    */
    public function findBrewery($name){
    	$url = $this->endpoint."search?q=".$name."&key=".$this->key."&format=json&type=brewery";
    	$json = file_get_contents($url);
    	$json_output = json_decode($json);
    		return ($json_output->{'data'});
    }
}
?>