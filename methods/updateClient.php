<?php
    session_start();
    include 'crudMethods.php';;
    include 'CSRF_methods.php';
    include 'DB.php';

    $ID = $_POST['clientUpdate'];
    $nome = $_POST['nameupdateClient'];
    $localizacao = $_POST['locationupdateClient'];
    $contacto = $_POST['contactupdateClient'];
    $mail = $_POST['mailupdateClient'];
    $tipo = $_POST['typeupdateClient'];


    $csrfToken = $_POST['csrf_tokenUpdateDeliveryClient'];
        try {

            if (!verifyCsrfTokenUpdateDeliveryClient($csrfToken)) {
                throw new Exception("Invalid CSRF token.", 1);
            }
                       
            if(isset($nome) && !empty($nome) ){ 
                updateField($conn,"delivery_client","nome",$nome,"id",$ID);
            }
           
            if(isset($localizacao) && !empty($localizacao) ){ 
                updateField($conn,"delivery_client","localizacao",$localizacao,"id",$ID);
            }      

            if(isset($contacto) && !empty($contacto) ){ 
                updateField($conn,"delivery_client","contacto",$contacto,"id",$ID);
            }      

            if(isset($mail) && !empty($mail) ){ 
                updateField($conn,"delivery_client","mail",$mail,"id",$ID);
            }      

            if(isset($tipo) && !empty($tipo) ){ 
                updateField($conn,"delivery_client","tipo",$tipo,"id",$ID);
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
