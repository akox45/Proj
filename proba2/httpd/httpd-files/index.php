<!DOCTYPE html>
<html>
<head>
  <title>Egyszerű üzenet weboldal</title>
</head>
<body>
  <?php
  $servername = "10.244.0.10";
  $username = "myuser";
  $password = "mypassword";
  $dbname = "mydatabase";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Hiba a : " . $conn->connect_error);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST["message"];

    $sql = "INSERT INTO messages (message) VALUES ('$message')";
    if ($conn->query($sql) === TRUE) {
      echo "Az üzenet sikeresen hozzáadva.";
    } else {
      echo "Hiba az üzenet hozzáadásakor: " . $conn->error;
    }
  }

  $sql = "SELECT message FROM messages";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<h2>Üzenetek:</h2>";
    while($row = $result->fetch_assoc()) {
      echo "<p>" . $row["message"] . "</p>";
    }
  } else {
    echo "Nincsenek üzenetek.";
  }

  $conn->close();
  ?>

  <h2>Új üzenet hozzáadása:</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="text" name="message">
    <input type="submit" value="Küldés">
  </form>
</body>
</html>
