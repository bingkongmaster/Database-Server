<?php

//display table rows
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";

//$sql = "SELECT JokeID, Joke_question, Joke_answer, users_id FROM Jokes_table";
$sql = "
  SELECT JokeID, Joke_question, Joke_answer, users_id, username
  FROM Jokes_table
  JOIN users ON users.id = jokes_table.users_id";

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<h3>Question: " . $row["Joke_question"]. "<br>Answer: " . $row["Joke_answer"]. "<br></h3>";
    echo "<div><p>By: $row[username] <br>ID: $row[users_id]<br></p></div>";
  }
} else {
  echo "0 results";
}

?>
