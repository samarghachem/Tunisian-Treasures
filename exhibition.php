<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Exhibition</title>
    <link rel="stylesheet" href="exhibition.css" />
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="homepage.html">Home</a></li>
        </ul>
      </nav>
    </header>
    <div class="container">
      <h1>Exhibition Form</h1>
      <br />
      <div class="information">
        <form
          id="form"
          method="post"
          action="exhibition.php"
        >
          <p>
            Ensi's Artisanal Exhibition extends a special invitation to ENSI
            students, inviting you to immerse yourself in a celebration of
            handmade craftsmanship. Each piece tells a story of dedication and
            creativity, offering a unique insight into the world of artisanal
            treasures. Join us to explore this curated collection, showcasing
            the beauty of traditional and contemporary craftsmanship.
          </p>
          <p>
            Ready to be a part of this unforgettable experience? Fill out the
            form below and secure your spot at our event!
          </p>
          <br />
          <br />
          <label>First Name :<font color="red">*</font></label>
          <input
            id="firstName"
            type="text"
            name="Name"
            required
            placeholder="First Last"
          />
          <label>Last Name :<font color="red">*</font></label>
          <input
            id="lastName"
            type="text"
            name="Last_name"
            required
            placeholder="First Last"
          />
          <label>Email :<font color="red">*</font></label>
          <input
            type="email"
            id="email"
            name="Email"
            required
            placeholder="first.last@ensi-uma.tn"
          />
          <label>Phone Number :<font color="red">*</font></label>
          <input
            id="phone-number"
            type="tel"
            name="Phone_number"
            required
            placeholder="XX XXX XXX"
          />
          
          <br />
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>
    <?php
      try {
          $db = new PDO('mysql:host=localhost;dbname=bd', 'root', '');
          if (isset($_POST['Name']) && isset($_POST['Last_name']) && isset($_POST['Email']) && isset($_POST['Phone_number'])) {
              $Name = $_POST['Name'];
              $Last_name = $_POST['Last_name'];
              $Email = $_POST['Email'];
              $Phone_number =$_POST['Phone_number'];

              $insert = $db->prepare('INSERT INTO participants_exhibition (Name, Last_name, Email, Phone_number) VALUES (:Name, :Last_name, :Email, :Phone_number)');

              $success = $insert->execute(array(
                  ':Name' => $Name,
                  ':Last_name' => $Last_name,
                  ':Email' => $Email,
                  ':Phone_number' => $Phone_number
              ));
              if ($success) {
                header('Location: homepage.html');
                exit();
              }
          } 
          unset($db);
      } catch (PDOException $e) {
          echo "Error: Unable to register participant " . $e->getMessage() . "<br/>";
          die();
      }
    ?>
    <script src="exhibition.js"></script>
  </body>
</html>
