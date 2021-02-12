//Class used for fetching lots data
<?php
require_once ('Models/Database.php');
require_once ('LotData.php');
class LotDataSet {
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    //fetches lot that has the same id as the one given in the parameter
  public function fetchLot($lotID){
        $sqlQuery = "SELECT * FROM lots WHERE lots.lotID=$lotID ";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = '';
        if ($row = $statement->fetch()) {
            $dataSet = new LotData($row);
        }
        return $dataSet;

    }

//Create lot
    public function createLot($posting_user, $item_title, $item_desc, $imageID,$auctionID, $start_bid_amount,$typical_price,$date_created,$bid_end_date )
    {
        $query ="INSERT INTO users (posting_user, item_title, item_desc, imageID,auctionID, start_bid_amount,typical_price,date_created,bid_end_date ) VALUES ('$posting_user', '$item_title', '$item_desc', '$imageID','$auctionID', '$start_bid_amount','$typical_price','$date_created','$bid_end_date' )";

        //Execute the query
        $statement = $this->_dbHandle->prepare($query); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

    }



}


