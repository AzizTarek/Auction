//Class used for fetching auction and auction lots data
<?php
require_once ('Models/Database.php');
require_once('Models/AuctionItemData.php');
require_once('Models/AuctionData.php');

class AuctionItemDataSet {
    protected $_dbHandle, $_dbInstance;
        
    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    //fetches all items from each auction
    public function fetchAllItems() {


        $sqlQuery = 'SELECT * FROM auctions,lots WHERE auctions.auctionID=lots.auctionID ';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new AuctionItemData($row);
        }
        return $dataSet;
    }

  // fetches all auctions
    public function fetchAllAuctions(){
        $sqlQuery = 'SELECT * FROM auctions ';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new AuctionData($row);
        }
        return $dataSet;
    }



    //fetches auction lots from the auction that matches  the given auctionID in the parameter
    public function fetchAuctionLots($auctionID){
        $sqlQuery = "SELECT * FROM auctions,lots WHERE auctions.auctionID=$auctionID AND auctions.auctionID=lots.auctionID ";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new AuctionItemData($row);
        }
        return $dataSet;
    }

 // Create new auction
    public function createAuction($auction_name,$auction_address,$auction_startDate){
        $query ="INSERT INTO auctions (auction_name, auction_address, auction_startDate) VALUES ('$auction_name','$auction_address','$auction_startDate')";

        //Execute the query
        $statement = $this->_dbHandle->prepare($query); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
    }


}


