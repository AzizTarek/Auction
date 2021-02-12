//Class used for fetching lots data
<?php
require_once ('Models/Database.php');
require_once ('ImageData.php');
class ImageDataSet {
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }
 //fetches all items from each auction
    public function fetchImages($lotID) {


        $sqlQuery = "SELECT * FROM images WHERE images.imageID=$lotID";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = '';
        if ($row = $statement->fetch()) {
            $dataSet = new ImageData($row);
        }
        return $dataSet;
    }


}


