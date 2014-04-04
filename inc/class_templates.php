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
 */
 
class Templates {
	public $elements = array();
		
	function get($name,$ispage = false) { // DO NOT USE!!! To be depreciated in the future. Use simple_get and get_page instead
		if(!$ispage) {
			$template = $this->simple_get($name);
			return $template;
		}
		return $this->get_page($name);	
	}
	
	function simple_get($name) {
		$template = file_get_contents(ROOTDIR.'theme/'.$name.'.html');
		$template = str_replace('"','\"',$template);
		return $template;
	}
	
	function get_page($template) { // In future contents will be global.
		global $headerincludes;
		//global $contents;
		
		$template = $this->simple_get($template);
		$var = explode("<body>",$template);
		
		$var[0] = str_replace("<html>", "", $var[0]);
		$var[0] = str_replace("<head>", "", $var[0]);
		$var[0] = str_replace("</head>", "", $var[0]);
		
		$var[1] = str_replace("</body>", "", $var[1]);
		$var[1] = str_replace("</html>", "", $var[1]);
		
		$var[0] = trim($var[0]);
		$var[1] = trim($var[1]);		
		
		//$var[0] = str_replace('"','\"',$var[0]);
		$headerincludes = $var[0];
		//$contents = $var[1];
		
		//$var[1] = str_replace('"','\"',$var[1]);
		return $var[1];
	}
	
	// For outputting pages using the masterpage 
	function output_page($data) {
		global $headerincludes,$templates,$Users;
		
		$contents = $data;
		// Replacing the variables in masterpage by data
		eval("\$page = \"".$this->get("masterpage")."\";");
		
		// Finally displaying the page in the browser
		echo $page;
	}
}
?>
