<?php
/**
	Copyright 2012 by Nayar Joolfoo, Humeira Diljore & Basheerah Gauzee

	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, version 3 of the License.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
 
require "inc/core.php"; // All files in the project has to include the core.php file so as to be able to access the classes and objects easily.

$results = $db->query("SELECT * FROM recipes ORDER BY views DESC LIMIT 0,5"); //Getting list of top 5 recipes from database

$top5 = ''; // Create an empty variable
while($row = mysql_fetch_array($results)) { // For each row we have in the database, $row will take it's value in each loop
	$top5 .= '<li class="top5"><a href="'.ROOTURL.'showrecipe?recipe_id='.$row['recipe_id'].'">'.$row['name'].'</a></li> '; // We concatenate the $top5 each time to make a list if items in <li> tags to be placed in the index_page
}

$results = $db->query("SELECT * FROM categories"); // Selecting the categories from database
$categorylist = ""; // Creating empty variable to store items
while($listitem = mysql_fetch_array($results)){ // For each category in the database
	$categorylist .= '<li><a href="recipes.php?cat_id='.$listitem['cat_id'].'">'.$listitem['cat_name'].'</a></li>'; // We append a list item
}

// Write the codes for carousel slideshow to work
$imagesforcarousel = "";
$rows = $Recipes->get_multiple("ORDER BY timeposted DESC LIMIT 0,5"); // Select latest recipes
foreach($rows as $row){
	$imagesforcarousel .= '"./recipeimages/'.$row['recipe_id'].'.png","'.$row['link'].'",';
}

$imagesforcarousel = substr_replace($imagesforcarousel,"",-1); // Removing the trailing comma
eval("\$carouselslideshow = \"".$templates->simple_get("carouselslideshow")."\";"); // Eval the carousel slideshow template


$file = fopen("inc/recipeofday.txt","r"); // We will now try to get the recipe of day. It is cached in the file recipeofday.txt

$recipeofday['recipe_id'] = fgets($file); // Get the first line of the file i.e. recipe_id
$recipeofday['timeset'] = fgets($file); // Get the  second line i.e. time set
$difference = time() - $recipeofday['timeset']; // We calculate the difference between the time the recipe of the day was set and now in seconds

if($difference > (60*60*3600)) { // Check if more than 1 day has occured since last time set
	$recipeofday = $Recipes->get_single("WHERE recipes.recipe_id != {$recipeofday['recipe_id']} ORDER BY rand() LIMIT 1"); // Fetch a random recipe which is not same as the current one
	$file = fopen("inc/recipeofday.txt","w"); // We open the file in write mode
	fwrite($file,"{$recipeofday['recipe_id']}\n".time()); // We set the new recipe_id and timeset in the file
}
fclose($file); // We close the file

$recipeofday = $Recipes->get_single("WHERE recipes.recipe_id = {$recipeofday['recipe_id']}"); // We fetch the recipe details using the recipe_id we got above into $recipeofday

eval("\$contents = \"".$templates->get_page("index_page")."\";"); // We get the index_page and replace the variables in the body section the values we calculated above.
eval("\$headerincludes = \"".$headerincludes."\";"); // We also eval the variables we used in the head section of the index_page.

$templates->output_page($contents); // We output the page using the master_page we created
?>
