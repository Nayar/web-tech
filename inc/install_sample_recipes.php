<?php
/**
 * Authors: JOOLFOO Nayar (1118369) 
 *          DILJORE Humeira (1110539)
 *          GAUZEE Basheera (1115178)
 */
 
$recipe = array(
	"name" => "Chicken Biryani",
	"description" => "This is a delicious Pakistani/Indian rice dish which is often reserved for very special occasions such as weddings, parties, or holidays such as Ramadan. It has a lengthy preparation, but the work is definitely worth it. For biryani, always use long grain rice. Basmati rice with its thin, fine grains is the ideal variety to use. Ghee is butter that has been slowly melted so that the milk solids and golden liquid have been separated and can be used in place of vegetable oil to yield a more authentic taste.",
	"duration_cook" => 30,
	"duration_prep" => 45,
	"servings" => 7,
	"cat_id" => 1,
	"user_id" => 1,
	"method" => "1. In a large skillet, in 2 tablespoons vegetable oil (or ghee) fry potatoes until brown, drain and reserve the potatoes. Add remaining 
<br />
2 tablespoons oil to the skillet and fry onion, garlic and ginger until onion is soft and golden. Add chili, pepper, turmeric, cumin, salt and the tomatoes. Fry, stirring constantly for 5 minutes. Add yogurt, mint, cardamom and cinnamon stick. Cover and cook over low heat, stirring occasionally until the tomatoes are cooked to a pulp. It may be necessary to add a little hot water if the mixture becomes too dry and starts to stick to the pan.
<br />
3. When the mixture is thick and smooth, add the chicken pieces and stir well to coat them with the spice mixture. Cover and cook over very low heat until the chicken is tender, approximately 35 to 45 minutes. There should only be a little very thick gravy left when chicken is finished cooking. If necessary cook uncovered for a few minutes to reduce the gravy.
<br />
4. Wash rice well and drain in colander for at least 30 minutes.
<br />
5. In a large skillet, heat vegetable oil (or ghee) and fry the onions until they are golden. Add saffron, cardamom, cloves, cinnamon stick, ginger and rice. Stir continuously until the rice is coated with the spices.
<br />
6.In a medium-size pot, heat the chicken stock and salt. When the mixture is hot pour it over the rice and stir well. Add the chicken mixture and the potatoes; gently mix them into the rice. Bring to boil. Cover the saucepan tightly, turn heat to very low and steam for 20 minutes. Do not lift lid or stir while cooking. Spoon biryani onto a warm serving dish.",
);

$ingredients = array(
	"vegetable oil" => "4 tablespoons",
	"potatoes" => "4 small",
	"garlic" => "2 cloves",
	"ginger root" => "1 tablespoon",
	"chili powder" => "1/2 teaspoon",
	"ground black pepper" => "1/2 teaspoon",
	"ground turmeric" => "1/2 teaspoon",
	"ground cumin" => "1 teaspoon",
	"salt" => "1 teaspoon",
	"tomatoes" => "2 medium",
	"yogurt" => "2 tablespoon",
	"mint leaves" => "2 tablespoon",
	"ground cardamon" => "1/2 teaspoon",
	"cinnamon stick" => "1 (2 inch) piece",
	"chicken" => "3 pounds boneless",
	"onion" => "1 large",
	"saffron" => "1 pinch",
	"cardamom" => "5 pods",
	"cloves" => "5 whole",
	"rice" => "1 pound");

$Recipes->add($recipe,$ingredients); 


