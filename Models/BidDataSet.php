<?php
//Class used for handling bids data
require_once ('Models/Database.php');
require_once('Models/BidData.php');


class BidDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();

    }
     //Fetches all the bids that have the given userID
    public function fetchAllBids($userID)
    {
        $sqlQuery = "SELECT * FROM bids WHERE bids.userID=$userID";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new BidData($row);
        }
        return $dataSet;
    }
    //Insert bid into bids table
    public function createBid($bid_amount,$bid_status,$bid_creation_date,$userID,$lotID)
    {
        $query ="INSERT INTO bids (bid_amount,bid_status,bid_creation_date,userID,lotID) VALUES ('$bid_amount','$bid_status','$bid_creation_date','$userID','$lotID')";

        //Execute the query
        $statement = $this->_dbHandle->prepare($query); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

    }
     //return datetime object of the lot that has the given lotID
    public function getLotBidEndDate($lotID)
    {
        $query ="SELECT bid_end_date FROM lots WHERE lots.lotID=$lotID";
        //Execute the query
        $statement = $this->_dbHandle->prepare($query); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        $dataSet =new DateTime();
       if ($row = $statement->fetch()) {
            $dataSet= $row;
        }
        return $dataSet;
    }

    //Delete bid that has the same bid id as the one given
    public function deleteBid($bidID)
    {
        $query ="DELETE FROM bids WHERE bids.bidID=$bidID";
        //Execute the query
        $statement = $this->_dbHandle->prepare($query); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

    }

}