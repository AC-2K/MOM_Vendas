<?php
    session_start();
    include 'crudMethods.php';;
    include 'CSRF_methods.php';
    include 'DB.php';

  
    $nome = $_POST['nameSupplier'];
    $localizacao = $_POST['locationSupplier'];
    $contacto = $_POST['contactoSupplier'];
    $mail = $_POST['emailSupplier'];
    $credito = $_POST['creditSupplier'];

    $csrfToken = $_POST['csrf_tokenCreateDeliverySupplier'];


    try {

        if (!generateCsrfTokenCreateDeliveryClient($csrfToken)) {
            throw new Exception("Invalid CSRF token.", 1);
        }
        
        $conn->begin_transaction();

        //Definir ID do prospect
        $ID = "SUPP".trim(preg_replace('/\s+/', '', $nome)).substr(md5(time() . rand()), 0, 15);
 
        $sql = "INSERT INTO delivery_supplier (id, nome, localizacao, contacto, mail, credito) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi",$ID, $nome, $localizacao, $contacto, $mail, $credito);
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
