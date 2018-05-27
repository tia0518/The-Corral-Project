<?php
session_start();

if ( $_SESSION['STAFF_ID'] != 1) {
	$_SESSION['message'] = "You mus log in before viewing this page";
	header("location: ../ACCESS/error");
	}
	else {
	$id = $_SESSION['STAFF_ID'];
	$staff_firstname = $_SESSION['STAFF_FIRSTNAME'];
	$staff_lastname = $_SESSION['STAFF_LASTNAME'];
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project Search</title>
<link rel="stylesheet" type="text/css" href="../STYLES/stylesstaff.css">

</style>

<script type="text/javascript">
function validate(search) {
	if(document.search.View.value == ""){
		alert("Please select a search value");
		return false
	}
	return true
}
</script>
</head>

<body>
<div class="Header">
	<h1>Corral</h1>
</div>

<div class ="navbar">
	<ul>
		<li><a href="../PAGES/STAFFHOME">Home</a></li>
		<li><a href ="#">Survey</a>
			<ul>
				<li><a href ="#">Projects</a>
					<ul>
						<li><a href ="../PROJECT/ADDPROJECT">Create Project</a></li>
						<li><a href ="../PROJECT/PROJECTLIST">Project List</a></li>
						<li><a href ="../PROJECT/PROJECTSEARCH">Project Search</a></li>
					</ul>
				</li>
				<li><a href ="#">Groups</a>
					<ul>
						<li><a href ="../PROJECT/NEWGROUP">Create Group</a></li>
						<li><a href ="../PROJECT/GROUPUPDATE">Update Group</a></li>
						<li><a href ="../PROJECT/GROUPLIST">List Groups</a>
						</li>
					</ul>
				</li>
				<li><a href ="#">Users</a>
					<ul>
						<li><a href ="../PROJECT/STUDENTLIST">Student List</a></li>
						<li><a href ="../PROJECT/STAFFLIST">Staff List</a></li>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<li><a href ="../PAGES/STAFFCONTACT">Contacts</a></li>
		<li><a href ="../PAGES/STAFFABOUTUS">About Us</a></li>
		<li><a href ="../ACCESS/stafflogout">Logout</a></li>
	</ul>
</div>

<h2>Project View</h2>
<form action="../PROJECT/SEARCHRESULTS" style="margin-left: 40px" method="post" name="search" id="search" onSubmit="return validate(search)">
	What are you searching for: <select name="View">
		<option value="">--Select--</option>
		<option value="student">Students</option>
		<option value="staff">Staff</option>
	</select><br><br>
	First name: <input type="text" name="FirstName" id="ip2"><br><br>
	Email: <input type="text" name="Email" id="ip2"><br><br>
	Location: <select name="Location">
		<option value="">--Select--</option>
		<option value="Burwood">Burwood</option>
		<option value="Geelong">Geelong</option>
		<option value="Cloud">Cloud</option>
	</select><br><br>
	<input type="submit" name="Submit" value="Submit">
	<input type="reset" value="Clear Search"><br><br>
</form>
<br><br>
<div class="Footer">
	<h4>© Copyright Deakin University & Group 29 2018</h4>
</div>
</body>
</html>