<?php
    session_start();
    include 'crudMethods.php';;
    include 'CSRF_methods.php';
    include 'DB.php';

    $ID = $_POST['supplierUpdate'];
    $nome = $_POST['updatenameSupplier'];
    $localizacao = $_POST['updatelocationSupplier'];
    $contacto = $_POST['updatecontactoSupplier'];
    $mail = $_POST['updateemailSupplier'];
    $credito = $_POST['updatecreditSupplier'];


    $csrfToken = $_POST['csrf_tokenUpdateDeliverySupplier'];
        try {

            if (!verifyCsrfTokenUpdateDeliverySupplier($csrfToken)) {
                throw new Exception("Invalid CSRF token.", 1);
            }
                       
            if(isset($nome) && !empty($nome) ){ 
                updateField($conn,"delivery_supplier","nome",$nome,"id",$ID);
            }
           
            if(isset($localizacao) && !empty($localizacao) ){ 
                updateField($conn,"delivery_supplier","localizacao",$localizacao,"id",$ID);
            }      

            if(isset($contacto) && !empty($contacto) ){ 
                updateField($conn,"delivery_supplier","contacto",$contacto,"id",$ID);
            }      

            if(isset($mail) && !empty($mail) ){ 
                updateField($conn,"delivery_supplier","mail",$mail,"id",$ID);
            }      

            if(isset($preco) && !empty($preco) ){ 
                updateField($conn,"delivery_supplier","credito",$credito,"id",$ID);
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
