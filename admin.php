<?php

/*******w******** 
    
    Name:Pawanpreet Kaur
    Date:
    Description:

****************/

require('connect.php');
require('authenticate.php');
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
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <title>Blockbuster Movies - Admin</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Blockbuster Movies</a></h1>
        
        <ul id="menu">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="addmovies.php">Add movies</a></li>
        </ul>
    </div>
        <!--loop-->

        <div id="info">
            <h1>Movies list </h1>
         <?php while ($row = $statement->fetch()): ?>
            <form method="get">
                <div class="movies_description">
                 <a href="movieDescription.php?id=<?= $row['movie_id'] ?>"><h2><?= $row['movie_name'] ?><a href="editmovies.php?id=<?= $row['movie_id'] ?>" id="edit"> edit</a></h2></a>
                 <p><?= $row['description'] ?></p>
                 <ul>

                    
                    <li>Directed by: <?= $row['director_names'] ?></li>
                    <li>Actors: <?= $row['actor_names'] ?> </li>
                    <li>Language: <?= $row['language'] ?></li>
                    <li>Price: <?= $row['price'] ?></li>
                 </ul>
                  
            
                </div>
            </form>
          <?php endwhile ?>
        </div>
        <div id="footer">
            <a href="index.php"><pre>Home</pre></a>
            <a href="admin.php"><pre>Admin</pre></a>
        </div>
    </div>
    

</body>
</html>