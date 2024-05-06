<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact us.css" />
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
          <li><a href="#">Contact us</a></li>
        </ul>
      </nav>
    </header>
    <div class="content-container">
      <h1>Send us a message</h1>

      <form  method="post" id="form" action="contactus.php">
        <div class="form">
          <label>Last Name:<font color="red">*</font></label>
          <input class="form-field" type="text" id="last_name" name="last_name" required />
        </div>
        <div class="form">
          <label>Name:<font color="red">*</font></label>
          <input class="form-field" type="text" id="Name" name="name" required />
        </div>
        <div class="form">
          <label>E-mail:<font color="red">*</font></label>
          <input class="form-field" type="email" id="email" name="email" required />
        </div>
        <div class="form">
          <label>Repeat E-mail:<font color="red">*</font></label>
          <input class="form-field" type="email" id="email-repeat" name="email-repeat" required />
        </div>
        <div class="form">
          <label>Message:<font color="red">*</font></label
          ><br />
          <textarea id="message" name="message"></textarea>
        </div>
        <div class="bouton"><button type="submit">Send</button></div>
      </form>
    </div>
    <?php
      try{
        $db = new PDO('mysql:host=localhost;dbname=bd','root','');
        if (isset($_POST['last_name']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
        {
          $last_name=$_POST['last_name'];
          $name=$_POST['name'];
          $email=$_POST['email'];
          $message=$_POST['message'];
          
          $insert= $db->prepare('INSERT INTO contact(lastName,name,email,message) Values (:last_name,:name,:email,:message)');
          $success = $insert->execute(array( 
          ':last_name' => $last_name, 
          ':name' => $name, 
          ':email' => $email, 
          ':message' => $message, ));
          if ($success) {
            header('Location: homepage.html'); 
            exit(); 
          }} 
          unset($db); 
      }
      catch(PDOException $e) { 
        echo "ERROR: Message cannot be sent " . $e->getMessage() . "<br />"; 
        die(); 
      } 
    ?>
    <script src="contact us.js"></script>
  </body>
</html>
