<?php
/**
 * Authors: JOOLFOO Nayar (1118369) 
 *          DILJORE Humeira (1110539)
 *          GAUZEE Basheera (1115178)
 */
 
class Recipes {
	
	function add($recipe,$ingredients) {
		global $db,$Users;
		$recipe_plus = array(
			"views" => 1,
			"user_id" => $Users->current['user_id'],
			"timeposted" => time()
			);
		$recipe = array_merge($recipe,$recipe_plus);
		$db->insert("recipes",$recipe);
		
		$result = $db->query("SELECT recipe_id FROM recipes ORDER BY recipe_id DESC LIMIT 0,1");
		$recipe = mysql_fetch_array($result);
		
		foreach($ingredients as $ingredient => $amount) {
			if ($ingredient != '') {
				$result = $db->query("SELECT ingr_id FROM ingredients WHERE ingr_name = '{$ingredient}'");
				$ingredientid = mysql_fetch_array($result);
				if(!$ingredientid) {
					$newingredient = array("ingr_name"=> $ingredient);
					$db->insert("ingredients",$newingredient);
					$result = $db->query("SELECT ingr_id FROM ingredients WHERE ingr_name = '{$ingredient}'");
					$ingredientid = mysql_fetch_array($result);
				}
				
				$data = array(
					"ingr_id" => $ingredientid['ingr_id'],
					"ingr_qty"=> $amount,
					"recipe_id" => $recipe['recipe_id']
				);
				$db->insert("recipes_ingr_qty",$data);
			}
		}
		return $recipe;
	}
	
	function delete($recipe_id) {
		$db->query("DELETE FROM recipes WHERE recipe_id = '{$recipe_id}'");
		$db->query("DELETE FROM recipes_ingr_qty WHERE recipe_id = '{$recipe_id}'");
	}
	
	function get_single($arguments) {
		$recipes = $this->get_multiple($arguments);
		return $recipes[0];
	}
	
	function get_multiple($arguments) {
		global $db;
		$results = $db->query("
			SELECT * FROM recipes 
			LEFT JOIN categories ON recipes.cat_id = categories.cat_id 
			{$arguments}");
		$recipes = array();
		while($recipe = mysql_fetch_array($results)) {
			$recipes[] = $this->build_derived_attributes($recipe);
		}
		return $recipes;
	}
	
	function build_derived_attributes($recipe) {
		global $db;
	
		$results = $db->query("
			SELECT recipes_ingr_qty.ingr_id,ingr_name,ingr_qty 
			FROM recipes_ingr_qty
			LEFT JOIN ingredients
			ON recipes_ingr_qty.ingr_id = ingredients.ingr_id
			WHERE recipes_ingr_qty.recipe_id = '{$recipe['recipe_id']}'");
		
		$ingredients = array();
		while ($row = mysql_fetch_array($results)) {
			$ingredients[] = $row;
		}
		
		$recipe['ingredients'] = $ingredients;
		
		if($recipe['duration_prep'] > 60) {
			$hours = 1;
			$mins = $recipe['duration_prep']- 60;
		}
		$recipe['link'] = ROOTURL."showrecipe.php?recipe_id=".$recipe['recipe_id'];
		$recipe['imagelink'] = ROOTURL."./recipeimages/{$recipe['recipe_id']}.png";
		return $recipe;
	}
}
?>
	