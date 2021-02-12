<?php
//Stores the data to each field from the result of the query

class LotData {

    protected $lotID,$posting_user,$item_title,$item_desc,$imageID,$start_bid_amount,$typical_price,$date_created,$bid_end_date;

    public function __construct($dbRow) {
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


