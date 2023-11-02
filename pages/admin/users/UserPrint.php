<?php
include_once '../../../configs/database.php';
include_once '../../../configs/fpdf186/fpdf.php';

// Create a new FPDF instance
$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(0, 10, 'User Details Report', 0, 1, 'C');
$pdf->Ln(10);

// Table Headers
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'Customer ID', 1);
$pdf->Cell(30, 10, 'First Name', 1);
$pdf->Cell(30, 10, 'Last Name', 1);
$pdf->Cell(50, 10, 'Email', 1);
$pdf->Cell(25, 10, 'Address', 1);
$pdf->Cell(30, 10, 'PhoneNumber', 1);
$pdf->Ln();

// Fetch data from the database

$sql = "SELECT * FROM `user` WHERE `role` = 'Customer' ORDER BY `user_id`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $pdf->SetFont('Arial', '', 12);

    // Display data in the PDF
    while ($row = mysqli_fetch_array($result)) {
        $pdf->Cell(30, 10, $row['user_id'], 1);
        $pdf->Cell(30, 10, $row['first_name'], 1);
        $pdf->Cell(30, 10, $row['first_name'], 1);
        $pdf->Cell(50, 10, $row['email'], 1);
        $pdf->Cell(25, 10, $row['address'], 1);
        $pdf->Cell(30, 10, $row['phone_no'], 1);
        $pdf->Ln();
    }

    mysqli_free_result($result);
} else {
    $pdf->Cell(190, 10, 'No records were found.', 1, 1, 'C');
}

// Output the PDF to the browser
$pdf->Output('User_details_report.pdf', 'D');
