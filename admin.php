<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css" />
    
  </head>
  <body>
    <?php
      try {
        $db = new PDO('mysql:host=localhost;dbname=bd', 'root', '');

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $stmt = $db->prepare('DELETE FROM utilisateurs WHERE id = :id');
            $stmt->execute(['id' => $_POST['id']]);
          }

        
        $query = $db->query('SELECT * FROM utilisateurs');
        $contacts = $query->fetchAll(PDO::FETCH_ASSOC);
        unset($db);
      } catch (PDOException $e) {
        echo "ERROR: Cannot connect to database " . $e->getMessage() . "<br/>";
        die();
      }
    ?>
    
    <h2>Contact List</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
      </tr>
      <?php if (!empty($contacts)): ?>
        <?php foreach ($contacts as $contact): ?>
          <tr>
            <td><?php echo htmlspecialchars($contact['id']); ?></td>
            <td><?php echo htmlspecialchars($contact['firstname']); ?></td>
            <td><?php echo htmlspecialchars($contact['lastname']); ?></td>
            <td><?php echo htmlspecialchars($contact['email']); ?></td>
            <td>
              <form method="post" action="admin.php">
                <input type="hidden" name="id" value="<?php echo $contact['id']; ?>" />
                <button type="submit">Delete</button>
              </form>
            </td>
            
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="4">No contacts found.</td>
        </tr>
      <?php endif; ?>
    </table>
  </body>
</html>
