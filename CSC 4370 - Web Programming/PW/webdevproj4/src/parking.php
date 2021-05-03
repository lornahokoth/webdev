<!DOCTYPE html>
    <head>
        <title>
            Parking and Flight Bookings
        </title>

        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="parkB">
        <header>
            <h1 class="logo"><a href="">Ecommerce Site Name</a></h1>
            <h1 class="cart"><a href="./cart.php">Cart</a></h1>
            <nav>
                <ul>
                    <li class=""><a href="./index.html">Home</a></li>
                    <li><a href="./flights.html">Flights</a></li>
                    <li class="active"><a href="./parking.php">Parking</a></li>

                    
                  </ul>
                  
            </nav>
            
        </header>

        <div class="parking">
            <div>
                <center>
                    <p class="parkP" style="font-size: 1.5em;">We offer standard parking at $7 and VIP parking at $15. VIP includes larger spaces for your vehicle and is more accessible to exits. </p>
                </center>
            </div>
            <div class="left">
                <div class="left">
                <p class="parkP">Select the amount of tickets you are purchasing: </p>
                <p class="parkP">Select the type of ticket you are purchasing: </p>

                </div>
                <div class="right">
                <div class="total">

                    
                    <p class="parkP"></p>
                </div>
                </div>
            </div>
            <div class="right">
                <form class="tickets">
                    <div>
                        <label>
                            <input class="quantity" id="number" type="number" value="1" min="1" max="15">
                        </label>
                    </div>

                    <div class="select">
                        <label>
                            <select>
                                <option selected> -- select -- </option>
                                <option value="standard">Standard</option>
                                <option value="vip">VIP</option>
                            </select>
                        </label>
                    </div>

                    
                    
                    <br>

                    <button class="buttonP" type='submit' name='add'>Add to cart</button>
                    <br>
                    <button class="buttonP" type='submit' name='add'><a style="color: #37474f;"href="./checkout.html">Checkout</a></button>
                </form>
            </div>
        </div>
        
        

        <script src = "../js/script.js"></script>
    </body>
</html>