// recipe 2
$recipe = array(
	"name" => "Salsa Chicken Rice Casserole", 
	"description" => "Layers of rice, chicken breast, a creamy soup and salsa mixture and two kinds of cheese add up to a simply yummy salsa casserole! This recipe is a family favorite because it's delicious and easily made with ingredients found in the pantry.",
	"duration_cook" => 60,
	"duration_prep" => 20,
	"servings" => 8,
	"cat_id" => 1,
	"user_id" => 1,
	"method" => " 1.	Place rice and water in a saucepan, and bring to a boil. Reduce heat to low, cover, and simmer for 20 minutes.
	<br />
	2.	Meanwhile, place chicken breast halves into a large saucepan, and fill the pan with water. Bring to a boil, and cook for 20 minutes, or until done. Remove chicken from water. When cool enough to handle, cut meat into bite-size pieces.
	<br/>
	3.	Preheat oven to 350 degrees F (175 degrees C). Lightly grease a 9x13 inch baking dish.
	<br/>
	4.	In a medium bowl, combine Monterey Jack and Cheddar cheeses. In a separate bowl, mix together cream of chicken soup, cream of mushroom soup, onion, and salsa. Layer 1/2 of the rice, 1/2 of the chicken, 1/2 of the soup and salsa mixture, and 1/2 of the cheese mixture in prepared dish. Repeat layers, ending with cheese.
	<br/>
	5.	Bake in preheated oven for about 40 minutes, or until bubbly.",
);

$ingredients = array(
	// Copy the below line as many time you need to add more ingredients
	"uncooked white rice" => "1 1/3 cups",
	"water" => "2 2/3 cups",
	"skinless boneless chicken breast halves" => "4",
	"shredded Monterey Jack cheese" => "2 cups",
	"shredded Cheddar cheese" => "2 cups",
	"condensed cream of chicken soup" => "10 ounce",
	"condensed cream of mushroom soup" => "10 ounce",
	"onion chopped" => "1",
	"mild salsa" => "1 1/2 cups",
);

$Recipes->add($recipe,$ingredients); 

// recipe 3
$recipe = array(
	"name" => "Almond-Toppped Fish", // Insert the name of the recipe in between the quotes
	"description" => "This one is really good, specially with fish-picky people. The flavours melt right in to create a really classy dish that you do not want to miss. The flavour is outstanding",
	"duration_cook" => 20,
	"duration_prep" => 10,
	"servings" => 4,
	"cat_id" => 1,
	"user_id" => 1,
	"method" => "1.	Place butter in a 13-in. x 9-in. x 2-in. baking dish; place in a 400 degrees F oven until melted. 
	<br/>
	2. Spread butter over bottom of dish; cover with onion. Arrange fish over onion; sprinkle with salt, dill and pepper. 
	<br/>
	3.Combine the Parmesan cheese, mayonnaise, parsley and lemon juice; spread over fish. <br/>
	4. Bake, uncovered, at 400 degrees F for 18-20 minutes or until fish flakes easily with a fork. Sprinkle with almonds.",
);

$ingredients = array(
	// Copy the below line as many time you need to add more ingredients
	"butter" => "1 tablespoon",
	"small onion, thinly sliced" => "1",
	"fillets fresh or frozen cod" => "6 ounce",
	"seasoned salt" => "1 teaspoon",
	"dill weed" => "1/2 teaspoon",
	"pepper" => "1/4 teaspoon",
	"grated Parmesan cheese" => "1/4 cup",
	"fat-free mayonnaise" => "1/4 cup",
	"minced fresh parsley" => "1 tablespoon",
	"lemon juice" => "1 tablespoon",
	"sliced almonds, toasted" => "2 tablespoons",
);

$Recipes->add($recipe,$ingredients);
// recipe 4
$recipe = array(
	"name" => "Moroccan Lentil Soup", 
	"description" => "Thick, delicious and nutritious, especially in the winter!",
	"duration_cook" => 105,
	"duration_prep" => 20,
	"servings" => 6,
	"cat_id" => 2,
	"user_id" => 1,
	"method" => "1.	In large pot saute; the onions, garlic, and ginger in a little olive oil for about 5 minutes.
	<br />
2.	Add the water, lentils, chick peas, white kidney beans, diced tomatoes, carrots, celery, garam masala, cardamom, cayenne pepper and cumin. Bring to a boil for a few minutes then simmer for 1 to 1 1/2 hours or longer, until the lentils are soft.
<br />
3.	Puree half the soup in a food processor or blender. Return the pureed soup to the pot, stir and enjoy!",
);

