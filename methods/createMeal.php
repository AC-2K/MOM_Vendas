<?php
    session_start();
    include 'crudMethods.php';;
    include 'CSRF_methods.php';
    include 'DB.php';

  
    $nome = $_POST['nameMeal'];
    $quantidade = $_POST['quantityMeal'];

    $csrfToken = $_POST['csrf_tokenCreateMeal'];


    try {

        if (!verifyCsrfTokenCreateMeal($csrfToken)) {
            throw new Exception("Invalid CSRF token.", 1);
        }
        
        $conn->begin_transaction();

        //Definir ID do prospect
        $ID = "MEAL".trim(preg_replace('/\s+/', '', $nome)).substr(md5(time() . rand()), 0, 15);
 
        $sql = "INSERT INTO refeicao (id, nome, preco) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi",$ID, $nome, $quantidade);
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
