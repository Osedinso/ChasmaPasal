<?php

include ('config.php');

session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login_Page.php');
}

//save and insert information into database
if(isset($_POST['submit_btn'])){
    $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    $lName = mysqli_real_escape_string($conn, $_POST['lName']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $street2 = mysqli_real_escape_string($conn, $_POST['street2']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $cCard = mysqli_real_escape_string($conn, $_POST['cCard']);
    $cardNo =  mysqli_real_escape_string($conn, md5($_POST['cardNumber']));
    $cardMonth = mysqli_real_escape_string($conn, $_POST['cardMonth']);
    $cardYr = mysqli_real_escape_string($conn, $_POST['cardYear']);
    $csc = mysqli_real_escape_string($conn, md5($_POST['csc']));
    $placed_on = date('d-M-Y');

    $query = "INSERT INTO payments (fName, lName, street, street2, city, state, zip, country, phone, cCard, cardNo, cardMonth, cardYr, csc, placed_on) 
    VALUES ('$fName', '$lName', '$street', '$street2', '$city', '$state', '$zip', '$country', '$phone', '$cCard', '$cardNo', '$cardMonth', '$cardYr', '$csc', '$placed_on')";

if(mysqli_query($conn, $query)){
    echo "Data inserted successfully.";
} else{
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
}

// Display the entered information
if(isset($_POST['submit_btn'])){
    echo "<h2>Payment Information</h2>";
    echo "<p>First Name: " . $_POST['fName'] . "</p>";
    echo "<p>Last Name: " . $_POST['lName'] . "</p>";
    echo "<p>Street Address: " . $_POST['street'] . "</p>";
    if(!empty($_POST['street2'])){
        echo "<p>Street Address (2): " . $_POST['street2'] . "</p>";
    }
    echo "<p>City: " . $_POST['city'] . "</p>";
    echo "<p>State: " . $_POST['state'] . "</p>";
    echo "<p>Zip: " . $_POST['zip'] . "</p>";
    echo "<p>Country: " . $_POST['country'] . "</p>";
    echo "<p>Phone: " . $_POST['phone'] . "</p>";
    echo "<p>Credit Card Type: " . $_POST['cCard'] . "</p>";
    echo "<p>Credit Card Number: " . $_POST['cardNumber'] . "</p>";
    echo "<p>Expiration Date: " . $_POST['cardMonth'] . "/"
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <!--
            Chasma Pasal Payment Form
            Author: Fusion
            Date:   03/25/2023

            Filename:   Chasma_Pasal_Glasses_Payment.html

        -->
        <meta charset="UTF-8">
        <meta name="author" content="Fusion">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chasma Pasal Payment Form</title>
        <link href="cpg_style.css" rel="stylesheet"/>
    </head>
    <body>
        <header>
            <img src="cp_logo.png" alt="Chasma Pasal">
            <h1>Checkout</h1>
            <nav> <a id="navicon" href="#"><img src="cpg_navicon.png" alt="Three Line Menu Icon@clipartmax.com"/></a>
                <ul>
                   <li><a href=Chasma_Pasal_Glasses.html>Home</a></li>
                   <li><a href="#">My Cart</a></li>
                   <li><a href="#">My Account</a></li>
                   <li><a href="#">Contact Us</a></li>
                </ul>
            </nav>
        </header>

        <section>
            <h1>Payment Form</h1>
            <form id="payment" action="http://www.example.com/cpg/payment" method="post">
                <fieldset id="billing">
                    <legend>Billing Information (required)</legend>
                    <label for="firstBox">First Name*</label>
                    <input name="fName" id="firstBox" type="text" required>
                    <label for="lastBox">Last Name*</label>
                    <input name="lName" id="lastBox" type="text" required>
                    <label for="streetBox">Street Address*</label>
                    <input name="street" id="streetBox" type="text" required>
                    <label for="streetBox2">Street Address (2)</label>
                    <input name="street2" id="streetBox2" type="text">
                    <label for="cityBox">City*</label>
                    <input name="city" id="cityBox" type="text" required>
                    <label for="stateBox">State*</label>
                    <input name="state" id="stateBox" type="text" list="stateList" required>
                    <datalist id="stateList">
                        <option value="AL">
                        <option value="AK">
                        <option value="AZ">
                        <option value="AR">
                        <option value="CA">
                        <option value="CO">
                        <option value="CT">
                        <option value="DE">
                        <option value="FL">
                        <option value="GA">
                        <option value="HI">
                        <option value="ID">
                        <option value="IL">
                        <option value="IN">
                        <option value="IA">
                        <option value="KS">
                        <option value="KY">
                        <option value="LA">
                        <option value="ME">
                        <option value="MD">
                        <option value="MI">
                        <option value="MN">
                        <option value="MS">
                        <option value="MO">
                        <option value="MT">
                        <option value="NE">
                        <option value="NV">
                        <option value="NH">
                        <option value="NJ">
                        <option value="NM">
                        <option value="NY">
                        <option value="NC">
                        <option value="ND">
                        <option value="OH">
                        <option value="OK">
                        <option value="OR">
                        <option value="PA">
                        <option value="RI">
                        <option value="SC">
                        <option value="SD">
                        <option value="TN">
                        <option value="TX">
                        <option value="UT">
                        <option value="VT">
                        <option value="VA">
                        <option value="WA">
                        <option value="WI">
                        <option value="WV">
                        <option value="WY">
                    </datalist>
                    <label for="zipBox">ZIP/Postal Code</label>
                    <input name="zip" id="zipBox" type="text" pattern="^\d{5}(-\d{4})?$">
                    <label for="countryBox">Country*</label>
                    <input name="country" id="countryBox" type="text" value="United States" required>
                    <label for="phoneBox">Phone*</label>
                    <input name="phone" id="phoneBox" type="tel" 
                    pattern="^\d{10}$|^(\(\d{3}\)\s*)?\d{3}[\s-]?\d{4}$" required>
                </fieldset>
                <fieldset id="creditCard">
                    <legend>Credit Card (required)</legend>
                    <fieldset>
                        <label class="cardLabel" for="cAmex">
                            <input name="cCard" id="cAmex" type="radio" value="amex" required>
                            <img src="cpg_amex.png" alt="American Express"/>
                            
                        </label>
                        <label class="cardLabel" for="cDiscover">
                            <input name="cCard" id="cDiscover" type="radio" value="dicover" required>
                            <img src="cpg_discover.png" alt="Discover Card"/>
                            
                        </label>
                        <label class="cardLabel" for="cMaster">
                            <input name="cCard" id="cMaster" type="radio" value="master" required>
                            <img src="cpg_master.png" alt="Master Card"/>
                            
                        </label>
                        <label class="cardLabel" for="cVisa">
                            <input name="cCard" id="cVisa" type="radio" value="visa" required>
                            <img src="cpg_visa.png" alt="Visa"/>
                            
                        </label>
                    </fieldset>
                    <label for="cardBox">Credit Card Number</label>
                    <input name="cardNumber" id="cardBox" type="text"
                    pattern="^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$" required>
                    <label for="monthList">Expiration Date</label>
                    <select name="cardMonth" id="monthList" required>
                        <option value="">--Month--</option>
                        <option value=1>January(01)</option>
                        <option value=2>February(02)</option>
                        <option value=3>March(03)</option>
                        <option value=4>April(04)</option>
                        <option value=5>May(05)</option>
                        <option value=6>June(06)</option>
                        <option value=7>July(07)</option>
                        <option value=8>August(08)</option>
                        <option value=9>September(09)</option>
                        <option value=10>October(10)</option>
                        <option value=11>November(11)</option>
                        <option value=12>December(12)</option>
                    </select>
                    <select name="cardYear" id="yearList" required>
                        <option value="">--Year--</option>
                        <option value=2023>2023</option>
                        <option value=2024>2024</option>
                        <option value=2025>2025</option>
                        <option value=2026>2026</option>
                        <option value=2027>2027</option>
                    </select>
                    <label for=cscBox>CSC</label>
                    <input name="csc" id="cscBox" type="text" pattern="^\d{3}$" maxlength="3" placeholder="nnn" required>
                    
                </fieldset>
                <button name="submit_btn" type="submit">
                    <img src="submit.png" alt="submit button" width="100px">
                </button>
            </form>
            
        </section>
        <script>
            // Display an alert message when the form is submitted
            const form = document.getElementById("payment");
            form.addEventListener("submit", function(event) {
                event.preventDefault();
                alert("Thank you for your payment!");
                location.reload(true);
            });
        </script>

    </body>
</html>