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
 
require "inc/core.php";

if(isset($_POST['recipename'])) {
	$newrecipe = array(
		"name" => isset($_POST['recipename']),
		"method" => isset($_POST['method']),
		"description" => isset($_POST['description']),
		"duration_prep" => isset($_POST['duration_prep']),
		"duration_cook" => isset($_POST['duration_cook']),
		"servings" => isset($_POST['servings']),
		"cat_id" => isset($_POST['cat_id']),
	);
	
	$ingredientname = isset($_POST['ing']);
	$ingredientamt = isset($_POST['qty']);
	
	$i = 0;
	$ingredients = array();
	foreach($ingredientname as $ingredient) {
		$ingredients[$ingredient] = $ingredientamt[$i];
		$i++;
	}
	
	$recipe = $Recipes->add($newrecipe,$ingredients);
	
	// Store the image
	$uploadedimage = move_uploaded_file($_FILES["recipeimage"]["tmp_name"],ROOTDIR."recipeimages/".$recipe['recipe_id'].".png");
	if (!$uploadedimage) {
		//die($_FILES["recipeimage"]["tmp_name"]."No image");
	}
	header('Location: '.ROOTURL.'showrecipe.php?recipe_id='.$recipe['recipe_id'].'');
	die();
}

if($Users->current['is_admin'] == 0) {
	$contents = "Non-admins cannot add a recipe";
}
else {
	eval("\$contents = \"".$templates->get_page("addrecipe_page")."\";");
	eval("\$headerincludes = \"".$headerincludes."\";");
}
$templates->output_page($contents);
?> 
