<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pottery Workshop</title>
    <link rel="stylesheet" href="workshop.css" />
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
      <h1>Pottery Workshop Form</h1>
      <br />
      <div class="information">
        <form
          id="form"
          method="post"
          action="workshop.php"
        >
          <p>
            Ensi's Pottery Workshop warmly invites ENSI students/Staff to dive
            into a world of artistry and innovation. We're excited to offer you
            an opportunity to engage with the intricate art of pottery,
            celebrating both its rich heritage and modern adaptations. Every
            piece of clay art reflects a journey of meticulous skill and
            creative passion. Participate in our hands-on workshop to learn
            diverse pottery techniques, from age-old methods to modern
            approaches. Are you eager to express your artistic side? Reserve
            your place in our exclusive workshop now by completing the
            registration form below!
          </p>
          <p>
            Ready to unleash your creativity? Secure your spot at our exclusive
            workshop by filling out the form below!
          </p>
          <br />
          <br />
          <label>First Name :<font color="red">*</font></label>
          <input id="firstName" type="text" name="Name" required />
          <label>Last Name :<font color="red">*</font></label>
          <input id="lastName" type="text" name="Last_name" required />
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

            $insert = $db->prepare('INSERT INTO participants_workshop (Name, Last_name, Email, Phone_number) VALUES (:Name, :Last_name, :Email, :Phone_number)');

            $success =$insert->execute(array(
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
    <script src="workshop.js"></script>
  </body>
</html>
