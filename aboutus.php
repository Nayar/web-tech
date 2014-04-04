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
 
// We include all the main classes and functions into this file.
require "inc/core.php";

// All the contents to be displayed should be written in the variable $contents
eval("\$contents = \"".$templates->get_page("aboutus_page")."\";");
eval("\$headerincludes = \"".$headerincludes."\";");

$templates->output_page($contents);
?>
