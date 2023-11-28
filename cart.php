<?php 
    require ('./page_structure/connection.php'); 
    include ('common_function.php');
?>

<?php
    session_start();

    //check the user is customer or admin
    if (!isset($_SESSION["userid"])) {
        header("location: ./login.html"); // Redirect to login page if not logged in
        exit;
    }

    //default character is no one
    $role = "noone";
    //echo "<script>alert('I am $role')</script>";
    
    if (isset($_SESSION["role"])) {
        $role = $_SESSION["role"];
        $userid = $_SESSION["userid"];
        //echo "<script>alert('I am $role')</script>";
    }

     
?>

<?php require ('./page_structure/header.php'); ?>
<body>
        <!--nav bar-->
        <header>
            <nav>
                <div>
                    <?php
                        if($role == "customer") {
                            echo"
                                <a class='shopper' href='./cart.php'>
                                <img src='image/cart.png' alt='cart' width='20'>
                                ";
                                dynemic_show_cart_number();
                                echo"
                                    SHOPPER CART
                                </a>
                                <a class='navbar-brand shopper' href='./index.php'>
                                <img src='image/logo.png' alt='logo'>
                                </a>
                                <a id='logOut' class='shopper' href='logout.php'>LOG OUT</a>
                                <a id='accountRecord' class='shopper' href='./account_record.php'>ACCOUNT RECORD</a>
                                ";
                        }
                    ?>
                    <?php
                        if($role == "admin") {
                            echo"
                            <a class='shopper' href='./cart.php'>
                            <img src='image/cart.png' alt='cart' width='20'>
                            ";
                            dynemic_show_cart_number();
                            echo"
                                SHOPPER CART
                            </a>
                            <a id='logOut' class='shopper' href='logout.php'>LOG OUT</a>
                            <a class='navbar-brand shopper' href='./index.php'>
                            <img src='image/logo.png' alt='logo'>
                            </a>
                            <a id='accountRecord' class='shopper' href='./account_record.php'>ACCOUNT RECORD</a>
                                <a id='insertProduct' class='shopper' href='admin/add_product.php'>INSERT PRODUCT</a>
                            ";
                        }
                    ?>
                </div>           
            </nav>
        </header>
        <main>
            <div class="container">
                <div class="cart">
                    <!--<form class="form" action="./update_cart.php" method="post">-->
                    <p>EDIT THE AMOUNT OF PRODUCT</p>
                    <div>
                        <p class='divider'></p>
                    </div>

                    <?php

                        $select_query = "SELECT product.proImage, product.productID, product.proName, product.proDescribtion, product.proPrice, product.fortableuse, cart.quantity, cart.userid
                        FROM `product`
                        INNER JOIN `cart`
                        ON product.productID = cart.productID
                        WHERE product.productID IN (SELECT productID FROM cart WHERE userid = $userid) AND userid = $userid";

                        $result_query=mysqli_query($conn,$select_query);

                        while($row=mysqli_fetch_assoc($result_query)){

                        $proImage=$row['proImage'];
                        //$productID=$row['productID'];
                        $proName=$row['proName'];
                        $proDescribtion=$row['proDescribtion'];
                        $proPrice=$row['proPrice'];
                        //$fortableuse=$row['fortableuse'];
                        //$quantity=$row['quantity'];
                        //$userid=$row['userid'];
                     
                        
                        echo"
                            <form action='./update_cart.php' method='post'>
                                <div class='flex-container'>
                                    <img src='image/$proImage' alt='toy-image'>
                                    <div>
                                        <p class='toy'>
                                            $proName
                                            <br> 
                                            $proDescribtion
                                            <br>
                                            $proPrice
                                        </p>    
                                        <div class='toy'>
                                            <label for='quantity'>QUANTITY</label>
                                            
                                            <input type='number' name='qty' min='1' value='".$row["quantity"]."' >
                                            <input type='hidden' name='userid' value='" . $row["userid"] . "'>
                                            <input type='hidden' name='productID' value='" . $row["productID"] . "'>
                                            <br>                       
                                            <button class='updatebutton' type='submit' name='update' >UPDATE</button>
                                            <a class='delete-button' href='delete_cart.php?productID=" . $row["productID"] . "'>DELETE</a>
                                        </div>
                                    </div>    
                                </div>
                            </form>";
                        }
                      
                        $conn->close();                    
                    ?>

                    </div>
                    </div>
                    
                <!--</form>-->
                </div>
                <div class="bottom">
                </div>
            </div>
        </main>
        <footer>
            <div>
                <p id="footer1">©HELLO WOOD Inc. All rights reserved</p>
            </div>
        </footer>
    </body>
</html>