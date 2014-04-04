<?php
/**
	Copyright 2012 by Nayar Joolfoo

	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, version 3 of the License.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

 *  File Description: 
 *	This is where all the magic starts. We include all the classes and initialise them.
 *	We write codes which are supposed to run globally on all pages here.
 */
 
session_start(); // We start a PHP session to store temporary info about the user

// Define some constants which can be used inside any classes/functions without the need to globalise them
define("ROOTDIR",dirname(dirname(__FILE__))."/");
define("ROOTURL","http://".$_SERVER['SERVER_NAME']."/".basename(dirname(dirname(__FILE__)))."/");

require ROOTDIR."inc/class_db.php"; // Include MySQL class file
$db = new MysQL(); // Initialising the MySQL class in object $db

require ROOTDIR."inc/class_users.php";
$Users = new Users(); // Initialise Users

require ROOTDIR."inc/class_recipes.php";
$Recipes = new Recipes(); // Initialise Recipes

require ROOTDIR."inc/class_templates.php";
$templates = new Templates(); // Initialise Templates

if($Users->current['user_id'] > 0) { // See if current user is logged in.
	// We set attribute elements['welcome_user'] in templates so as it replaces the variable in the master_page where this is required
	$templates->elements['welcome_user'] = 'Welcome '.$Users->current['username'].'. <a href="logout.php">logout</a>'; // Welcome the user message
}
else {
	$templates->elements['welcome_user'] = 'Hello Guest, please <a href="login.php">login</a> or <a href="register.php">register</a>'; // Ask to login message
}

if($Users->current['is_admin'] == 1) { // Check if user is admin
	$templates->elements['add_recipe_link'] = '<li><a href="addrecipe.php">Add recipe</a></li>'; // Display a link to add recipe page
}
else {
	$templates->elements['add_recipe_link'] = ''; // Else show blank
}
?>