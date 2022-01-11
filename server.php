<?php
    $serverName = "DESKTOP-QF1CJMR\SQLEXPRESS";
    $connectionInfo = array("Database"=>"ANNOUNCEMENT");
    $connect = sqlsrv_connect($serverName, $connectionInfo);
;
    if( $connect ) {
        echo "Connection established.<br />";
   }else{
        echo "Connection could not be established.<br />";
        die( print_r( sqlsrv_errors(), true));
   }
   
    $sql = "SELECT * FROM ANNOUNCEMENT.dbo.Content";
    $parameters = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $statement = sqlsrv_query( $connect, $sql , $parameters, $options );

    $row_count = sqlsrv_num_rows( $statement );
  
        if ($row_count === false)
           echo "Error getting data.";
        else
           echo "Not bad";
           echo $row_count;
        while( $row = sqlsrv_fetch_array( $statement) ) {
              print json_encode($row);
        }

        if (isset($_POST['save'])) {

        if (isset($_POST['title'])) {
            $title = mysql_real_escape_string($connect, $_POST['title']);
    
            if (empty($title)) {
                array_push($errors, "Title is required");
            }

            $sql = "SELECT * FROM Content";
            $result = sqlsrv_query($connect, $sql);
            $title = mysql_fetch_assoc($result);
    
            if (count($errors) == 0) {
                $query = "INSERT INTO Content (title)
                          VALUES ('$title')";
                sqlsrv_query($connect, $query);
                if (sqlsrv_num_rows($result) == 1) {
                    $_SESSION['title'] = $title;
                    $_SESSION['success'] = "Title is recorded.";
                    header('location: ');
                }else {
                    array_push($errors, "Title is required");
                }
            }
        }

        if(isset($_POST['description'])) {
            $description = mysql_real_escape_string($connect, $_POST['description']);

            if (empty($description)) { array_push($errors, "Description is required"); }

            $sql = "SELECT * FROM Content";
            $result = sqlsrv_query($connect, $sql);
            $description = mysql_fetch_assoc($result);

            if (count($errors) == 0) {
                $query = "INSERT INTO Content (description)
                            VALUES ('$description')";
                sqlsrv_query($connect, $query);
                $_SESSION['description'] = $description;
                $_SESSION['success'] = "Description is recorded.";
                header('location:');
            }
            
        }

    if(isset($_POST['dt'])) {
        $dt = mysql_real_escape_string($connect, $_POST['dt']);

        if (empty($dt)) { array_push($errors, "The Date to Delete is required"); }

        $sql = "SELECT * FROM Content";
        $result = sqlsrv_query($connect, $sql);
        $dt = mysql_fetch_assoc($result);

        if (count($errors) == 0) {
            $query = "INSERT INTO Content (autodel)
                        VALUES ('$dt')";
            sqlsrv_query($connect, $query);
            $_SESSION['autodel'] = $dt;
            $_SESSION['success'] = "The Date to Delete is recorded.";
            header('location: ');
        }

    }

    if(isset($_POST['nama_fail'])) {
        $nama_fail = mysql_real_escape_string($connect, $_POST['nama_fail']);

        if (empty($nama_fail)) { array_push($errors, "Image is required"); }

        $sql = "SELECT * FROM Content";
        $result = sqlsrv_query($connect, $sql);
        $nama_fail = mysql_fetch_assoc($result);

        if (count($errors) == 0) {
            $query = "INSERT INTO Content (image_link)
                        VALUES ('$nama_fail')";
            sqlsrv_query($connect, $query);
            $_SESSION['image_link'] = $nama_fail;
            $_SESSION['success'] = "Image is saved.";
            header('location: ');
        }

    }

    if(isset($_POST['reflink'])) {
        $reflink = mysql_real_escape_string($connect, $_POST['reflink']);

        if (empty($reflink)) { array_push($errors, "The Announcement Link is required"); }

        $sql = "SELECT * FROM Content";
        $result = sqlsrv_query($connect, $sql);
        $reflink = mysql_fetch_assoc($result);

        if (count($errors) == 0) {
            $query = "INSERT INTO Content (ref_link)
                        VALUES ('$reflink')";
            sqlsrv_query($connect, $query);
            $_SESSION['ref_link'] = $reflink;
            $_SESSION['success'] = "The Announcement Link is recorded.";
            header('location: ');
        }

    }
}
    sqlsrv_close($connect);
?>
