<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'hashsignup';

    //SETTING UP DSN
    $dsn = 'mysql:host='.$host.';dbname='.$dbname;

    //CREATING PDO INSTANCE
    $pdo = new PDO ($dsn,$user,$pass);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);  
    $hash = password_hash($password,PASSWORD_BCRYPT,array('cost'=>11));
    if(!empty($username)&&!empty($password)){
        
            //PREPARED STATEMENTS USING NAMED PARAMS METHOD
            $sql = 'INSERT INTO userdata(username,password) VALUES (:username,:password)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username'=>$username,'password'=>$hash]);
    
            echo ("asdas");
        }
    
    else{
        header("Location: ../register.html");
    }

?>