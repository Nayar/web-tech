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

// Begin the magic
require "inc/core.php";

// If no data was submitted, we display the registration form
if(!isset($_POST['submit'])){
	eval("\$contents = \"".$templates->get_page("login_page")."\";");
	eval("\$headerincludes = \"".$headerincludes."\";");
}
else {
	$sucess = $Users->login($_POST['username'],$_POST['password']);
	if($sucess){
		header('Location: '.ROOTURL.'index.php');
	}
	else {
		header('Location: '.ROOTURL.'login.php');
	}
}

$templates->output_page($contents);
?>
 