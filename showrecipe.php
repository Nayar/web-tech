<?php
/**
 * Authors: JOOLFOO Nayar (1118369) 
 *          DILJORE Humeira (1110539)
 *          GAUZEE Basheera (1115178)
 */
 
// All the magics are stored in this file :P
require "inc/core.php";

if(!isset($_GET['recipe_id'])) { // Check if a recipe_id is set in url
	$contents = "No recipe selected"; // Set error message
	$templates->output_page($contents); // Display page
	die(); // Die to prevent further execution of codes below
}

$recipe = $Recipes->get_single("WHERE recipes.recipe_id = {$_GET['recipe_id']}"); // We fetch the recipe where the recipe_id matches the one got in url

$db->query("UPDATE recipes SET views = views + 1 WHERE recipe_id = '{$_GET['recipe_id']}'"); // Each time the page is viewed, we update the view count

$ingredients = '<ul>'; // We need to build an HTML list

foreach($recipe['ingredients'] as $ingredient) { // we loop foreach ingredient of the recipe
	$ingredients .= "<li><span class=\"ingredient_name\">{$ingredient['ingr_name']}</span> : {$ingredient['ingr_qty']}</li>"; // We concatenate the <li> in $ingredients
}
$ingredients .= "</ul>"; // We concatenate the close unordered HTML list tag

eval("\$contents = \"".$templates->get_page("showrecipe_page")."\";"); // We replace the the variables in showrecipe_page with the values calculated above
eval("\$headerincludes = \"".$headerincludes."\";"); // We evaluate the head section so as to put the recipe name in the title

$templates->output_page($contents); // We call the master page again
?>
 
