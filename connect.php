 <?php
    // define('DB_DSN','mysql:host=localhost;dbname=serverside;charset=utf8');
    // define('DB_USER','serveruser');
   //  define('DB_PASS','gorgonzola7!');     
       defined('BASEPATH');
     $host = 'localhost';
     $user = 'serveruser';
     $password = 'gorgonzola7!';
     $dbname = 'serverside';
     $dsn = '';  
    //  PDO is PHP Data Objects
    //  mysqli <-- BAD. 
    //  PDO <-- GOOD.
     try {
     $dsn = 'mysql:host='.$host.'$dbname='.$dbname;
         // Try creating new PDO connection to MySQL.
         $db = new PDO($dsn,$user,$password);
         //,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
     } catch (PDOException $e) {
         print "Error: " . $e->getMessage();
         die(); // Force execution to stop on errors.
         // When deploying to production you should handle this
         // situation more gracefully. ¯\_(ツ)_/¯
     }
 ?>
