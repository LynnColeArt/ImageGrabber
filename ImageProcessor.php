<?php 
class ImageProcessor {
    private $directory;
    private $percentage;
    private $processedDir;

    public function __construct($directory, $percentage) {
        $this->directory = $directory;
        $this->percentage = $percentage;
        $this->processedDir = $this->directory . '/processed';
    }

    public function processImages() {
        $images = $this->getImages();
        $number = round(($this->percentage / 100) * count($images));
        $selectedFiles = array_rand($images, $number);
        $this->copyImages($selectedFiles, $images);
    }

    private function getImages() {
    $allFiles = glob($this->directory . '/*');
    $files = [];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    foreach ($allFiles as $file) {
        $mimeType = finfo_file($finfo, $file);
        if ($mimeType === 'image/jpeg' || $mimeType === 'image/png') {
            $files[] = $file;
        }
    }
    finfo_close($finfo);

    // Randomize the order of the files
    shuffle($files);

    return $files;
}


    private function copyImages($selectedFiles, $images) {
		if (!file_exists($this->processedDir)) {
			mkdir($this->processedDir, 0777, true);
		}
		foreach ($selectedFiles as $index) {
			$file = $images[$index];
			$basename = basename($file);
			echo "Processing $basename...\n";
			copy($file, "$this->processedDir/$basename");
		}
	}

}
