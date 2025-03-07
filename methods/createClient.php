<?php
    session_start();
    include 'crudMethods.php';;
    include 'CSRF_methods.php';
    include 'DB.php';

  
    $nome = $_POST['nameClient'];
    $localizacao = $_POST['locationClient'];
    $contacto = $_POST['contactClient'];
    $mail = $_POST['mailClient'];
    $tipo = $_POST['typeClient'];

    $csrfToken = $_POST['csrf_tokenCreateDeliveryClient'];


    try {

        if (!verifyCsrfTokenCreateDeliveryClient($csrfToken)) {
            throw new Exception("Invalid CSRF token.", 1);
        }
        
        $conn->begin_transaction();

        //Definir ID do prospect
        $ID = "CLI".trim(preg_replace('/\s+/', '', $nome)).substr(md5(time() . rand()), 0, 15);
 
        $sql = "INSERT INTO delivery_client (id, nome, localizacao, contacto, mail, tipo) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss",$ID, $nome, $localizacao, $contacto, $mail, $tipo);
        if (!$stmt->execute()) {
            error_log('Insert into database failed: ' . $conn->error);
        }

        $conn->commit();
        $conn->close();

        // Redirect on success
        $result = array('0');
        header('Content-Type: application/json');
        echo json_encode($result);
    } catch (Throwable $th) {
        // Rollback transaction on error
        $conn->rollback();
        $conn->close();

        // Display error message
        $result = array('1');
        header('Content-Type: application/json');
        echo json_encode($result);
    }