$ingredients = array(
	// Copy the below line as many time you need to add more ingredients
	"onions, chopped" => "2",
	"cloves garlic, minced" => "2",
	"grated fresh ginger" => "1 teaspoon",
	"water" => "6 cups",
	"red lentils" => "1 cup",
	"garbanzo beans, drained" => "15 ounce",
	"canellini beans" => " 19 ounce",
	"diced tomatoes" => "14.5 ounce",
	"diced carrots" => "1/2 cup",
	"chopped celery" => "1/2 cup",
	"garam masala" => "1 teaspoon",
	"ground cardamom" => "1 1/2 teaspoon",
	"ground cayenne pepper" => "1/2 teaspoon",
	"ground cumin" => "1/2 teaspoon",
	"olive oil" => "1 tablespoon",
);

$Recipes->add($recipe,$ingredients);
// recipe 5
$recipe = array(
	"name" => "Toasted Waffle Ice Cream Sandwich", 
	"description" => "Super easy, endless combinations...a twist on the waffle cone, this sandwich has the hot-cold appeal of a la mode desserts. Napkins recommended!",
	"duration_cook" => 0 ,
	"duration_prep" => 5,
	"servings" => 1,
	"cat_id" => 3,
	"user_id" => 1,
	"method" => "1.	Toast the frozen waffle, immediately spread with butter and cut the waffle in half. 
	<br />
	2. Place a scoop of ice cream on one half of the waffle, distributing evenly. 
	<br />
	3. Drizzle the ice cream with maple syrup; top the ice cream with the other half of the waffle and gently press to seal the sandwich.",
);

$ingredients = array(
	// Copy the below line as many time you need to add more ingredients
	"frozen waffle" => "1",
	"vanilla ice cream, softened" => "1 scoop",
	"maple syrup" => "1 tablespoon",
	"butter" => "1/2 tablespoon",
);

$Recipes->add($recipe,$ingredients);
// recipe 6
$recipe = array(
	"name" => "Three-Berry Lemon Trifle", 
	"description" => "Wonderful summer dessert! So light and tasty. Very easy to make. A nice twist on a strawberry shortcake-type dessert",
	"duration_cook" => 0,
	"duration_prep" => 25,
	"servings" => 8,
	"cat_id" => 3,
	"user_id" => 1,
	"method" => " 1.	In a large bowl, combine the milk, yogurt, lemon juice and peel. Fold in 2 cups whipped topping.
	<br />
2.	In a 3-qt. trifle bowl or deep salad bowl, layer a third of the cake cubes, a third of the lemon mixture and all of the strawberries. Repeat cake and lemon mixture layers. Top with blueberries and remaining cake cubes and lemon mixture. Sprinkle with raspberries.
<br />
3.	Spread remaining whipped topping over berries; sprinkle with almonds. Cover and refrigerate for at least 8 hours.",
);

$ingredients = array(
	// Copy the below line as many time you need to add more ingredients
	"fat free sweetened condensed milk" => "7ounce",
	"non-fat reduced sugar lemon yogurt" => "4ounce",
	"lemon juice" => "1/2 cup",
	"grated lemon peel" => "1 teaspoon",
	"reduced-fat whipped topping, thawed, divided" => "4ounce",
	"angel food cake mix, prepared and cut into 1-inch cubes" => "8ounce ",
	"sliced fresh strawberries" => "1/2 cup",
	"sliced fresh blueberries" => "1/2 cup",
	"fresh raspberries" => "1/2 cup",
	"slivered almonds, toasted" => "1 tablespoon",
);

$Recipes->add($recipe,$ingredients);
// recipe 7
$recipe = array(
	"name" => "Chocolate Mint Milkshake", 
	"description" => "A cool, refreshing milkshake that will have you craving for more. All you need is milk, vanilla ice cream, chocolate syrup, and a few drops of some peppermint extract.",
	"duration_cook" => 0,
	"duration_prep" => 5,
	"servings" => 2,
	"cat_id" => 5,
	"user_id" => 1,
	"method" => "1.	In a blender, combine ice cream, milk, chocolate syrup and peppermint extract. 
	<br />
	2.Blend until smooth. Pour into glasses and serve.",
);

$ingredients = array(
	// Copy the below line as many time you need to add more ingredients
	"vanilla ice cream" => "4 scoops",
	"milk" => "1/4 cup",
	"chocolate syrup" => "1/4 cup",
	"peppermint extract" => "1 drop",
);
$Recipes->add($recipe,$ingredients);
?>