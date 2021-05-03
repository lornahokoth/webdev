<!DOCTYPE html>
    <head>
        <title>
            M&M | Parking
        </title>

        <link rel="stylesheet" href="../css/style.css">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    </head>
    <body class="parkB">
        <header>
            <h1 class="logo"><a href="./index.html">miles&miles</a></h1>
            <h1 class="cart">
                <a href="./cart.php">
                    <ion-icon name="basket"></ion-icon>
                </a>
            </h1>
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

            <div class="topP">
                <label class="parkP" style="font-size: 2em; margin-right: 335px;">Standard</label>
                <label class="parkP" style="font-size: 2em; margin-right: 450px;">$7</label>
                <button class="buttonP" onclick="setStoragePStand();" type='submit' id='standard'>Add to cart</button>
            </div>
            <div class="botP">
                <label class="parkP" style="font-size: 2em; margin-right: 400px;">VIP</label>
                <label class="parkP" style="font-size: 2em; margin-right: 450px; ">$15</label>
                <button class="buttonP" onclick="setStoragePVIP();" type='submit' id='vip'>Add to cart</button>
            </div>




            <!-- unused html for ticket selection that would work with the database 
                
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
            </div> -->
        </div>
        
        
        <script src = "https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        <script src = "../js/script.js"></script>
    </body>
</html>
