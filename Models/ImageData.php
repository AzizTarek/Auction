<?php
//Stores data of each field of the images table

class ImageData
{
   protected $imageID,$image1,$image2,$image3;

    public function __construct($dbRow) {
       $this->imageID= $dbRow['imageID'];
       $this->image1 = $dbRow['image1'];
       $this->image2= $dbRow['image2'];
       $this->image3= $dbRow['image3'];
   }

    public function getImageID() {
        return $this->imageID;
    }

    public function getImage1() {
        return $this->image1;
    }

    public function getImage2() {
        return $this->image2;
    }

    public function getImage3()
    {
        return $this->image3;
    }

}