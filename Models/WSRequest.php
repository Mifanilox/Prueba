<?php

    class WSRequest{

        public function get($url){
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            $response = curl_exec($ch);
            curl_close($ch);
            return (!$response) ? false : $response;
        }

        public function post($url, $data){
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            $response = curl_exec($ch);
            curl_close($ch);
            return (!$response) ? false : $response;
        }
    }