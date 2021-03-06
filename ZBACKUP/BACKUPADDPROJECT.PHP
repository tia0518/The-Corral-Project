<?php
session_start();
REQUIRE('../DATABASE/CONNECTDB.PHP');

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

<title>Add Project</title>
<link rel="stylesheet" type="text/css" href="../STYLES/stylesstaff.css">
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
						<li><a href ="../PROJECT/MEMBERSEARCH">Search For</a></li>
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


<div id="contents" >
<h2>Add New Project</h2>
<form method="post">
<p>Project Title &nbsp<br><input type="text" name="PROJECT_TITLE" id="ip2" required/></br></p>
<p>Project Leader &nbsp<br><input type="text" name="PROJECT_LEADER" id="ip2" required/></br></p>
<p>Leader Email &nbsp<br><input type="email" name="PROJECT_EMAIL" id="ip2" required/></br></p>
<p>Project Brief</br><textarea name="PROJECT_BRIEF" rows="5" cols="40" id="ip3" required></textarea></br></p>
<p>Project Status &nbsp</br></br><input type="radio" name="PROJECT_STATUS" value="Active"/>Active</br></br><input type="radio" name="PROJECT_STATUS" value="Inactive"/>Inactive</br></br><input type="radio" name="PROJECT_STATUS" value="Planning"/>Planning</br></br></p>

<p><input type="submit">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="reset" value="reset"></p>
</form>
<?php
if (isset($_POST['PROJECT_STATUS'])) {
	$PROJECTTITLE = MYSQLI_REAL_ESCAPE_STRING($CON, $_POST['PROJECT_TITLE']);
	$PROJECTBRIEF = MYSQLI_REAL_ESCAPE_STRING($CON, $_POST['PROJECT_BRIEF']);
	$PROJECTLEADER = MYSQLI_REAL_ESCAPE_STRING($CON, $_POST['PROJECT_LEADER']);
	$PROJECTEMAIL = MYSQLI_REAL_ESCAPE_STRING($CON, $_POST['PROJECT_EMAIL']);
	$PROJECTSTATUS = MYSQLI_REAL_ESCAPE_STRING($CON, $_POST['PROJECT_STATUS']);
	$sql_id = "SELECT PROJECT_TITLE FROM PROJECT WHERE PROJECT_TITLE = '$PROJECTTITLE'";
	$res_id = mysqli_query($CON, $sql_id);

	IF(mysqli_num_rows($res_id) > 0) {
		echo "<p style='margin-left: 35%;'>There is already a project with the typed title. Please try again</p>";
	}ELSE{
		$QUERY = "INSERT INTO PROJECT (PROJECT_TITLE, PROJECT_LEADER, PROJECT_EMAIL, PROJECT_BRIEF, PROJECT_STATUS) VALUES ('$PROJECTTITLE', '$PROJECTLEADER', '$PROJECTEMAIL', '$PROJECTBRIEF', '$PROJECTSTATUS')";
		$RESULT = MYSQLI_QUERY($CON, $QUERY);
		header('location: ../PROJECT/PROJECTPROCESS2');
	}
}
?>

</div>

<hr>
<div class="Footer">

	<h4>© Copyright Deakin University & Group 29 2018</h4>

</div>

</body>

</html>
