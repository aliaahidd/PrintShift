<?php
    session_start();
    include('dbase.php');
    require 'check_if_added.php';
    if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["img"]))  
      {  
           $item_array_id = array_column($_SESSION["img"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["img"]);  
                $item_array = array(  
                     'item_id' => $_GET["id"],  
                     'item_name' => $_POST["hidden_name"],  
                     'item_price' => $_POST["hidden_price"],  
                     'item_quantity' =>  $_POST["quantity"]  
                );  
                $_SESSION["img"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="products.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id' => $_GET["id"],  
                'item_name' => $_POST["hidden_name"],  
                'item_price' => $_POST["hidden_price"],  
                'item_quantity' => $_POST["quantity"]  
           );  
           $_SESSION["img"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["img"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["img"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="products.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  