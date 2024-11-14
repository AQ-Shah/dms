<?php
 require_once("../includes/public_require.php"); 
 $current_page = "invoice_view";
 
 confirm_access($current_page);
// get_image.php

// Specify the base directory where images are stored (outside the public folder).
$baseDir = __DIR__ . '/../includes/images/';

// Get the image path from the query parameter and sanitize it.
$imagePath = isset($_GET['path']) ? basename($_GET['path']) : '';

// Generate the full path to the image.
$fullPath = $baseDir . $imagePath;

// Check if the file exists and is a valid image type.
if (file_exists($fullPath) && in_array(mime_content_type($fullPath), ['image/jpeg', 'image/png', 'image/gif'])) {
    // Set the correct content type and output the image.
    header('Content-Type: ' . mime_content_type($fullPath));
    readfile($fullPath);
} else {
    // If the image doesn't exist, show a default or error image.
    header('HTTP/1.0 404 Not Found');
    echo "Image not found.";
}
