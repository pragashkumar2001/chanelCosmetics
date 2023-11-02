<?php
include_once '../../configs/database.php';
include_once '../../configs/fpdf186/fpdf.php';

// Create a new FPDF instance
$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(0, 10, 'Order Details Report', 0, 1, 'C');
$pdf->Ln(10);

// Table Headers
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'Order ID', 1);
$pdf->Cell(50, 10, 'Product Name', 1);
$pdf->Cell(30, 10, 'Quantity', 1);
$pdf->Cell(50, 10, 'Amount', 1);
$pdf->Ln();

// Fetch data from the database
$order_id = $_GET["order_id"];
$sql = "SELECT *, d.quantity as Qty FROM customer_order o, order_detail d, product p WHERE o.order_id = d.order_id AND p.product_id = d.product_id and o.order_id=$order_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $pdf->SetFont('Arial', '', 12);

    // Display data in the PDF
    while ($row = mysqli_fetch_array($result)) {
        $pdf->Cell(30, 10, $row['order_id'], 1);
        $pdf->Cell(50, 10, $row['name'], 1);
        $pdf->Cell(30, 10, $row['Qty'], 1);
        $pdf->Cell(50, 10, 'Rs. ' . $row['amount'], 1);
        $pdf->Ln();
    }

    mysqli_free_result($result);
} else {
    $pdf->Cell(190, 10, 'No records were found.', 1, 1, 'C');
}

// Output the PDF to the browser
$pdf->Output('order_details_report.pdf', 'D');
