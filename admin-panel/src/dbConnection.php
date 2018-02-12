<?php
namespace App;

class dbConnection{

    public function connect()
    {
        $connect_db = new \mysqli( 'localhost', 'root', '', 'in2gravity' );

        if ( mysqli_connect_errno() ) {
            printf("Connection failed: %s\
", mysqli_connect_error());
            exit();
        }
        return $connect_db;

    }


}