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
 
define("ROOTDIR",dirname(dirname(__FILE__))."/");
define("ROOTURL","http://".$_SERVER['SERVER_NAME']."/".basename(dirname(dirname(__FILE__)))."/");

// Include database class
require ROOTDIR.'inc/class_db.php';

// Initialise a MySQL class from class_db.php
$db = new MySQL();

// We write the queries for creating users table
$db->query("CREATE TABLE recipes_ingr_qty
(
recipe_id int(5),
ingr_id int(5),
ingr_qty varchar(30),
PRIMARY KEY(recipe_id,ingr_id)
)
");

$db->query("CREATE TABLE recipes
(
recipe_id int(5) AUTO_INCREMENT,
name varchar(25),
method text,
description text,
duration_prep int(4),
duration_cook int(4),
servings int(10),
views int(4),
cat_id int (4),
user_id int(4),
timeposted int(10),
PRIMARY KEY(recipe_id)
)
");
$db->query("CREATE TABLE ingredients
(
ingr_id int(5) AUTO_INCREMENT,
ingr_name varchar(75),
PRIMARY KEY(ingr_id)
)
");
$db->query("CREATE TABLE commments
(recipe_id int(5),
comment_id int(5),
user_id int(5),
content text,
PRIMARY KEY(comment_id)
)
");

$db->query("CREATE TABLE users
(user_id int(5) AUTO_INCREMENT,
username varchar(30),
password varchar(120),
email varchar(50),
is_admin tinyint(1),
PRIMARY KEY(user_id)
)
");

$db->query("CREATE TABLE categories
(cat_id int(5) AUTO_INCREMENT,
cat_name varchar (30),
PRIMARY KEY (cat_id)
)
");

// Put the categories in database
$cat = array(
	"cat_id" => 1,
	"cat_name" => "Main Dish"
	);
	
$db->insert("categories",$cat);

$cat = array(
	"cat_id" => 2,
	"cat_name" => "Soup"
	);
	
$db->insert("categories",$cat);

$cat = array(
	"cat_id" => 3,
	"cat_name" => "Dessert"
	);
$db->insert("categories",$cat);

$cat = array(
	"cat_id" => 4,
	"cat_name" => "Salad"
	);
$db->insert("categories",$cat);

$cat = array(
	"cat_id" => 5,
	"cat_name" => "Drink"
	);
$db->insert("categories",$cat);

$cat = array(
	"cat_id" => 6,
	"cat_name" => "Miscellaneous"
	);
$db->insert("categories",$cat);

require ROOTDIR.'inc/class_users.php';
$Users = new Users();

$defaultuser = array(
	"username" => "admin",
	"password" => "default",
	"email" => "admin@example.com",
	"is_admin" => 1,
);
$Users->register($defaultuser);

require ROOTDIR.'inc/class_recipes.php';
$Recipes = new Recipes();

require ROOTDIR.'inc/install_sample_recipes.php';

echo "Install completed. Return to <a href=\"".ROOTURL."index.php\">homepage</a>";
?>