
<?php
/**
 * Name: Pawanpreet Kaur
 * Project
 * Description:
 * */

  /*define('ADMIN_LOGIN','employee');

  define('ADMIN_PASSWORD','mypass');

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])

      || ($_SERVER['PHP_AUTH_USER'] != ADMIN_LOGIN)

      || ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD)) {

    header('HTTP/1.1 401 Unauthorized');

    header('WWW-Authenticate: Basic realm="Our Blog"');

    exit("Access Denied: Username and password required.");

  }
  $sql = "SELECT admin_id,user_name,password FROM admin WHERE user_name = :username";
  $stmt = $db->prepare($sql);

  $stmt->bindValue(':username',$username);
*/
 
define('BASEPATH', true); 
require 'connect.php'; 

if(isset($_POST['submit'])){  
        
            $dsn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //ensure fields are not empty
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //Retrieve the user account information for the given username.
    $query = "SELECT admin_id, user_name, password FROM admin WHERE user_name = :username";
    $statement = $db->prepare($query);
   
    $statement->bindValue(':username', $username);
    
    
    $statement->execute();
    
    
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    
  
    if($user === false){
       echo '<script>alert("invalid username or password")</script>';
    } else{
         
        $validPass = password_verify($passwordAttempt, $row['password']);
        
        //If $validPassword is TRUE, the login is done.
        if($validPass){
            
           
             
            $_SESSION['admin'] = $username;
           echo '<script>window.location.replace("admin.php");</script>';
            exit;
            
        } else{
            //$validPassword was FALSE. Passwords do not match.
            echo '<script>alert("invalid username or password, Please Try again")</script>';
        }
    }
    
}

   

?>
<form action="authenticate.php" method="post">                          
 <input type="text" name="username" placeholder="Username">
 <input type="password" name="password" placeholder="Password">    
 <button name="submit" type="submit">sign in</button>
 </form>
