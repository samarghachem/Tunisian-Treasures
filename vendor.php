<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Become a vendor</title>
    <link rel="stylesheet" href="vendor.css" />
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="homepage.html">Home</a></li>
          <li><a href="aboutus.html">About us</a></li>
          <li><a href="login.html">Login</a></li>
          <li><a href="productss.html">Products</a></li>
          <li><a href="artisans.html">Our artisans</a></li>
          <li><a href="contactus.php">Contact us</a></li>
        </ul>
      </nav>
    </header>
    <div class="content-container">
      <h1>Join our vendors comumunity!</h1>
      <form method="post" id="form" action="vendor.php">
        <div class="form">
          <label>Last Name:<font color="red">*</font></label>
          <input type="text" id="lastName" name="lastName" required />
        </div>
        <div class="form">
          <label>Name:<font color="red">*</font></label>
          <input type="text" id="name" name="name" required />
        </div>
        <div class="form">
          <label>E-mail:<font color="red">*</font></label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="form">
          <label>CIN:<font color="red">*</font></label>
          <input type="text" id="CIN" name="CIN" required />
        </div>
        <div class="form">
          <label>Password:<font color="red">*</font></label>
          <input type="password" id="password" minlength="8" required />
        </div>
        <div class="bouton"><button type="submit">Register</button></div>
      </form>
    </div>
    <?php
      try{
          $db = new PDO('mysql:host=localhost;dbname=bd','root','');
          if (isset($_POST['lastName']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['CIN']))
          {$lastName=$_POST['lastName'];
          $name=$_POST['name'];
          $email=$_POST['email'];
          $CIN=$_POST['CIN'];
          
          
          $insert= $db->prepare('INSERT INTO vendeurs (lastName,name,email,CIN) Values (:lastName,:name,:email,:CIN)');
          $success = $insert->execute(array(
            ':lastName' => $lastName,
            ':name' => $name,
            ':email' => $email,
            ':CIN' => $CIN,
            ));
          if ($success) {
            header('Location: homepage.html');
            exit();
          }}
          unset($db);
      } 
      catch(PDOException $e) {
          echo "ERROR: Vendor cannot be added " . $e->getMessage() . "<br/>";
          die();
      }
    ?>
    <script src="vendor.js"></script>
  </body>
</html>
