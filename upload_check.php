<?php
session_start();
require_once ('Models/AuctionItemDataSet.php');

if (isset($_POST['auction_name']) && isset($_POST['auction_address'])&& isset($_POST['auction_startDate'])) {

    //Validating the data (making sure it is not some malicious script)
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Validating all the data
    $auction_name = validate($_POST['auction_name']);
    $auction_address = validate($_POST['auction_address']);;
    $auction_startDate = validate($_POST['auction_startDate']);

    //Check if any of the fields is empty
    if (empty( $auction_name)) {
        header("Location: signup.php?error=Auction Name is required");
        exit();
    }else if(empty( $auction_address)){
        header("Location: signup.php?error=Auction Address is required");
        exit();
    }
    else if(empty($auction_startDate)){
        header("Location: signup.php?error=Auction StartDate is required");
        exit();
    }
 else{
     $auctionDataSet = new AuctionItemDataSet();
            $view->auctionDataSet=$auctionDataSet->createAuction($auction_name,$auction_address,$auction_startDate);
            $created=true;
//             Message on successful or unsuccessful user creation
            if ($created) {
                header("Location: upload.php?success=Auction uploaded successfully");
                exit();
            }else {
                header("Location: upload.php?error=unknown error occurred");
                exit();
            }

    }

}
elseif (isset($_POST['posting_user']) && isset($_POST['item_title'])&& isset($_POST['item_desc'])&& isset($_POST['auctionID']) && isset($_POST['start_bid_amount']) && isset($_POST['typical_price']) && isset($_POST['date_created']) && isset($_POST['bid_end_date'])) {
   require_once ('Models/LotDataSet.php');
    //Validating the data (making sure it is not some malicious script)
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Validating all the data
    $item_title = validate($_POST['item_title']);
    $item_desc = validate($_POST['item_desc']);;
    $auction_ID = validate($_POST['auctionID']);
    $start_bid_amount = validate($_POST['start_bid_amount']);
    $typical_price = validate($_POST['typical_price']);;
    $date_created = validate($_POST['date_created']);
    $bid_end_date= validate($_POST['bid_end_date']);

    //Check if any of the fields is empty
    if (empty(  $item_title)) {
        header("Location: signup.php?error=Item Title is required");
        exit();
    }else if(empty(  $item_desc)){
        header("Location: signup.php?error=item description is required");
        exit();
    }
    else if(empty( $start_bid_amount  )){
        header("Location: signup.php?error=stating bid amount is required");
        exit();

    }
    else if(empty( $typical_price)){
        header("Location: signup.php?error=price estimate is required");
        exit();

    }
    else if(empty( $auction_ID)){
        header("Location: signup.php?error=Auction ID is required");
        exit();

    }
    else if(empty( $date_created)){
        header("Location: signup.php?error=Date created is required");
        exit();

    }
    else if(empty( $bid_end_date)){
        header("Location: signup.php?error=bidding end Date is required");
        exit();

    }
    else{
        $posting_user = $_GET['posting_user'];
        $lotDataSet = new LotDataSet();
        $view->lotDataSet=$lotDataSet->createLot($posting_user, $item_title, $item_desc, $imageID,$auctionID, $start_bid_amount,$typical_price,$date_created,$bid_end_date );
        $created=true;
//             Message on successful or unsuccessful user creation
        if ($created) {
            header("Location: upload.php?success=Lot uploaded successfully");
            exit();
        }else {
            header("Location: upload.php?error=unknown error occurred");
            exit();
        }

    }

}
else{
    header("Location: index.php");
    exit();
}