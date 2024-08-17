<?php
if (!isset($_GET['filename'])) {
  exit('Invalid request');
}

$filename = $_GET['filename'];
$fullPath = WRITEPATH . 'uploads/' . $filename;

if (!file_exists($fullPath)) {
  exit('File not found');
}

$mime = mime_content_type($fullPath);
header("Content-Type: $mime");
echo file_get_contents($fullPath);