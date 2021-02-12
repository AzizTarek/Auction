<?php
//Calling these models in order to fetch their data that will be used in presenting each lot
require_once('Models/LotDataSet.php');
require_once ('Models/ImageDataSet.php');
session_start();
$view = new stdClass();

$id = $_GET['id']; //Lot id
$_SESSION['lotID'] = $id;
$view->pageTitle = ' - Lot '.$id ; //Adding lot id to the pagetitle
$view->id = $id;

//Making an instance from each model and calling their respective fetching methods to get image and lot data
$lotDataSet = new LotDataSet();
$imageDataSet = new ImageDataSet();
$view->lotDataSet = $lotDataSet->fetchLot($id);
$view->imageDataSet=$imageDataSet->fetchImages($id);
require_once('Views/lot.phtml');

