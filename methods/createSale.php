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
        if (!verifyCsrfTokenCreateSales($csfr[0] )) {
            throw new Exception("Invalid CSRF token.", 1);
        }

        foreach ($data as $item) {
            $conn->begin_transaction();
            $object = (object)$item;

            //Definir ID do prospect
            $ID = "VEN".trim(preg_replace('/\s+/', '', $object->refeicao)).substr(md5(time() . rand()), 0, 15);
            $preco = buscarPreco($object->refeicao);
            $data = $object->date;
            if($data == '0000-00-00' || $data == '00-00-0000'|| empty($data) || !isset($data) ){
                $data = date('Y-m-d');
            }
            $sql = "INSERT INTO vendas (id, refeicao, data, quantidade, precoTotal) 
            VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                error_log("SQL prepare error: " . $conn->error);
                throw new Exception("SQL prepare error");
            }

            $stmt->bind_param("sssii", $ID, $object->refeicao, $data, $object->quantidade, $preco);

            if (!$stmt->execute()) {
                error_log('Insert into sales failed: ' . $conn->error);

            }
            $stmt->close();

        }
        $conn->commit();
        $conn->close();
        unset($_SESSION['csrf_tokenCreateSales']);

        $dataSales = array('0');
        header('Content-Type: application/json');
        echo json_encode($dataSales);
    } catch (\Throwable $th) {
        $conn->rollback();
        $conn->close();
        unset($_SESSION['csrf_tokenCreateSales']);
        
        $dataSales = array('1');
        header('Content-Type: application/json');
        echo json_encode($dataSales);
    }