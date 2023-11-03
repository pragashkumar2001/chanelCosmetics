<?php
include_once '../../configs/fpdf186/fpdf.php';

function generatePDF($conn) {
// Fetch feedback data from the database
$sql2 = "SELECT * FROM feedback ORDER BY feedback_id DESC LIMIT 1";
$result_feedback = mysqli_query($conn, $sql2);

// Create a new FPDF instance
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(0, 10, 'Feedback Report', 0, 1, 'C');
$pdf->Ln(10);

if (mysqli_num_rows($result_feedback) > 0) {
    // Table Headers
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'Email', 1);
    $pdf->Cell(30, 10, 'Category', 1);
    $pdf->Cell(40, 10, 'Subject', 1);
    $pdf->Cell(85, 10, 'Description', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 12);
    // Display data in the PDF
    while ($row = mysqli_fetch_array($result_feedback)) {
        $pdf->Cell(40, 10, $row['email'], 1);
        $pdf->Cell(30, 10, $row['category'], 1);
        $pdf->Cell(40, 10, $row['subject'], 1);
        $pdf->MultiCell(85, 10, $row['description'], 1);
    }

    mysqli_free_result($result_feedback);
} else {
    $pdf->Cell(190, 10, 'No feedback records found.', 1, 1, 'C');
}

// Output the PDF to the browser
$pdf->Output('feedback_report.pdf', 'D');
}

?>