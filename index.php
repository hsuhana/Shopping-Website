<?php 
    require ('./page_structure/connection.php'); 
    include ('common_function.php');
?>

<?php
    session_start();

    //default character is no one
    $role = "noone";
    //echo "<script>alert('I am $role')</script>";
    
    if (isset($_SESSION["role"])) {
        $role = $_SESSION["role"];
        //echo "<script>alert('I am $role')</script>";
    }

    //add product to shopping cart function
    if(isset($_GET['add_product_to_cart']) and isset($_SESSION["userid"])){
        $get_product_id = $_GET['add_product_to_cart'];
        $userid = $_SESSION["userid"];
        $select_query = "select * from `cart` where userid = $userid and productID = $get_product_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows > 0){
            echo "<script>alert('This item is already added to shopping cart.')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }else{
            $insert_query = "insert into `cart` (productID, userid, quantity) values ($get_product_id, $userid, 1)";
            $result_query = mysqli_query($conn, $insert_query);
            echo "<script>alert('This item is successfully added to shopping cart.')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }else if(isset($_GET['add_product_to_cart'])){
        echo "<script>alert('Please log in first.')</script>";
    }  
?>

<?php require ('./page_structure/header.php'); ?>
<body>
        <!--nav bar-->
        <header>
            <nav>
                <div>
                    <?php
                    if($role == "noone"){
                        echo'
                            <a id="createAccount" class="shopper" href="./register.html">CREATE ACCOUNT</a>
                            <a class="navbar-brand shopper" href="./index.php">
                            <img src="image/logo.png" alt="logo">
                            </a>
                            <a id="logIn" class="shopper" href="./login.html">LOG IN</a>
                            <a id="logOut" class="shopper" href="logout.php">LOG OUT</a>
                        ';
                    }
                    ?>
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
            <p>PRODUCT</p>
            <div>
                <p class="divider"></p>
            </div>
            <div class="card-container">
            <?php
                $select_query="SELECT * FROM `product` ORDER BY proName";
                $result_query=mysqli_query($conn,$select_query);
                //$row=mysqli_fetch_assoc($result_query);
                //echo $row['proName'];
                while($row=mysqli_fetch_assoc($result_query)){
                    $proImage=$row['proImage'];
                    $productID=$row['productID'];
                    $proName=$row['proName'];
                    $proDescribtion=$row['proDescribtion'];
                    $proPrice=$row['proPrice'];
                    echo "
                        <div class=card-content>
                        <img src='./product_images/$proImage' class='toy-image' alt='$proName'>
                            <div class='card-body'>
                                <p class='cardtext'>$proName</p>
                                <br>
                                <p class='cardtext'>$proDescribtion</p>
                                <br>
                                <p class='cardtext'>$proPrice</p>
                                <br>
                                <a class='cardtext' id='addtocart' href='index.php?add_product_to_cart=$productID'>Add To Cart</a>
                            </div>
                        </div>
                    ";
                }
            ?>
            </div>
            </div>
            </div>


<?php require ('./page_structure/footer.php'); ?>