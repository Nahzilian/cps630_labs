<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Art Work Database</title>
  <link rel="stylesheet" href="./stylesheets/index.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
  <?php
  $genre = $_GET['genre'] ?? NULL;
  $type = $_GET['type'] ?? NULL;
  $spec = $_GET['specification'] ?? NULL;
  $year = $_GET['year'] ?? NULL;
  $muse = $_GET['name'] ?? NULL;
  if (!is_null($genre) && !is_null($type) && !is_null($spec) && !is_null($year) && !is_null($muse)) {
    $artwork[] = array($genre, $type, $spec, $year, $muse);
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "test";

    $sqldata = "SELECT gerne,typeof,specification,art_year,artname FROM art_work";

    $sql = "CREATE TABLE art_work (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      gerne VARCHAR(30) NOT NULL,
      typeof VARCHAR(30) NOT NULL,
      specification VARCHAR(50),
      art_year VARCHAR(30),
      artname VARCHAR(30) NOT NULL
  )";

    $format = "INSERT INTO %s (gerne,typeof,specification,art_year,artname) VALUES ('%s','%s','%s','%s','%s')";

    $sqlInsert = sprintf($format, "art_work", strval($genre), strval($type), strval($spec), strval($year), strval($muse));
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    if ($conn->query($sqldata) === TRUE) {
      if ($conn->query($sqlInsert) === TRUE) {
        echo "Added successfuly";
      } else {
        echo "Failed to add";
      }
    } else {
      if ($conn->query($sql) === TRUE) {
        echo "Table Student Records created successfully";
      } else {
        echo "Error creating table: " . $conn->error;
      }
      if ($conn->query($sqlInsert) === TRUE) {
        echo "Added successfuly";
      } else {
        echo "Failed to add " . $conn->error;
      }
      echo $sqlInsert;
    }

    $conn->close();
  }


  ?>

  <h1>Art Work Database</h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

  <form method="get">
    <label for="genre">Genre</label>
    <select class="genre" name="genre">
      <option value="abstract">Abstract</option>
      <option value="baroque">Baroque</option>
      <option value="gothic">Gothic</option>
      <option value="renaissance">Renaissance</option>
    </select>
    <label for="type">Type</label>
    <select class="type" name="type">
      <optgroup label="Painting">
        <option value="landscape">Landscape</option>
        <option value="portrait">Portrait</option>
      </optgroup>
      <option value="sculpture">Sculpture</option>
    </select>
    <label for="specification">Specification</label>
    <select class="specification" name="specification">
      <option value="commercial">Commercial</option>
      <option value="none-commercial">None-commercial</option>
      <option value="deritive work">Derivitive Work</option>
      <option value="nonne-deritive work">None-Derivitive Work</option>
    </select>
    <label for="year">Year</label>
    <input class="year" type="datetime" name="year" value="">
    <label for="name">Museum</label>
    <input class="muse" type="text" name="name" value="">
    <div class="container">
      <input class="save" type="submit" value="save">
      <input type="submit" name="submit" value="clear">
    </div>
  </form>
  <div class="records">
    <table>
      <thead>
        <th>Genre</th>
        <th>Type</th>
        <th>Specification</th>
        <th>Year</th>
        <th>Museum</th>
        <th></th>
      </thead>
      <tbody>
        <?php if (isset($_GET['submit']))
          unset($artwork);
        ?>

        <?php

        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "test";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sqldata = "SELECT id,gerne,typeof,specification,art_year,artname FROM art_work";
        $result = $conn->query($sqldata);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["gerne"] . "</td><td>" . $row["typeof"] . "</td><td>" . $row["specification"] . "</td><td>" . $row["art_year"] . "</td><td>" . $row["artname"] . "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td></tr>";
            
          }
        } else {
          echo "0 results";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

  <script type="text/javascript">
    $('.save').click(() => {
      var genre = $('.genre').val();
      var type = $('.type').val();
      var spec = $('.specification').val();
      var year = $('.year').val();
      var muse = $('.muse').val();
      // Construct URLSearchParams object instance from current URL querystring.
      //var queryParams = new URLSearchParams(window.location.search);

      // Set new or modify existing parameter value.
      // queryParams.set("genre", genre);
      // queryParams.set("type", type);
      // queryParams.set("spec", spec);
      // queryParams.set("year", year);
      // queryParams.set("muse", muse);

      // Replace current querystring with the new one.
      // history.replaceState(null, null, "?"+queryParams.toString());

      // createCookie("genre", genre);
      // createCookie("type", type);
      // createCookie("spec", spec);
      // createCookie("year", year);
      // createCookie("muse", muse);
    });

    function createCookie(name, value, days) {
      var expires;
      if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
      } else {
        expires = "";
      }
      document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
    }
  </script>
</body>

</html>