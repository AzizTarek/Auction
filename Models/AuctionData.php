<?php
//Stores the data to each field from the result of the query for each auction

class AuctionData {

    protected $auctionID, $auction_name, $auction_address, $auction_startDate;

    public function __construct($dbRow) {
        $this->auctionID= $dbRow['auctionID'];
        $this->auction_name = $dbRow['auction_name'];
        $this->auction_address = $dbRow['auction_address'];
        $this->auction_startDate = $dbRow['auction_startDate'];

    }

    public function getAuctionID() {
        return $this->auctionID;
    }

    public function getAuctionName() {
        return $this->auction_name;
    }

    public function getAuctionAddress() {
        return $this->auction_address;
    }

    public function getAuctionStartDate() {
        return $this->auction_startDate;
    }

}


