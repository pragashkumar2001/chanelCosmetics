<?php
include_once '../../configs/database.php';
include_once '../../configs/fpdf186/fpdf.php';

// Create a new PDF document
$pdf = new FPDF();
$pdf->AddPage();

// Fetch data from the database
$product_id = $_GET["product_id"];

$sql = "SELECT p.name AS pname, p.description AS description, p.unit_price AS price, p.image AS image, b.name AS brand, c.name AS category 
          FROM product p
          INNER JOIN brand b ON p.brand_id = b.brand_id
          INNER JOIN category c ON p.category_id = c.category_id
          WHERE p.product_id = $product_id";
$result = mysqli_query($conn, $sql); 

if ($row = mysqli_fetch_assoc($result)) {
    // Set font for product name and details
    $pdf->SetFont('Arial', 'B', 16);
    
    // Add product name
    $pdf->Cell(0, 10, $row['pname'], 0, 1, 'C');
    $pdf->Ln(10);
    
    
    // Add product details (description, price, brand, category)
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, 'Description: ' . $row['description']);
    $pdf->Cell(0, 10, 'Price: Rs. ' . $row['price'], 0, 1);
    $pdf->Cell(0, 10, 'Brand: ' . $row['brand'], 0, 1);
    $pdf->Cell(0, 10, 'Category: ' . $row['category'], 0, 1);
} else {
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Product not found', 0, 1, 'C');
}

mysqli_free_result($result);

// Output PDF to browser
$pdf->Output('product_details.pdf', 'D');
?>
