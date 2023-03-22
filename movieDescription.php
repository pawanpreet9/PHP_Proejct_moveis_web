<?php
/*******w******** 
    
    Name:Pawanpreet Kaur
    Date:03-02-2023
    Description:Html and php code to view the specific full blog post.

****************/
require('connect.php');
require('authenticate.php');
    // Build and prepare SQL String with :id placeholder parameter.
    $query = "SELECT * FROM movies WHERE movie_id = :id LIMIT 1";
    $statement = $db->prepare($query);
    
    // Sanitize $_GET['id'] to ensure it's a number.
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    // Bind the :id parameter in the query to the sanitized
    // $id specifying a binding-type of Integer.
    $statement->bindValue('id', $id, PDO::PARAM_INT);
    $statement->execute();
    
    // Fetch the row selected by primary key id.
    $row = $statement->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="main.css">
	<title>Blockbuster Movies - <?= $row['movie_name'] ?></title>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<h1><a href="index.php">Blockbuster movies</a></h1>
		</div>
		<ul id="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="addmovies.php">Add movies</a></li>
		</ul>
		<div id="all_blogs">
			<div class="blog_post">
				<h2><?= $row['movie_name'] ?></h2>
				<p>
					<small>
						<?= $row['description']?> - 
						 
					</small>
				</p>
				<p>More Info</p>
				<div class="blog_content">
					<ul><li>Language:<?= $row['language'] ?></li>
						<li>Actors:<?= $row['actor_names'] ?></li>
						
					</ul>
				</div>

			</div>

			
		</div> 
		<div id="footer"><a href="index.php"><pre>Home</pre></a>
			<a href="addmovies.php"><pre>Add movies</pre></a>

		</div>
	</div>


</body>
</html>
