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

// Ensure that the path to the image file is correct
$productImageFileName = $row['image']; // Assuming $row['image'] contains the image filename
$uploadDirectory = '../../assets/uploads/';

// Construct the full path to the image file
$productImagePath = $uploadDirectory . $productImageFileName;

// Check if the image file exists before attempting to open it
if (file_exists($productImagePath)) {
    // Determine the image file type and handle accordingly (JPEG, PNG, GIF, etc.)
    $imageFileType = pathinfo($productImagePath, PATHINFO_EXTENSION);
    
    // Check the image format and use the appropriate FPDF method
    if (strtolower($imageFileType) === 'jpg' || strtolower($imageFileType) === 'jpeg') {
        // For JPEG images
        $pdf->Image($productImagePath, 70, $pdf->GetY(), 70);
    } elseif (strtolower($imageFileType) === 'png') {
        // For PNG images
        $pdf->Image($productImagePath, 70, $pdf->GetY(), 70);
    } elseif (strtolower($imageFileType) === 'gif') {
        // For GIF images
        $pdf->Image($productImagePath, 70, $pdf->GetY(), 70); 
    } else {
        // Unsupported image format
        $pdf->Cell(0, 10, 'Unsupported image format', 0, 1, 'C');
    }
    
    $pdf->Ln(60); // Move down after the image
} else {
    // Image file not found
    $pdf->Cell(0, 10, '', 0, 1, 'C');
}


    // // Add product image
    // $productImage = '../../assets/uploads' . $row['image']; 
    // $pdf->Image($productImage, 70, $pdf->GetY(), 70); // Adjust the X and Y coordinates and width as needed
    // $pdf->Ln(60);
    
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
