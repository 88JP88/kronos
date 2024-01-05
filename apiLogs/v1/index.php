
<?php

require 'flight/Flight.php';

require 'database/db_users.php';
require 'env/domain.php';

 


 

Flight::route('POST /frontLog/', function () {
   
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
   
    $data= Flight::request()->data->data;
    $logType= Flight::request()->data->logType;

//       require_once '../../apiLogs/v1/model/modelSecurity/uuid/uuidd.php';
        
 require_once '../../apiLogs/v1/model/modelSecurity/uuid/uuidd.php';
 
        $gen_uuid = new generateUuid();
        $myuuid = $gen_uuid->guidv4();
    

        $logId = substr($myuuid, 0, 8);

    
        $conectar=conn();

    $dtadta=json_encode($data);
        $query = mysqli_query($conectar, "INSERT INTO frontLogs (logId, logValue, logType) VALUES ('$logId', '$dtadta', '$logType')");

        if ($query) {
            echo "true|¡Repartidor creado con éxito!";
        } else {
            // Si hay un error, imprime el mensaje de error
            echo "false|" . mysqli_error($conectar);
        }
        
    


        // Acceder a los encabezados
    
        
      
       

        
   
});



Flight::route('POST /postDelivery/', function () {
        
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
   
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
   
    $data= Flight::request()->data->data;
    $logType= Flight::request()->data->logType;

     //  require_once '../../apiLogs/v1/model/modelSecurity/uuid/uuidd.php';
        
 
 
      //  $gen_uuid = new generateUuid();
        //$myuuid = $gen_uuid->guidv4();
    

       // $logId = substr($myuuid, 0, 8);

    /*
        $conectar=conn();

    
        $query = mysqli_query($conectar, "INSERT INTO frontLogs (logId, logValue, logType) VALUES ('123', '$data', '$logType')");

        if ($query) {
            echo "true|¡Repartidor creado con éxito!";
        } else {
            // Si hay un error, imprime el mensaje de error
            echo "false|" . mysqli_error($conectar);
        }
      */  
    
echo json_encode($data);

        // Acceder a los encabezados
    
        

       

        
});


Flight::start();
