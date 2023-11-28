<?php
//connect to db
require ('page_structure/connection.php');
include ('common_function.php');

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
                    <p>ACCOUNT RECORD</p>
                    <div>
                        <p class="divider"></p>
                    </div>
                    <?php
                    if($role == "admin"){
                        $sql="SELECT * from accountInfo";
                        $result=mysqli_query($conn, $sql);

                        if($result->num_rows > 0){
                            echo "
                                <div class='responsiveTable'>
                                <table>
                                <thead>
                                    <tr>
                                        <th scope='col' class='firstFourCol'>User ID</th>
                                        <th scope='col' class='firstFourCol'>First Name</th>
                                        <th scope='col' class='firstFourCol'>Last Name</th>
                                        <th scope='col' class='firstFourCol'>Username</th>
                                        <th scope='col'>Phone</th>
                                        <th scope='col'>Email</th>
                                        <th scope='col'>Role</th>
                                        <th>Actions</th> <!-- Added a new column for actions -->
                                    </tr>
                                </thead>
                                ";
                        
                            while($row= $result->fetch_assoc()) //$row=mysqli_fetch_assoc($result)
                            {

                            echo"
                                <tbody>
                                    <tr>
                                        <td>" . $row["userid"] . "</td>
                                        <td>" . $row["fname"] . "</td>
                                        <td>" . $row["lname"] . "</td>
                                        <td>" . $row["username"] . "</td>
                                        <td>" . $row["phone"] . "</td>
                                        <td>" . $row["email"] . "</td>
                                        <td>" . $row["role"] . "</td>
                                        <td>
                                            <a class='edit-button' href='edit_account.php?userid=" . $row["userid"] . "'>Edit</a>";
                                            
                                            if( $userid !== $row["userid"]){
                                            echo"
                                            <a class='delete-button' href='delete_account.php?userid=" . $row["userid"] . "'>Delete</a>";
                                            }
                                        echo"
                                        </td>
                                    </tr>
                                </tbody>";
                            } 
                            echo" 
                                </div>
                                </table>
                            ";
                            

                        
                        }
                    }

                    if($role == "customer"){
                        $sql="SELECT * from accountInfo WHERE userid = $userid";
                        $result=mysqli_query($conn, $sql);

                        if($result->num_rows > 0){
                            echo "
                                <div class='responsiveTable'>
                                <table>
                                <thead>
                                    <tr>
                                        <th scope='col' class='firstFourCol'>User ID</th>
                                        <th scope='col' class='firstFourCol'>First Name</th>
                                        <th scope='col' class='firstFourCol'>Last Name</th>
                                        <th scope='col' class='firstFourCol'>Username</th>
                                        <th scope='col'>Phone</th>
                                        <th scope='col'>Email</th>
                                        <th scope='col'>Role</th>
                                        <th>Actions</th> <!-- Added a new column for actions -->
                                    </tr>
                                </thead>
                                ";
                        
                            while($row= $result->fetch_assoc()) //$row=mysqli_fetch_assoc($result)
                            {
                            echo"
                                <tbody>
                                    <tr>
                                        <td>" . $row["userid"] . "</td>
                                        <td>" . $row["fname"] . "</td>
                                        <td>" . $row["lname"] . "</td>
                                        <td>" . $row["username"] . "</td>
                                        <td>" . $row["phone"] . "</td>
                                        <td>" . $row["email"] . "</td>
                                        <td>" . $row["role"] . "</td>
                                        <td>
                                            <a class='edit-button' href='edit_account.php?userid=" . $row["userid"] . "'>Edit</a> 
                                        </td>
                                    </tr>
                                </tbody>";
                            } 
                            echo" 
                                </div>
                                </table>
                            ";
                            
                        }
                    }
                    
                $conn->close();    
                ?>
                <div class="lastSection">
                </div>    
                </div>
                <div class="bottom">
                </div>
            </div>
        </main>
        <footer>
            <div>
                <br>
                <p id="footer1"><small>©HELLO WOOD Inc. All rights reserved</small></p>
            </div>
        </footer>    
    </body> 
</html>

