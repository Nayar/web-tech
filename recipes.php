<?php
/**
 * Authors: JOOLFOO Nayar (1118369) 
 *          DILJORE Humeira (1110539)
 *          GAUZEE Basheera (1115178)
 */

require "inc/core.php";

// See if listing is to be done usign category
if(isset($_GET['cat_id'])) {
	$recipes = $Recipes->get_multiple("WHERE recipes.cat_id = '{$_GET['cat_id']}'");	
}

// Or name
elseif(isset($_GET['name'])) {
	$recipes = $Recipes->get_multiple("WHERE recipes.name LIKE '%{$_GET['name']}%'");
}

elseif(isset($_GET['geniuscook'])) {
	
	foreach($_POST['ingredient'] as $key=>$value){
		if($value == '') {
			unset($_POST['ingredient'][$key]);
		}
	}
	
	// We get a string in which the ingredient names are separated by commas
	$ingredients = implode('%" OR ingredients.ingr_name LIKE "%',$_POST['ingredient']);
	
	// Need to rework Query <------------------------------------------------
	$recipes = $Recipes->get_multiple('WHERE recipes.recipe_id IN 
	(
		SELECT recipe_id
		FROM recipes_ingr_qty 
		LEFT JOIN ingredients on recipes_ingr_qty.ingr_id = ingredients.ingr_id
		WHERE ingredients.ingr_name LIKE "%'.$ingredients.'%"
		GROUP BY recipe_id
		HAVING count(ingredients.ingr_id) >= 2
		ORDER BY count(ingredients.ingr_id) DESC
	)');
}

// Else we display all the recipes in chronological order
else {
	$recipes = $Recipes->get_multiple("ORDER BY timeposted DESC");
}

$recipelist = "";
foreach($recipes as $recipe) {
	eval("\$recipelist .= \"".$templates->simple_get("gallery_recipe")."\";");
}
if($recipelist == "") {
	$recipelist = "No recipe found as per your search";
}

eval("\$contents = \"".$templates->get_page("gallery_page")."\";");
eval("\$headerincludes = \"".$headerincludes."\";");

$templates->output_page($contents);
?>