<?php

include "db_connect.php";
$keywordfromform = $_GET["keyword"];

//Search database for key word
echo "<h2>Searched: $keywordfromform</h2>";
$sql = "SELECT JokeID, Joke_question, Joke_answer FROM Jokes_table WHERE Joke_question LIKE '%" . $keywordfromform . "%'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["JokeID"]. " - Name: " . $row["Joke_question"]. " " . $row["Joke_answer"]. "<br>";
  }
} else {
  echo "0 results";
}

?>
