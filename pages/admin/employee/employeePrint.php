<?php
include_once '../../../configs/database.php';
include_once '../../../configs/fpdf186/fpdf.php';

// Create a new FPDF instance
$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(0, 10, 'Employee Details Report', 0, 1, 'C');
$pdf->Ln(10);

// Table Headers
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'Employee ID', 1);
$pdf->Cell(50, 10, 'Name', 1);
$pdf->Cell(50, 10, 'Address', 1);
$pdf->Cell(30, 10, 'Contact', 1);
$pdf->Cell(30, 10, 'Salary', 1);
$pdf->Ln();

// Fetch data from the database
$sql = "SELECT * FROM employeedetail";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $pdf->SetFont('Arial', '', 12);

    // Display data in the PDF
    while ($row = mysqli_fetch_array($result)) {
        $pdf->Cell(30, 10, $row['employee_id'], 1);
        $pdf->Cell(50, 10, $row['name'], 1);
        $pdf->Cell(50, 10, $row['address'], 1);
        $pdf->Cell(30, 10, $row['contact'], 1);
        $pdf->Cell(30, 10, $row['salary'], 1);
        $pdf->Ln();
    }

    mysqli_free_result($result);
} else {
    $pdf->Cell(240, 10, 'No employee records were found.', 1, 1, 'C');
}

// Output the PDF to the browser
$pdf->Output('employee_details_report.pdf', 'D');
?>
