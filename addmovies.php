<?php

/*******w******** 
    
    Name:Pawanpreet Kaur
    Date:
    Description:

****************/

require('connect.php');
require('authenticate.php');
    if ($_POST && !empty($_POST['name']) && !empty($_POST['description'] && !empty($_POST['language']))) {
        //  Sanitize user input to escape HTML entities and filter out dangerous characters.
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $language = filter_input(INPUT_POST,'language',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $actors = filter_input(INPUT_POST,'actors',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $directors = filter_input(INPUT_POST,'directors',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST,'price',FILTER_SANITIZE_NUMBER_INT);
        
        //  Build the parameterized SQL query and bind to the above sanitized values.
            $query = "INSERT INTO movies (movie_name,description,language,actor_names,director_names,price) VALUES (:name,:description,:language,:actors,:directors,:price)";
            $statement = $db->prepare($query);
        
        //  Bind values to the parameters
           $statement->bindValue(':name',$name);
           $statement->bindValue(':description',$description);
           $statement->bindValue(':language',$language);
           $statement->bindValue(':actors',$actors);
           $statement->bindValue(':directors',$directors);
           $statement->bindValue(':price',$price);
        
        //  Execute the INSERT.
        //  execute() will check for possible SQL injection and remove if necessary
           if ($statement->execute()) {
               // code...
            echo "Success";
            header("Location: admin.php");
           }


    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <title>Blockbuster Movies - Add a new movie</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Blockbuster Movies</a></h1>    
        
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="admin.php" class="active">Admin</a></li>

        </ul>
    </div>
        <div>
            <form action="addmovies.php" method="post">
                <fieldset>
                    <legend>New Movie Information</legend>
                    <p>
                        <label for="name">Movie Name</label>
                        <input type="text" name="name" id="name">
                    </p>
                    <p>
                        <label for="description">Description</label>
                        <textarea name="description" id="description"></textarea>
                    </p>
                    <p>
                        <label for="language">Language</label>
                        <textarea name="language" id="language"></textarea>
                    </p>
                    <p>
                        <label for="actors">Actors</label>
                        <textarea name="actors" id="actors"></textarea>
                    </p>
                    <p>
                        <label for="directors">Directed By</label>
                        <textarea name="directors" id="directors"></textarea>
                    </p>
                    <p>
                        <label for="price">Price</label>
                        <textarea name="price" id="price"></textarea>
                    </p>
                    <button name="button" type="submit">Create</button>
                </fieldset>
            </form>
            <?php if(isset($_POST['button']) && (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['language']))): ?>
                <p id="error">**There should be at least one character in movie name and description**</p>
            
        <?php endif ?>
        </div>

    
    <div id="footer">
        <a href="index.php"><pre>Home</pre></a>
            <a href="admin.php"><pre>Admin</pre></a>
    </div>
</div>
    
</body>
</html>
