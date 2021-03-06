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
	$sql = "SELECT STAFF_ID, STAFF_FIRSTNAME, STAFF_LASTNAME, STAFF_LOCATION, STAFF_EMAIL FROM STAFF";
	$result = mysqli_query($CON, $sql);
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["STAFF_ID"].'</td>
				<td>'.$row["STAFF_FIRSTNAME"].'</td>
				<td>'.$row["STAFF_LASTNAME"].'</td>
				<td>'.$row["STAFF_LOCATION"].'</td>
				<td>'.$row["STAFF_EMAIL"].'</td>
			</tr>
		';
	}
	return $output;
}
if(isset($_POST['STAFF_PDF']))
{
	require_once('../TCPDF/tcpdf.php');
	$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$obj_pdf->SetCreator(PDF_CREATOR);
	$obj_pdf->SetTitle("Staff List");
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
	<h4>Staff List</h4>
	<table border="1" cellspacing="0" cellpadding="3">
		<tr>
			<th>Staff ID</th>
			<th>Staff First Name</th>
			<th>Staff Last Name</th>
			<th>Staff Location</th>
			<th>Staff Email</th>
		</tr>
	';
	$content .= fetch_data();
	$content .= '</table>';
	$obj_pdf->writeHTML($content);
	$obj_pdf->Output('file.pdf', 'I');
}

?>
