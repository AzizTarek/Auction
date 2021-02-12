<?php
//Stores the data to each field from the result of the JOIN query(Auction and Lot table JOIN) for each auction and item of auction

class AuctionItemData {
    
    protected $auctionID, $auction_name, $auction_address, $auction_startDate,$lotID,$posting_user,$item_title,$item_desc,$imageID,$start_bid_amount,$typical_price,$date_created,$bid_end_date;
    
    public function __construct($dbRow) {
        $this->auctionID= $dbRow['auctionID'];
        $this->auction_name = $dbRow['auction_name'];
        $this->auction_address = $dbRow['auction_address'];
        $this->auction_startDate = $dbRow['auction_startDate'];
        $this->lotID= $dbRow['lotID'];
        $this->posting_user = $dbRow['posting_user'];
        $this->item_title = $dbRow['item_title'];
        $this->item_desc = $dbRow['item_desc'];
        $this->imageID= $dbRow['imageID'];
        $this->start_bid_amount = $dbRow['start_bid_amount'];
        $this->typical_price = $dbRow['typical_price'];
        $this->date_created = $dbRow['date_created'];
        $this->bid_end_date = $dbRow['bid_end_date'];
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
    public function getLotID() {
        return $this->lotID;
    }

    public function getPostingUser() {
        return $this->posting_user;
    }

    public function getItemTitle() {
        return $this->item_title;
    }

    public function getItemDesc() {
        return $this->item_desc;
    }
    public function getImageID() {
        return $this->imageID;
    }

    public function getStartBidAmount() {
        return $this->start_bid_amount;
    }

    public function getTypicalPrice() {
        return $this->typical_price;
    }

    public function getDateCreated() {
        return $this->date_created;
    }

    public function getBidEndDate() {
        return $this->bid_end_date;
    }
            
}


