<?php

    require ('./page_structure/connection.php');

    //dynemic show how many kinds of products in shopping cart
    function dynemic_show_cart_number(){
        global $conn;
        if(isset($_GET['add_product_to_cart']) and isset($_SESSION["userid"])){
            $get_product_id = $_GET['add_product_to_cart'];
            $userid = $_SESSION["userid"];
            $select_query = "select * from `cart` where userid = $userid and productID = $get_product_id";
            $result_query = mysqli_query($conn, $select_query);
            $count_cart_item = mysqli_num_rows($result_query);
        }else if(isset($_SESSION["userid"])){
            $userid = $_SESSION["userid"];
            $select_query = "select * from `cart` where userid = $userid";
            $result_query = mysqli_query($conn, $select_query);
            $count_cart_item = mysqli_num_rows($result_query);
        }
        echo $count_cart_item;
    }
    
?>