<?php
    session_start();
    include 'crudMethods.php';;
    include 'CSRF_methods.php';
    include 'DB.php';

    $ID = $_POST['RefeicaoUpdate'];
    $nome = $_POST['updateNameMeal'];
    $preco = $_POST['updatePriceMeal'];


    $csrfToken = $_POST['csrf_tokenUpdateMeal'];
        try {

            if (!verifyCsrfTokenUpdateMeal($csrfToken)) {
                throw new Exception("Invalid CSRF token.", 1);
            }
                       
            if(isset($nome) && !empty($nome) ){ 
                updateField($conn,"refeicao","nome",$nome,"id",$ID);
            }
           
            if(isset($preco) && !empty($preco) ){ 
                updateField($conn,"refeicao","preco",$preco,"id",$ID);
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
