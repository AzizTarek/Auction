<?php
require_once ('Models/BidDataSet.php');
session_start();

$bidID = $_GET['bidID']; // Getting the bid id
$bidDataSet = new BidDataSet();
$view -> bidDataSet = $bidDataSet->deleteBid($bidID);  // Delete the bid

header("Location: loggedIn.php"); // Go back to bids page
