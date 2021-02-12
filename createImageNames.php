//Script generates image names and saves it into an excel file using phpspreadsheets
<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$i=1;

//loop creates 3 image name for each lot
for ($i = 1; $i < 1000; $i++) {
    for ($j = 1; $j < 4; $j++) {
        $img = 'flower' . $i . '-' . $j . '.jpg';
        if($j==1)
        $sheet->setCellValue("A$i","$img");
        elseif ($j==2)
            $sheet->setCellValue("B$i","$img");
        else
            $sheet->setCellValue("C$i","$img");
    }
}
//creates excel file
$writer = new Xlsx($spreadsheet);
//saves the generated data
$writer->save('imageNames.xlsx');