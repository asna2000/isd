<?php

    $query ="SELECT * FROM Content";
    $result =mssql_query($query);
        while ( $record = mssql_fetch_array($result) )
        {
	        echo $record["title"] .", ". $record["description"] .", ". $record["image"] . "<br />";
        }
?>

<?php
    $query ="UPDATE Content SET
	        title = 'Hello',
	        description = 'Hello, World!'
            image = 'Hi'";
    $result =mssql_query($query);
?>

<?php
    $query ="INSERT INTO Content
	        (title,description)
	        VALUES('Hi','Hello, again!')";
    $result =mssql_query($query);
?>
