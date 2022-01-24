<?php
    session_start();
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $serverName = "DESKTOP-GHL7RON\SQLEXPRESS";
    $connectionInfo = array("Database"=>"ANNOUNCEMENT");
    $connect = sqlsrv_connect($serverName, $connectionInfo);
    $errors = array();

    

    if( $connect ) {
        // echo "Connection established.<br />";
   }else{
        echo "Connection could not be established.<br />";
        die( print_r( sqlsrv_errors(), true));
   }
   
   //autodelete 
    $sql = "SELECT * FROM ANNOUNCEMENT.dbo.Content";
    $parameters = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET, 'ReturnDatesAsStrings'=> true );
    $statement = sqlsrv_query( $connect, $sql , $parameters, $options );
    $row_count = sqlsrv_num_rows($statement);

    while($row = sqlsrv_fetch_array($statement, SQLSRV_FETCH_ASSOC)){
        if($row['autodel'] == date("Y-m-d")){
            $del = "DELETE FROM Content WHERE id =".$row['id'];
            $run = sqlsrv_query($connect, $del);
            
        }
            
    
    }
  
    //find greatest id 
    $queryID = "SELECT * FROM Content ORDER BY id DESC OFFSET 0 ROWS FETCH NEXT 1 ROWS ONLY ;";
    $statement2 = sqlsrv_query($connect, $queryID);
    $greatestID = 0;
    while($row = sqlsrv_fetch_array($statement2, SQLSRV_FETCH_ASSOC)){
        $greatestID = $row['id'] + 1;
    }
        

    //add announcement
    if (isset($_POST['add_new'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image;
        $date = $_POST['dt'];
        $reflink = $_POST['reflink'];
        
        if(empty($title)){
            array_push($errors, "Title is required");
        }
        if(empty($description)){
            array_push($errors, "Description is required");
        }
        if(empty($date)){
            array_push($errors, "Date is required");
        }
        if(empty($reflink)){
            $reflink = "#";
        }
        // if(empty($image)){
        //     array_push($errors, "Image is required");
        // }

        if (count($errors) == 0){
            $target_dir = "assets/img/img_link/";
            $target_file = $target_dir . basename($_FILES['file_name']['name']);
            $uploadOK = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES['file_name']['tmp_name']);
            if($check !== false){
                if(move_uploaded_file($_FILES["file_name"]["tmp_name"], $target_file)){
                    $image = $target_file;
                    $query = "INSERT INTO ANNOUNCEMENT.dbo.Content
                                VALUES ('$greatestID','$title','$description','$date','$image','$reflink')";
                    // $parameters = array($title, $description, $date, $image, $reflink);
                    $result = sqlsrv_query($connect, $query);
                    if($result === false){
                        die(print_r( sqlsrv_errors(), true));
                    }else{
                        header('Location: index.php');
                    }
                }
            }
            else{
                array_push($errors, "Please choose an image");
            }
        }
        
    }

// sqlsrv_close($connect);
?>
