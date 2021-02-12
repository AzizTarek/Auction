<?php
$view = new stdClass();
$view->pageTitle = ' - Upload';
if(isset($_GET['Upload']) ) {
    $uploadType = $_GET['Upload'];
    $view->uploadType = $uploadType;
}
else
$view->uploadType = '';
require_once ('Views/upload.phtml');