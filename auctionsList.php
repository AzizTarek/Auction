<?php
//Calling model in order to fetch data that will be used in presenting the auctions
require_once('Models/AuctionItemDataSet.php');


$view = new stdClass();
 $view->pageTitle = ' - Live Auctions'; //Adding text to the page title

//Making an instance of the model and calling its fetch method to get auction data
$auctionItemDataSet = new AuctionItemDataSet();
$view->auctionItemDataSet = $auctionItemDataSet->fetchAllAuctions();


require_once('Views/auctionsList.phtml');
