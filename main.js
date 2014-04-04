/**
 * Authors: JOOLFOO Nayar (1118369) 
 *          DILJORE Humeira (1110539)
 *          GAUZEE Basheera (1115178)
 */

function validateregistrationdata () {
	var username = document.forms["register_form"]["username"].value;
	var email = document.forms["register_form"]["email"].value;
	var email1 = document.forms["register_form"]["email1"].value;
	var password = document.forms["register_form"]["password"].value;
	var password1 = document.forms["register_form"]["password1"].value;
	var allow = true;
	if(!checkusername(username)) {
		document.getElementById("is_valid_username").innerHTML = '<img src="theme/invalid.gif"/> Invalid Username';
		alert("Usernames must be alphanumeric between 5 - 20 characters");
		allow = false;
	}
	if(email != email1) {
		alert("Email do not match");
		allow = false;
	}
	if(password != password1) {
		alert("Passwords do not match");
		allow = false;
	}
	return allow;
}

function validateloginform () {
	var username = document.forms["login_form"]["username"].value;
	if(!checkusername(username)) {
		alert("Usernames must be alphanumeric between 5 - 20 characters");
		return false;
	}
	return true;
}

function checkusername(name) {
	var filter = /^[a-zA-Z0-9|_]{5,20}$/
	if(!filter.test(name)) {
		document.getElementById("is_valid_username").innerHTML = '<img src="theme/invalid.gif"/> Invalid Username';
		return false;
	}
	else {
		document.getElementById("is_valid_username").innerHTML = '<img src="theme/valid.gif"/> Valid Username';
		return true;
	}
}

function checkusernameexist(name) {
	var exist;
	exist = checkusername(name);
	if (exist == true) {
		var ajax;
		ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function () {
		if (ajax.readyState == 4 && ajax.status == 200) {
				document.getElementById("is_valid_username").innerHTML= ajax.responseText;
				return true;
			}
		}
		ajax.open("GET","ajax/checkusername.php?username="+name,true);
		ajax.send();
	}
	else {
		document.getElementById("is_valid_username").innerHTML = '<img src="theme/invalid.gif"/> Invalid Username';
		return false;
	}
}



function checkfieldmatch(f1,f2,errordiv)
{
	var f1_data = document.forms["register_form"][f1].value;
	var f2_data = document.forms["register_form"][f2].value;
	if(f1_data != f2_data) {
		document.getElementById(errordiv).innerHTML = '<img src="theme/invalid.gif"/> Fields do not match';
		return;
	}
	document.getElementById(errordiv).innerHTML = "<img src=\"theme/valid.gif\"/> Fields Match";
	return;
}

/*function getmoreingrtable() {
	document.getElementById("moreing").innerHTML = document.getElementById("moreing").innerHTML+'<input type="text" name="ing[]" /><br />';
	document.getElementById("moreqty").innerHTML = document.getElementById("moreqty").innerHTML+'<input type="text" name="qty[]" /><br />';
}*/

function getmoreingrtable() {
            var table = document.getElementById("addrecipetable");
 
            var rowCount = table.rows.length;
            //var row = table.insertRow(rowCount);
	    var row = table.insertRow(rowCount - 5);
 
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "text";
	    element1.name = "ing[]";
            cell1.appendChild(element1);
 
            var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
            element2.type = "text";
	    element2.name = "qty[]";
            cell2.appendChild(element2);
}