<?php

/*******w******** 
    
    Name:Pawanpreet Kaur
    Date:
    Description:

****************/

require('connect.php');
     $query = "SELECT * FROM movies ORDER BY (movie_id) DESC";

     // A PDO::Statement is prepared from the query.
     $statement = $db->prepare($query);

     // Execution on the DB server is delayed until we execute().
     $statement->execute(); 
    


    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Blockbuster Movies - Home</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Blockbuster Movies</a></h1>
        </div> 
        <ul id="menu">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="addmovies.php">Add movies</a></li>
        </ul>
        <!--loop-->

        <div id="info">
            <h1>Movies list </h1>
         <?php while ($row = $statement->fetch()): ?>
            <form method="get">
                <div class="movies_description">
                 <h2><?= $row['movie_name'] ?></h2>
                 <p><?= $row['description'] ?></p>
                  
            
                </div>
            </form>
          <?php endwhile ?>
        </div>
        <div id="footer">
            Copywrong 2023 - No Rights Reserved
        </div>
    </div>
    

</body>
</html>