<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST;
    $fileName = 'form_data_' . date('Y-m-d') . '.xlsx';
    $filePath = '/path/to/where/you/want/to/save/' . $fileName;

    require 'Classes/PHPExcel.php'; // Adjust the path to PHPExcel library as per your setup

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getActiveSheet()->fromArray($data, null, 'A1');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save($filePath);

    echo 'Excel file saved at: <a href="' . $filePath . '">' . $fileName . '</a>';
}
?>