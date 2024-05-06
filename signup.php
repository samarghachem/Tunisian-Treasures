<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Your Account</title>
    <link rel="stylesheet" href="signup.css" />
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
      <h1>Create Your Account</h1>
      <form method="post" id="form" action="signup.php">
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
          <label>Confirm E-mail:<font color="red">*</font></label>
          <input type="email" id="confirmEmail" required />
        </div>
        <div class="form">
          <label>Password:<font color="red">*</font></label>
          <input type="password" id="password" minlength="8" required />
        </div>
        <div class="form">
          <label>Confirm Password:<font color="red">*</font></label>
          <input type="password" id="confirmPassword" minlength="8" required />
        </div>

        <div class="form">
          <input type="checkbox" id="agree" />
          <label>I agree to the terms and conditions</label>
        </div>

        <div class="bouton"><button type="submit">Register</button></div>
      </form>
    </div>
    <?php
      try{
          $db = new PDO('mysql:host=localhost;dbname=bd','root','');
          if (isset($_POST['name']) && isset($_POST['lastName']) && isset($_POST['email']))
          {$lastName=$_POST['lastName'];
          $name=$_POST['name'];
          $email=$_POST['email'];
          
          $insert = $db->prepare('INSERT INTO utilisateurs (lastName,firstname,email) Values (:lastName,:name,:email)');
          $success = $insert->execute(array(
            ':lastName' => $lastName,
            ':name' => $name,
            ':email' => $email));

          if ($success) {
            header('Location: homepage.html');
            exit();
          }}
          unset($db);
      } 
      catch(PDOException $e) {
          echo "Error: Unable to register participant " . $e->getMessage() . "<br/>";
          die();
      }
    ?>

    <script src="signup.js"></script>
  </body>
</html>
