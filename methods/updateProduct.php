<?php
    session_start();
    include 'crudMethods.php';;
    include 'CSRF_methods.php';
    include 'DB.php';

    $ID = $_POST['produtoUpdate'];
    $nome = $_POST['updateNameProduct'];
    $tipo = $_POST['updatetypeProduct'];
    $quantidade = $_POST['updateQuantyProduct'];


    $csrfToken = $_POST['csrf_tokenUpdate'];
        try {

            if (!verifyCsrfTokenUpdate($csrfToken)) {
                throw new Exception("Invalid CSRF token.", 1);
            }
                       
            if(isset($nome) && !empty($nome) ){ 
                updateField($conn,"produto","nome",$nome,"id",$ID);
            }

            if(isset($tipo) && !empty($tipo) ){ 
                updateField($conn,"produto","tipo",$tipo,"id",$ID);
            }  
           
            if(isset($quantidade) && !empty($quantidade) ){ 
                updateField($conn,"produto","quantidade",$quantidade,"id",$ID);
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
