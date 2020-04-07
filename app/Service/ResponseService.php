<?php 
    namespace App\Service;

    class ResponseService 
    {
        public  function create($success,$message,$data=null)
        {
            $payload=array(
                "success"=>$success,
                "message"=>$message
            );

            if ($data)
            {
                $payload["data"]=$data;
            }

            return $payload;
        }
    }

?>