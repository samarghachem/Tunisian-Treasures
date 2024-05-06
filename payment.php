<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout Page</title>
    <link rel="stylesheet" href="payment.css" />
  </head>
  <body>
    <header>
      <h1>Checkout</h1>
      <nav>
        <ul>
          <li><a href="homepage.html">Home</a></li>
        </ul>
      </nav>
    </header>
    <div class="container">
      <div class="order-information">
        <form id="form" method="post" action="payment.php">
          <h2>Delivery Address</h2>
          <br />
          <br />
          <label>Full Name :<font color="red">*</font></label>
          <input
            id="full-name"
            type="text"
            name="full_name"
            required
            placeholder="First Last"
          />
          <label>Email :<font color="red">*</font></label>
          <input
            type="email"
            id="email"
            name="Email"
            required
            placeholder="Example@Example.com"
          />
          <label>Address :<font color="red">*</font></label>
          <input
            id="address"
            type="text"
            name="adress"
            required
            placeholder="Street-Locality"
          />
          <label>City<font color="red">*</font></label>
          <input id="city" name="city" type="text" required placeholder="City" />
          <label>Zip Code :<font color="red">*</font></label>
          <input id="zip-code" type="text" name="zip_code" required placeholder="XXXX" />
          <br />
          <br />
          <h2>Payment</h2>
          <div class="payment-methods">
            <h4>Accepted Cards :</h4>
            <div class="payment-method">
              <img src="Ressources/visa.png" alt="Visa" />
              <p>VISA</p>
            </div>
            <div class="payment-method">
              <img src="Ressources/mastercard.png" alt="MasterCard" />
              <p>MASTER CARD</p>
            </div>
            <div class="payment-method">
              <img src="Ressources/edinar.png" alt="E-Dinar" />
              <p>E-DINAR</p>
            </div>
          </div>
          <label>Name On Card :</label>
          <input id="name-on-card" type="text" required placeholder="Name" />
          <label>Card Number:<font color="red">*</font></label>
          <input
            id="card-number"
            type="text"
            required
            placeholder="XXXX-XXXX-XXXX-XXXX"
          />
          <label>Expiry Date<font color="red">*</font></label>
          <input id="expiry-date" type="month" required />
          <label>CVV<font color="red">*</font></label>
          <input id="cvv" type="text" required placeholder="XXX" />
          <button type="submit">Pay Now</button>
        </form>
      </div>
    </div>
    <?php
      try{
          $db = new PDO('mysql:host=localhost;dbname=bd','root','');
          if (isset($_POST['full_name']) && isset($_POST['Email']) && isset($_POST['adress']) && isset($_POST['city']) && isset($_POST['zip_code']))
          {$Full_name=$_POST['full_name'];
          $Email=$_POST['Email'];
          $adress=$_POST['adress'];
          $city = $_POST['city'];
          $zip_code = $_POST['zip_code'];
          
          $insert= $db->prepare('INSERT INTO transactions (Full_name,Email,adress,city,zip_code) Values (:Full_name,:Email,:adress,:city,:zip_code)');
          $success = $insert->execute(array(
            ':Full_name' => $Full_name,
            ':Email' => $Email,
            ':adress' => $adress,
            ':city' => $city,
            ':zip_code' => $zip_code
          ));
          if ($success) {
            header('Location: homepage.html');
            exit();
            }}
            unset($db);}
      
      catch(PDOException $e) {
          echo "ERROR: Unable to proceed with payment : " . $e->getMessage() . "<br/>";
          die();
      }
    ?>
    <script src="payment.js"></script>
  </body>
</html>
