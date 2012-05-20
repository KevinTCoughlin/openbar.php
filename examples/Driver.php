<?php 
/** 	Driver for Openbar (BreweyDB API PHP Wrapper)
  * 	Current BreweryDB API Version = 2.0
  * 	
  * 	@author 	Kevin Coughlin <coughli6@tcnj.edu>
  * 	@link 		http://github.com/kevintcoughlin
  * 	@version 	1.0
  * 	@since 		5/19/12
  */
require '../src/Bartender.php'; 								// Require Bartender API Wrapper PHP File

$bartender = new Bartender(); 							// Instantiate Bartender Class Object
$bartender->key = "8ee7157b1943af01b6da922e58bab4c9"; 	// Set BreweryDB API Key

echo $bartender->status(); 								// Get status of BreweryDB API
echo "\n";

echo "Searching for Beer named Yuengling"; 				// Search for beer named yuengling
$array = $bartender->findBeer("Yuengling"); 			// Resulting JSON array of beers

// Iterate through beer search results
foreach ($array as $beer){
	echo "Name: ".$beer->name;
	echo "\n";
	echo "Description: ".$beer->description;
	echo "\n";
	echo "Icon: ".$beer->labels->icon;
	echo "\n";
}
echo "--------------------------------------------\n";
echo "Getting beer with ID: Ptumjo\n";
$beer = $bartender->getBeer("Ptumjo"); 					// Get specific beer by ID
	echo "Name: ".$beer->name;
	echo "\n";
	echo "Description: ".$beer->description;
	echo "\n";
?>