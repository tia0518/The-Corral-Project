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
function fetch_data()
{
require('../DATABASE/CONNECTDB.PHP');
	$output = "";
	$sql = "SELECT STUDENT_ID, STUDENT_FIRSTNAME, STUDENT_LASTNAME, STUDENT_LOCATION, STUDENT_EMAIL FROM STUDENT";
	$result = mysqli_query($CON, $sql);
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["STUDENT_ID"].'</td>
				<td>'.$row["STUDENT_FIRSTNAME"].'</td>
				<td>'.$row["STUDENT_LASTNAME"].'</td>
				<td>'.$row["STUDENT_LOCATION"].'</td>
				<td>'.$row["STUDENT_EMAIL"].'</td>
			</tr>
		';
	}
	return $output;
}
if(isset($_POST['STUDENT_PDF']))
{
	require_once('../TCPDF/tcpdf.php');
	$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$obj_pdf->SetCreator(PDF_CREATOR);
	$obj_pdf->SetTitle("Student List");
	$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
	$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	$obj_pdf->setDefaultMonospacedFont('helvetica');
	$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
	$obj_pdf->setPrintHeader(false);
	$obj_pdf->setPrintFooter(false);
	$obj_pdf->SetAutoPageBreak(TRUE, 10);
	$obj_pdf->SetFont('helvetica', '', 11);
	$obj_pdf->AddPage();
	$content = '';
	$content .= '
	<h4>Student List</h4>
	<table border="1" cellspacing="0" cellpadding="3">
		<tr>
			<th>Student ID</th>
			<th>Student First Name</th>
			<th>Student Last Name</th>
			<th>Student Location</th>
			<th>Student Email</th>
		</tr>
	';
	$content .= fetch_data();
	$content .= '</table>';
	$obj_pdf->writeHTML($content);
	$obj_pdf->Output('file.pdf', 'I');
}

?>
