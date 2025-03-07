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
    
    try {
        if (!verifyCsrfTokenCreateDeliveryPurchase($csfr[0] )) {
            throw new Exception("Invalid CSRF token.", 1);
        }

        foreach ($data as $item) {
            $conn->begin_transaction();
            $object = (object)$item;

            //Definir ID do prospect
            $ID = "DELPUR".trim(preg_replace('/\s+/', '', $object->produto)).substr(md5(time() . rand()), 0, 15);
            $data = $object->data;
            if($data == '0000-00-00' || $data == '00-00-0000'|| empty($data) || !isset($data) ){
                $data = date('Y-m-d');
            }
            $sql = "INSERT INTO delivery_purchase (id, produto, fornecedor, data, quantidade, preco) 
            VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                error_log("SQL prepare error: " . $conn->error);
                throw new Exception("SQL prepare error");
            }

            $stmt->bind_param("ssssii", $ID, $object->produto, $object->fornecedor, $data, $object->quantidade, $object->preco);

            if (!$stmt->execute()) {
                error_log('Insert into sales failed: ' . $conn->error);
            }
            $stmt->close();

        }
        $conn->commit();
        $conn->close();
        unset($_SESSION['csrf_tokenCreateDeliveryPurchase']);

        $dataSales = array('0');
        header('Content-Type: application/json');
        echo json_encode($dataSales);
    } catch (\Throwable $th) {
        $conn->rollback();
        $conn->close();
        unset($_SESSION['csrf_tokenCreateDeliveryPurchase']);
        
        $dataSales = array('1');
        //$dataSales = array($csfr[0]);

        header('Content-Type: application/json');
        echo json_encode($dataSales);
    }