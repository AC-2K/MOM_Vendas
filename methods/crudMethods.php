<?php
    include 'DB.php';

    //Photos insertion/manipulation limits
    const maxSize = 1 * 1024 * 1024;  // 1MB in bytes
    const maxWidth = 1920;            // Max image width
    const maxHeight = 1080;           // Max image height
    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];  // Allowed MIME types

    //Metodo de converter as datas para  YYYY-MM-DD
    function converterFormatoData($data){
        $date = DateTime::createFromFormat('m/d/Y', $data) ?: 
        DateTime::createFromFormat('d-m-Y', $data) ?: 
        DateTime::createFromFormat('Y/m/d', $data) ?: 
        DateTime::createFromFormat('Y-m-d', $data);

        if ($date) {
            $formattedDate = $date->format('Y-m-d');
            return $formattedDate;
        }

    }
    //----------------------------  Metodos de insercao de dados de pessoa de interesse dos clientes --------------------------------------------------
    function buscarPreco($ID) : int {
        $link = mysqli_connect('localhost','root','','food');
        $link->begin_transaction();
        $sql = "SELECT preco FROM refeicao WHERE id = '$ID' ";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $preco = $row['preco'];
            if (empty($preco)) {
                $link->rollback();
                $link->close();
                throw new Exception("Campo vazio", 1);
            }
        }else{
            $link->rollback();
            $link->close();
            throw new Exception("Data inserido no BD invalido", 1);
        }
        $link->commit();
        $link->close(); 
        return $preco ;
    }
    function buscarQuantidadeProdutoDelivery($ID) : int {
        $link = mysqli_connect('localhost','root','','food');
        $link->begin_transaction();
        $sql = "SELECT quantidade FROM delivery_product WHERE id = '$ID' ";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $quantidade = $row['quantidade'];
            if (empty($quantidade)) {
                $link->rollback();
                $link->close();
                throw new Exception("Campo vazio", 1);
            }
        }else{
            $link->rollback();
            $link->close();
            throw new Exception("Data inserido no BD invalido", 1);
        }
        $link->commit();
        $link->close(); 
        return $quantidade ;
    }

    //Metodo de verificar se existe valor na DB -existe 2 modos de proceder, com parametros ou sem parametros
    function existeNaDB($mysqli, $query, $params = [], $paramTypes = '') {
        // Prepare the SQL statement
        $stmt = $mysqli->prepare($query);
        if ($stmt === false) {
            throw new Exception("Failed to prepare statement: " . $mysqli->error);
        }
    
        // Bind parameters if provided
        if (!empty($params) && !empty($paramTypes)) {
            $stmt->bind_param($paramTypes, ...$params);
        }
    
        // Execute the query
        if (!$stmt->execute()) {
            throw new Exception("Failed to execute query: " . $stmt->error);
        }
    
        // Get the result
        $result = $stmt->get_result();
    
        // Check if there are rows
        $hasRows = ($result->num_rows > 0);
    
        // Close statement
        $stmt->close();
    
        return $hasRows;
    }

    //------------------------------------------------------------------------------
    function redefinirAtributo($object, $atributoNovo, $atributoAntigo){
        $object->$atributoNovo = $object->$atributoAntigo;
        unset($object->$atributoAntigo);
    }


    //Mudar nome das chaves do array de objectos vindo do JS
    function updateField($mysqli, $tableName, $fieldName, $newValue, $primaryKey, $primaryKeyValue) {
        try {
            // Check if the connection is closed
            if ($mysqli === null || !$mysqli->ping()) {
                // Close existing connection if not null
                if ($mysqli !== null) {
                    $mysqli->close();
                }
                // Reopen the connection
                $mysqli = new mysqli('localhost','root','','food');

                // Check for connection errors
                if ($mysqli->connect_error) {
                    die("Reconnection failed: " . $mysqli->connect_error);
                }
            }
            // Prepare the UPDATE statement
            $mysqli->begin_transaction();
            $sql = "UPDATE $tableName SET $fieldName = ? WHERE $primaryKey = ?";
            $stmt = $mysqli->prepare($sql);
        
            if ($stmt === false) {
                throw new Exception("Prepare failed: " . $mysqli->error);
            }
        
            // Bind parameters
            $stmt->bind_param("ss", $newValue, $primaryKeyValue);

        
            // Execute the UPDATE statement
            if (!$stmt->execute()) {
                throw new Exception("Update failed: " . $stmt->error);
            }

            // Commit the transaction
            $mysqli->commit();

            // Close the statement
            $stmt->close();
        } catch (\Throwable $th) {
            // Roll back the transaction on error
            $mysqli->rollback();

            // Close the statement if it was initialized
            if (isset($stmt) && $stmt !== false) {
                $stmt->close();
            }

            // Re-throw the exception or handle the error
            die("Transaction failed: " . $th->getMessage());
        }
    
           
    }

    // Create a new row in the database
    function createField($mysqli,$table, $data) {
        // Prepare the SQL statement
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), '?'));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        // Prepare the statement
        if ($stmt = $mysqli->prepare($sql)) {
            
            foreach ($data as $value) {
                if (is_int($value)) {
                    $types .= 'i';
                } elseif (is_double($value)) {
                    $types .= 'd';
                } elseif (is_string($value)) {
                    $types .= 's';
                } else {
                    $types .= 'b'; // blob and other types
                }
                $values[] = $value;
            }

            $stmt->bind_param($types, ...$values);

            // Execute the statement
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                echo 'Execute Error: ' . $stmt->error;
            }
        } else {
            echo 'Prepare Error: ' . $stmt->error;
        }
        
        return false;
    }


        // Delete a row from the database, that has several conditions - ACTULIZAR QUANDO FOR NECESSARIO - NAO FOI IMPLEMENTADO O PROCESSO DE RECONECCAO COM DB
        function deleteRowSeveralConditions($mysqli,$table, $conditions) {
            // Prepare the SQL statement
            $placeholders = implode(" AND ", array_map(function($key) {
                return "$key = ?";
            }, array_keys($conditions)));
            $sql = "DELETE FROM $table WHERE $placeholders";
    
            // Prepare the statement
            if ($stmt = $mysqli->prepare($sql)) {
                // Dynamically bind parameters
                $types = '';
                $values = [];
    
                foreach ($conditions as $value) {
                    if (is_int($value)) {
                        $types .= 'i';
                    } elseif (is_double($value)) {
                        $types .= 'd';
                    } elseif (is_string($value)) {
                        $types .= 's';
                    } else {
                        $types .= 'b'; // blob and other types
                    }
                    $values[] = $value;
                }
    
                $stmt->bind_param($types, ...$values);
    
                // Execute the statement
                if ($stmt->execute()) {
                    $stmt->close();
                    return true;
                } else {
                    echo 'Execute Error: ' . $stmt->error;
                }
            } else {
                echo 'Prepare Error: ' . $stmt->error;
            }
            
            return false;
        }

        //For cases that has only one condition
        function deleteRowOneCondition($mysqli,$table,$column,$value) {
            // Check if the connection is closed
            if ($mysqli === null || !$mysqli->ping()) {

                // Reopen the connection
                $mysqli = new mysqli('localhost','root','','food');

                // Check for connection errors
                if ($mysqli->connect_error) {
                    throw new Exception("Reconnection failed: " . $mysqli->connect_error, 1);   
                }
            }
            $mysqli->begin_transaction();
            // Prepare the SQL statement
            $sql = "DELETE FROM $table WHERE $column = ?";
    
            // Prepare the statement
            if ($stmt = $mysqli->prepare($sql)) {
                // Determine the type of the value
                $type = '';
                if (is_int($value)) {
                    $type = 'i';
                } elseif (is_double($value)) {
                    $type = 'd';
                } elseif (is_string($value)) {
                    $type = 's';
                } else {
                    $type = 'b'; // blob and other types
                }

            // Bind the parameter
            $stmt->bind_param($type, $value);
    
                // Execute the statement
                if ($stmt->execute()) {
                    $stmt->close();
                    $mysqli->commit();
                    return true;
                } else {
                    echo 'Execute Error: ' . $stmt->error;
                }
            } else {
                echo 'Prepare Error: ' . $stmt->error;
            }
            $mysqli->rollback();
            return false;
        }
        function handleImageUpload($file, $targetDir, $maxSize, $maxWidth, $maxHeight, $allowedTypes) {
            // Check if file upload was successful
            if (!isset($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
                throw new Exception("File upload failed.");
            }
            if ($file['size'] > $maxSize) {
                throw new Exception("The file is larger than " . ($maxSize / 1024 / 1024) . "MB.", 1);
            }
        
            // Validate that the file is an image
            $fileType = mime_content_type($file['tmp_name']);
            if (!in_array($fileType, $allowedTypes)) {
                throw new Exception("Only JPEG, PNG, and GIF images are allowed.", 1);
            }
        
            // Get image dimensions (width and height)
            list($width, $height) = getimagesize($file['tmp_name']);
        
            // Check if the image dimensions are within the allowed range
            if ($width > $maxWidth || $height > $maxHeight) {
                throw new Exception("The image exceeds the maximum dimensions of $maxWidth x $maxHeight pixels.", 1);
            }
        
            // TODO Define the file name and destination path - verificar se le bem a variavel
            $img = basename($_FILES['foto']['name']); //Get here extension from image
            $result = explode('.',$img);
            $fotoName= $result[0].date('dmY').'_'.time().'.'.$result[1]; 
            $targetFile = $targetDir . $fotoName;
        
            // Move the uploaded file to the desired directory
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                return $fotoName;
            } else {
                //throw new Exception("Error moving the uploaded file.", 1);                
            }
        }

        function handleFileDeletion($fileName, $targetDir) {
            $filePath = $targetDir . $fileName;
        
            // Check if the file exists
            if (file_exists($filePath)) {
                // Delete the file using unlink()
                if (!unlink($filePath)) {
                    throw new Exception("Error deleting the file.", 1);
                }
            } else {
                throw new Exception("File not found.", 1);
            }
        }

        function handleFileUpload($file, $targetDir, $maxSize,$allowedTypes) {
            // Validate file size (maxSize limit)
            if ($file['size'] > $maxSize) {
                throw new Exception("The file is larger than " . ($maxSize / 1024 / 1024) . "MB.", 1);
            }
        
            // Validate that the file is an image
            $fileType = mime_content_type($file['tmp_name']);
            if (!in_array($fileType, $allowedTypes)) {
                throw new Exception("PDF, Word documents, and image files are allowed", 1);
            }

            // Check if the file is an image and enforce dimensions
            if (strpos($fileType, 'image/') === 0) {
                list($width, $height) = getimagesize($file['tmp_name']);
                $maxWidth = 1920; // Maximum width in pixels
                $maxHeight = 1080; // Maximum height in pixels

                if ($width > $maxWidth || $height > $maxHeight) {
                    throw new Exception("The image exceeds the maximum dimensions of $maxWidth x $maxHeight pixels.", 1);
                }
            }
        
            // Define the file name and destination path
            $img = basename($_FILES['file']['name']); //Get here extension from image
            $result = explode('.',$img);
            $fotoName= $result[0].date('dmY').'_'.time().'.'.$result[1]; 
            $targetFile = $targetDir . $fotoName;
        
            // Move the uploaded file to the desired directory
            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                return $fotoName;
            } else {
                //throw new Exception("Error moving the uploaded file.", 1);                
            }
        }
