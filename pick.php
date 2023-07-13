<?php
require_once 'ImageProcessor.php';

// Check that the correct number of arguments are provided
if ($argc != 3) {
    echo "Usage: php script.php [directory] [percentage]\n";
    exit(1);
}

$directory = $argv[1];
$percentage = $argv[2];

// Validate directory
if (!is_dir($directory)) {
    echo "Error: Directory does not exist.\n";
    exit(1);
}

// Validate percentage
if (!is_numeric($percentage) || $percentage < 1 || $percentage > 100) {
    echo "Error: Percentage must be a number between 1 and 100.\n";
    exit(1);
}

$processor = new ImageProcessor($directory, $percentage);
$processor->processImages();

echo "Done.\n";
