<?php

use PHPUnit\Framework\TestCase;

class ImageProcessorTest extends TestCase {
    public function testProcessImages() {
        $processor = new ImageProcessor('images', 50);
        $processor->processImages();
        $processedImages = glob('images/processed/*');
        $this->assertEquals(50, count($processedImages));
    }
}
