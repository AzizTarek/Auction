<?php
//Calling model in order to fetch data that will be used in presenting the lots
require_once('Models/AuctionItemDataSet.php');


$view = new stdClass();
$id = $_GET['id']; //Auction id
$view->pageTitle = ' - '.$id ; //Adding auction id to the page title
$view->id = $id;

//Making an instance of the model and calling its fetch method to get lots data
$auctionItemDataSet = new AuctionItemDataSet();
$view->auctionItemDataSet = $auctionItemDataSet->fetchAuctionLots($id);

require_once('Views/auction.phtml');

