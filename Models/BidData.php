<?php
//Stores the data to each field from the result of the query for each bid

class BidData
{
    protected $bidID, $bid_amount, $bid_status, $bid_creation_date, $userID,$lotID;

    public function __construct($dbRow) {
        $this->bidID= $dbRow['bidID'];
        $this->bid_amount = $dbRow['bid_amount'];
        $this->bid_status = $dbRow['bid_status'];
        $this->bid_creation_date= $dbRow['bid_creation_date'];
        $this->userID= $dbRow['userID'];
        $this->lotID= $dbRow['lotID'];

    }

    public function getBidID() {
        return $this->bidID;
    }

    public function getBidAmount() {
        return $this->bid_amount;
    }

    public function getBidStatus() {
        return $this->bid_status;
    }

    public function getBidCreationDate() {
        return $this->bid_creation_date;
    }
    public function getUserID() {
        return $this->userID;
    }

    public function getLotID() {
        return $this->lotID;
    }

}