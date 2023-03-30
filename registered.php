<?php
 define('BASEPATH',true);//access connection script if you omit this line file will be blank
require 'connect.php'; //require connection script

 if(isset($_POST['submit'])){  
        try {
            $dsn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  
         $username = $_POST['username'];
         $email = $_POST['email'];
         $password = $_POST['password'];
         
         //encrypt password
         $password = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
          
         //Check if username exists
         $query = "SELECT COUNT(user_name) AS user FROM admin WHERE user_name = :username";
         $statement = $db->prepare($query);

         $statement->bindValue(':username', $username);
         $statement->execute();
         $row = $statement->fetch(PDO::FETCH_ASSOC);

         if($row['user_name'] > 0){
             echo '<script>alert("Username already exists")</script>';
        }
        
       else{

    $statement = $dsn->prepare("INSERT INTO admin (user_name, email, password) 
    VALUES (:username,:email, :password)");
    $statement->bindParam(':username', $username);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
    
    

   if($statement->execute()){
    echo '<script>alert("Registered in blockbuster movies site")</script>';
    //redirect to another page
    echo '<script>window.location.replace("index.php")</script>';
     
   }else{
       echo '<script>alert("An error occurred")</script>';
   }
}
}catch(PDOException $e){
    $error = "Error: " . $e->getMessage();
    echo '<script type="text/javascript">alert("'.$error.'");</script>';
}
     }

?>

<form action="registered.php" method="post">
  <input type="text" required="required" name="username" placeholder="Username">
  <input required="required" type="email" name="email" placeholder="Email">
  <input required="required" type="password" name="password" placeholder="Password">                  
  <button name="submit" type="submit">register</button>
  </form>