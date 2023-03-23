<?php

/*******w******** 
    
    Name:Pawanpreet Kaur
    Date:
    Description:
****************/

require('connect.php');
require('authenticate.php');

    // UPDATE quote if author, content and id are present in POST.
    if ($_POST && !empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['id'])&& isset($_POST['button1'])) {
        // Sanitize user input to escape HTML entities and filter out dangerous characters.
        $name  = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id      = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $language     = filter_input(INPUT_POST, 'language', FILTER_SANITIZE_NUMBER_INT);
        $actors = filter_input(INPUT_POST,'actors',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $directors     = filter_input(INPUT_POST, 'directors', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price     = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
        
        $query     = "UPDATE movies SET movie_name = :name, description = :description,language = :language,actor_names = :actors,director_names = :directors,price = :price WHERE movie_id = :id";

        
        $statement = $db->prepare($query);

        $statement->bindValue(':name', $name);        
        $statement->bindValue(':description', $description);
        $statement->bindValue(':language',$language);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->bindValue(':actors',$actors);
        $statement->bindValue(':directors',$directors);
        $statement->bindValue(':price',$price);
        
       $statement->execute();

      // $row = $statement->fetch();
        
        // Redirect after update.
        header("Location: admin.php");
        exit;
    } else if (isset($_GET['id'])) { 
    // Retrieve quote to be edited, if id GET parameter is in URL.
        // Sanitize the id. Like above but this time from INPUT_GET.
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        
        // Build the parametrized SQL query using the filtered id.
        $query = "SELECT * FROM movies WHERE movie_id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
        // Execute the SELECT and fetch the single row returned.
        $statement->execute();
        $row = $statement->fetch();
    } else {
        $id = false; // False if we are not UPDATING or SELECTING.
}
    // DELETE quote if author, content and id are present in POST.
    if ($_POST && isset($_POST['button2']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['id'])) {
        // Sanitize user input to escape HTML entities and filter out dangerous characters.
        $name  = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id      = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $language     = filter_input(INPUT_POST, 'language', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $query     = "DELETE FROM movies WHERE movie_id = :id";

        
        $statement = $db->prepare($query);

       // $statement->bindValue(':title', $title);        
      // $statement->bindValue(':content', $content);
      // $statement->bindValue(':currentTime',$currentTime);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        
       $statement->execute();

       $row = $statement->fetch();
        
        // Redirect after update.
        header("Location: admin.php");
        exit;
    }


function confirm(){
    return confirm("Are you sure to delete this post!!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Blockbuster Movies - Editing <?= $row['movie_name'] ?></title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">Blockbuster Movies - Edit</a></h1>
        
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="admin.php">Admin</a></li>
        </ul>
    </div>
        <div id="all_movies">
            <form method="post">
                <fieldset>
                    <legend>Edit Movie Details</legend>
                    <p>
                        <label for="name">Movie Name</label>
                        <input type="text" name="name" value="<?= $row['movie_name'] ?>" id="name">
                    </p>
                        <p>
                            <label for="description">Description</label>
                            <input type="text" name="description" value="<?= $row['description'] ?>" id="description">
                        </p>
                        <p>
                            <label for="language">language</label>
                            <input type="text" name="language" value="<?= $row['language'] ?>" id="language">
                        </p>
                        <p>
                            <label for="actors">Actor</label>
                            <input type="text" name="actors" value="<?= $row['actor_names'] ?>" id="actors">
                        </p>
                        <p>
                            <label for="directors">Directed by</label>
                            <input type="text" name="directors" value="<?= $row['director_names'] ?>" id="directors">
                        </p>
                        <p>
                            <label for="price">Price</label>
                            <input type="text" name="price" value="<?= $row['price'] ?>" id="price">
                        </p>


                        <input type="hidden" name="id" value="<?= $row['movie_id'] ?>">
                        <input type="submit" name="button1" value="Update" >
                        <input type="submit" name="button2" value="Delete" onclick="confirm()">
                        
                </fieldset>

            </form>
            <?php if((empty($_POST['name']) || empty($_POST['description']))&&isset($_POST['button1'])): ?>
            <p id="error"><b>An error ouccured while proceding</b><br>**There should be at least on character in title and content to update the given post**</p>
            <a href="admin.php">Return to home</a>
        <?php endif ?>
        
    </div>
        <div id="footer">
            <a href="index.php"><pre>Home</pre></a>
            <a href="admin.php"><pre>Admin</pre></a>
        </div>
</div>

    
</body>
</html>