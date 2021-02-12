<?php
//Search lots or auction
$search='';

 if(isset($_POST['btnradio']) && isset($_POST['submitBtn'])){
               $option = $_POST['btnradio']; //Store the radio button value, 1 or 2 (Auction or Lot)
     if(isset( $_POST['searchTxt'])) {
                $search = $_POST['searchTxt']; //Store the search value
         if (($option == 1)&& ($search<21)&& ($search>0)) {
             header("Location: auction.php?id=$search"); // redirect to auction
             exit();
         } else if (($search<1001)&&($search>0)){
             header("Location: lot.php?id=$search"); // redirect to lot
             exit();
         }
         else
             header("Location: index.php?search_error=No search results match your search"); // redirect back to index page
         exit();

     }
     else
         header("Location: index.php?search_error=No search results match your search");// redirect back to index page
     exit();
 }
 else
     header("Location: index.php?search_error=No search results match your search");// redirect back to index page
exit();








