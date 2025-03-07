<?php
    session_start();
    include 'crudMethods.php';
    include 'CSRF_methods.php';
    include 'DB.php';

    $meeting = json_decode($_POST['listaInsercao'],true);
    // Enable detailed SQL error reporting
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    $csfr = $meeting['csfr'];
    $data = $meeting['data'];
    $date;
    
    try {
        if (!verifyCsrfTokenCreatePurchase($csfr[0] )) {
            throw new Exception("Invalid CSRF token.", 1);
        }

        foreach ($data as $item) {
            $conn->begin_transaction();
            $object = (object)$item;

            //Definir ID do prospect
            $ID = "COM".trim(preg_replace('/\s+/', '', $object->produto)).substr(md5(time() . rand()), 0, 15);
            $data = $object->data;
            if($data == '0000-00-00' || $data == '00-00-0000'|| empty($data) || !isset($data) ){
                $data = date('Y-m-d');
            }
            $sql = "INSERT INTO compras (id, produto, data, quantidade, precoUnitario, fornecedor) 
            VALUES (?, ?, ?, ?, ?,?)";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                error_log("SQL prepare error: " . $conn->error);
                throw new Exception("SQL prepare error");
            }

            $stmt->bind_param("sssiis", $ID, $object->produto, $data, $object->quantidade,$object->preco,$object->fornecedor);

            if (!$stmt->execute()) {
                error_log('Insert into purchases failed: ' . $conn->error);
            }
            $stmt->close();

        }
        $conn->commit();
        $conn->close();
        unset($_SESSION['csrf_tokenCreatePurchase']);

        $dataSales = array('0');
        header('Content-Type: application/json');
        echo json_encode($dataSales);
    } catch (\Throwable $th) {
        $conn->rollback();
        $conn->close();
        unset($_SESSION['csrf_tokenCreatePurchase']);
        
        $dataSales = array('1');
        header('Content-Type: application/json');
        echo json_encode($dataSales);
    }