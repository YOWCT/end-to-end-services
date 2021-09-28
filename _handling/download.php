<?php 

// Downloads the service inventory CSV file to a pre-existing folder.
// open.canada.ca source page is:
// https://open.canada.ca/data/en/dataset/3ac0d080-6149-499a-8b06-7ce5f00ec56c

$sourceUrl = "https://open.canada.ca/data/dataset/3ac0d080-6149-499a-8b06-7ce5f00ec56c/resource/3acf79c0-a5f5-4d9a-a30d-fb5ceba4b60a/download/service_inventory.csv";

$handlingRootDir = pathinfo(__FILE__, PATHINFO_DIRNAME);

$downloadPath = $handlingRootDir . '/inputCSV/service_inventory.csv';

echo "Starting download to: " . $downloadPath . "\n";

file_put_contents($downloadPath, fopen($sourceUrl, 'r'));

echo "Download complete. \n";
