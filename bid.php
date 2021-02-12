<?php

// Create bid after getting all the info
    require_once('Models/BidDataSet.php');
    session_start();
    $bid_Amount=0;

    if (isset($_POST['bidAmount']))
        $bid_Amount = $_POST['bidAmount'];
     $start_bid_amount = $_GET['startingBid'];
    if($bid_Amount>=$start_bid_amount) {
            $_SESSION['bid_amount'] = $bid_Amount; // Will be used in the bids page to show the latest bid

            if (isset($_SESSION['lotID']))
                $lotID = $_SESSION['lotID'];
            if (isset($_SESSION['userID']))
                $userID = $_SESSION['userID'];

            // Create datetime variable
            $d = strtotime("now");
            date_default_timezone_set('UTC'); // set timezone to UTC (00:00)
            $bid_creation_date = date("Y-m-d h:i:s", $d);

            $_SESSION['bid_creation_date'] = $bid_creation_date; // Will be used in the bids page to show the latest bid
            $bid_end_date = new BidDataSet();
            $view->bid_end_date = $bid_end_date->getLotBidEndDate($lotID); // Get the bid end date
            $bid_status = 0; //  0 means live , 1 means bid ended
            if (var_dump($bid_creation_date > $bid_end_date)) //Compare bid end date with the bid creation date
            {
                $bid_status = 1;
            }//bid has ended

           //Create the bid
            $bid = new BidDataSet();
            $view->bid = $bid->createBid($bid_Amount, $bid_status, $bid_creation_date, $userID, $lotID);

            header("Location: loggedIn.php");//Redirect to bids page
            exit();
    }
    else {
        $lotID = $_GET['lotID']; // Get lot id from querystring
       header("Location: lot.php?id=$lotID&&bid_error=Cant bid lower than the starting price");//Redirect to bids page
        exit();
    }
