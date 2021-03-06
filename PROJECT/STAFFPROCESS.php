<?php
session_start();
if ( $_SESSION['STAFF_ID'] != 1) {
	$_SESSION['message'] = "You must log in before viewing this page";
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

<title>Staff Update</title>
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



<div id="contents">

  <h2>Updated staff information</h2>
	<?php
 require("../DATABASE/CONNECTDB.php");


		$number=$_POST['STAFF_ID'];
		$firstname=$_POST['STAFF_FIRSTNAME'];
		$lastname=$_POST['STAFF_LASTNAME'];
		$location=$_POST['STAFF_LOCATION'];
		$email=$_POST['STAFF_EMAIL'];

		if(empty($location)){
				echo "<p>you need to input location</p>";
			}else if(empty($email)){
				echo "<p>You need to input email</p>";
			}else if(empty($firstname)){
				echo "<p>You need to input firstname</p>";
			}else if(empty($lastname)){
				echo "<p>You need to input lastname</p>";
			}else{



	        $sql="UPDATE STAFF SET STAFF_LOCATION='$location',STAFF_EMAIL='$email',STAFF_FIRSTNAME='$firstname',STAFF_LASTNAME='$lastname' WHERE STAFF_ID=$number";

	        $b=mysqli_query($CON,$sql);

	         if(!$b){
	                echo "<p>Failed to update information</p>";
	          }else{
	                if(mysqli_affected_rows($CON)>0){
	                    echo "<p>Information successfully updated</p>";
	                    echo "<p><a href='STAFFLIST.PHP'>Back to staff list</a></p>";
	                }else{
	                    return "<p>Rows not affected</p>";
	                }
	            }

	        mysqli_close($CON);
	    }

	?>


<hr>

<div class="Footer">

	<h4>© Copyright Deakin University & Group 29 2018</h4>

</div>

</body>

</html>
