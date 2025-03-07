<?php
    session_start();
    include 'crudMethods.php';
    include 'CSRF_methods.php';
    include 'DB.php';

    $ID = $_POST['DeliveryProductUpdate'];
    $nome = $_POST['updatenameProductDel'];
    $tipo = $_POST['updatetypeProductDel'];
    $quantidade = $_POST['updatequantityProductDel'];


    $csrfToken = $_POST['csrf_tokenUpdateDeliveryProduct'];
        try {

            if (!verifyCsrfTokenUpdateDeliveryProduct($csrfToken)) {
                throw new Exception("Invalid CSRF token.", 1);
            }
                       
            if(isset($nome) && !empty($nome) ){ 
                updateField($conn,"delivery_product","nome",$nome,"id",$ID);
            }

            if(isset($tipo) && !empty($tipo) ){ 
                updateField($conn,"delivery_product","tipo",$tipo,"id",$ID);
            }  
           
            if(isset($quantidade) && !empty($quantidade) ){ 
                updateField($conn,"delivery_product","quantidade",$quantidade,"id",$ID);
            }      
            
            $conn->close();

            // Redirect on success
            $result = array('0');
            header('Content-Type: application/json');
            echo json_encode($result);
        } catch (Throwable $th) {
            $conn->close();
            // Display error message
            $result = array('1');
            header('Content-Type: application/json');
            echo json_encode($result);
        }
