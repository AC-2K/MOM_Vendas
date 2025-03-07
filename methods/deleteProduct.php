<?php
    session_start();
    include 'crudMethods.php';;
    include 'CSRF_methods.php';
    include 'DB.php';
    
        $csrfToken = $_POST['csrf_tokenDelete'];
        $item = $_POST['produtoDelete'];

        if (!verifyCsrfTokenDelete($csrfToken )) {
            throw new Exception("Invalid CSRF token.", 1);
        }else {
            try {
                deleteRowOneCondition($conn,'produto','id', $item);
                $conn->close();
                // Redirect on success
                $result = array('0');
                header('Content-Type: application/json');
                echo json_encode($result);
            }catch (Throwable $th) {
                $conn->close();

                // Display error message
                $result = array('1');
                header('Content-Type: application/json');
                echo json_encode($result);
            }
        }
