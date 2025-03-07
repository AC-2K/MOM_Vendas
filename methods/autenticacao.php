
<?php
    // Start the session
    session_start();
    $link = mysqli_connect('localhost','root','','food');
  
    
    $user = $_POST['eco'];
    $pass = $_POST['first'];


    $_SESSION["usuario"] = 0;

      
    $stmt = $link->prepare(" SELECT * from user where `name` = ?");
    $stmt->bind_param("s", $user);


    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];
    $data = $result->fetch_all(MYSQLI_ASSOC);  
          
        if (mysqli_num_rows($result) == 1) {
            foreach($data as $datas){    
                $hashed_password = $datas['pass'];
                if(password_verify($pass, $hashed_password)) {
                    $_SESSION["usuario"] = $datas['id'];
                    $link->close();

                    $userInfo = array('1',$datas['name']);
                    echo json_encode($userInfo); ;
                    exit; 
                }
            }
        }

        
    if ( mysqli_num_rows($result) > 1 ||  mysqli_num_rows($result) == 0 ) {
        $userInfo = array('0');
        echo json_encode($userInfo);
        exit;
    }
?>

