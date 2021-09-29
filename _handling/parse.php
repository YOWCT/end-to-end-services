<?php

$handlingRootDir = pathinfo(__FILE__, PATHINFO_DIRNAME);
$serviceInventoryCsv = $handlingRootDir . '/inputCSV/service_inventory.csv';

$organizationsCsv = $handlingRootDir . '/overrideCSV/organizations.csv';
$organizationNameNormalizationCsv = $handlingRootDir . '/overrideCSV/organization_name_normalization.csv';

$targetFiscalYear = '2019-2020';

function parseCsv($pathToCsvFile) {

  // Thanks to
  // https://stackoverflow.com/a/4801943/756641
  $array = $fields = array(); $i = 0;
  $handle = @fopen($pathToCsvFile, "r");
  if ($handle) {
      while (($row = fgetcsv($handle, 4096)) !== false) {
          if (empty($fields)) {
              $fields = $row;
              continue;
          }
          foreach ($row as $k=>$value) {
              $array[$i][$fields[$k]] = $value;
          }
          $i++;
      }
      if (!feof($handle)) {
          echo "Error: unexpected fgets() fail\n";
      }
      fclose($handle);
  }

  return $array;

}

function filterInventoryArray($inventoryArray, $targetFiscalYear) {
    $outputArray = [];

    foreach($inventoryArray as $item) {

        // Compensating for a weird unicode glitch with the first heading column:
        $fyKey = array_keys($item)[0];

        // Only include items from the same fiscal year, that are externally-facing:
        if(($item[$fyKey] == $targetFiscalYear) && (strpos($item['external_internal'], 'extern') !== false)) {
            $outputArray[] = $item;
        }
    }

    return $outputArray;
}

function indexArrayByKey($inputArray, $columnKey) {
    $outputArray = [];

    foreach($inputArray as $item) {
        $outputArray[$item[$columnKey]] = $item;
    }

    return $outputArray;
}

function findNested($inputArray, $key, $needle) {
    foreach($inputArray as $index => $item) {
        if($item[$key] === $needle) {
            return $item;
        }
    }
    return false;
}



function addServiceMetadata(&$item, &$organizations, $organizationNameNormalization) {
    $departmentAcronym = '';
    $departmentData = '';
    $isEndToEnd = true;

    $endToEndColumns = [
        'e_registration',
        'e_authentication',
        'e_application',
        'e_decision',
        'e_issuance',
        'e_feedback',
    ];


    $nameNormalization = findNested($organizationNameNormalization,'name',$item['department_name_en']);

    if($nameNormalization) {
        $departmentAcronym = $nameNormalization['destinationAcronym'];
        $departmentData = $organizations[$departmentAcronym];
    }
    else {
        $departmentData = findNested($organizations,'name_en',$item['department_name_en']);

        if(! $departmentData) {
            echo "Error: could not find " . $item['department_name_en'];
            return;
        }

        $departmentAcronym = $departmentData['acronym_en'];
    }

    // Set (normalized) departmental name and acronyms:
    $item['meta_department_name_en'] = $departmentData['name_en'];
    $item['meta_department_acronym_en'] = $departmentData['acronym_en'];

    // Check if any of the e-services columns are set to "N"
    foreach($endToEndColumns as $column) {
        if($item[$column] === 'N') {
            $isEndToEnd = false;
        }
    }    

    // Initialize departmental metadata if it hasn't been done yet
    if(! isset($organizations[$departmentAcronym]['servicesOnline'])) {
        $organizations[$departmentAcronym]['servicesOnline'] = 0;
    }
    if(! isset($organizations[$departmentAcronym]['servicesNotOnline'])) {
        $organizations[$departmentAcronym]['servicesNotOnline'] = 0;
    }

    if($isEndToEnd) {
        $item['meta_end_to_end'] = 1;
        $organizations[$departmentAcronym]['servicesOnline'] += 1;
    }
    else {
        $item['meta_end_to_end'] = 0;
        $organizations[$departmentAcronym]['servicesNotOnline'] += 1;
    }
   

}

function addAllServiceMetadata(&$inputArray, &$organizations, $organizationNameNormalization) {
    foreach($inputArray as &$item) {
        addServiceMetadata($item, $organizations, $organizationNameNormalization);
    }
}

function calculateOrganizationPercentages(&$organizations) {
    foreach($organizations as &$organization) {
        if(isset($organization['servicesOnline']) && isset($organization['servicesNotOnline']) && $organization['servicesOnline'] && $organization['servicesNotOnline']) {
            $organization['percentage'] = round($organization['servicesOnline'] / ($organization['servicesOnline'] + $organization['servicesNotOnline']), 2);
        }
        else {
            $organization['servicesOnline'] = 0;
            $organization['servicesNotOnline'] = 0;
            $organization['percentage'] = 0;
            $organization['noData'] = 1;

        }
        
    }
}



// Script run below:

echo "Loading " . $organizationsCsv . "\n";

$organizations = parseCsv($organizationsCsv);
$organizations = indexArrayByKey($organizations, 'acronym_en');

echo "Loading " . $organizationNameNormalizationCsv . "\n";

$organizationNameNormalization = parseCsv($organizationNameNormalizationCsv);
$organizationNameNormalization = indexArrayByKey($organizationNameNormalization, 'destinationAcronym');

echo "Starting parse of " . $serviceInventoryCsv . "\n";

$inventoryArray = parseCsv($serviceInventoryCsv);

echo "Total # of entries: " . count($inventoryArray) . "\n";

$filteredInventoryArray = filterInventoryArray($inventoryArray, $targetFiscalYear);

echo "Entries from " . $targetFiscalYear . " that are externally facing: " . count($filteredInventoryArray) . "\n";

// exit(var_export($filteredInventoryArray[0]));

echo "TEST: \n";
// var_export(findNested($organizations,'name_en','Women and Gender Equality Canada'));
// var_export(findNested($organizationNameNormalization,'name','Department of Indigenous Services'));

// Calculate metadata updates to each service entry
addAllServiceMetadata($filteredInventoryArray, $organizations, $organizationNameNormalization);

// Calculate percentages for each organization
calculateOrganizationPercentages($organizations);

var_export($filteredInventoryArray[0]);

var_export($organizations['tc']);

echo "Finished. \n";
