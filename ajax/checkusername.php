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
 
require "../inc/core.php";

$results = $db->query("SELECT user_id FROM users WHERE username = '{$_GET['username']}'");
$count = mysql_num_rows($results);
if ($count > 0) {
	echo '<img src="theme/invalid.gif"/> Username Exists in database';
}
else {
	echo '<img src="theme/valid.gif"/> Valid Username';
}
?>