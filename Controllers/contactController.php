<?php
    require_once("../Models/WSRequest.php");

    getContacts();
    
    function getContacts(){
        $obj = new WSRequest();

        //Get
        $getchallenge = json_decode($obj->get("https://develop.datacrm.la/datacrm/pruebatecnica/webservice.php?operation=getchallenge&username=prueba"));
        $tokenString = $getchallenge->result->token;

        //Post Login
        $data = [
            "operation" => "login",
            "username" => "prueba",
            "accessKey" => md5( $tokenString . '2LBlgytgPhd23cFy')
        ];

        $login = json_decode($obj->post("https://develop.datacrm.la/datacrm/pruebatecnica/webservice.php", $data));
        $sessionName = $login->result->sessionName;

        //Get Query
        $query = json_decode($obj->get("https://develop.datacrm.la/datacrm/pruebatecnica/webservice.php?operation=query&sessionName=$sessionName&query=select%20id,contact_no,lastname,createdtime%20from%20Contacts;"));
        print_r(json_encode($query));
    }
    
