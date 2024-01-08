
<?php

require 'flight/Flight.php';

require_once 'database/db_users.php';
//require 'env/domain.php';

 


 
Flight::route('POST /frontLog/', function () {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $data = Flight::request()->data->data;
    $logType = Flight::request()->data->logType;

    require_once '../../apiLogs/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $logId = substr($myuuid, 0, 8);

    $conectar = conn();

    // Escapar y preparar los datos para la consulta
    $dtadta = mysqli_real_escape_string($conectar, json_encode($data));
    
    // Ejecutar la consulta con valores preparados para evitar inyecciones SQL
    $result = mysqli_query($conectar, "INSERT INTO frontLogs (logId, logValue, logType) VALUES ('$logId','$data','$logType')");

    if ($result) {
        echo "true|¡Repartidor creado con éxito!";
    } else {
        echo "false|Error en la consulta: " . mysqli_error($conectar);
        // Puedes añadir información adicional sobre el error al log del servidor
        error_log("Error en la consulta SQL: " . mysqli_error($conectar));
    }
});



Flight::route('POST /middleLog/', function () {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $data = Flight::request()->data->data;
    $logType = Flight::request()->data->logType;

    require_once '../../apiLogs/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $logId = substr($myuuid, 0, 8);

    $conectar = conn();

    // Escapar y preparar los datos para la consulta
    $dtadta = mysqli_real_escape_string($conectar, json_encode($data));
    
    // Ejecutar la consulta con valores preparados para evitar inyecciones SQL
    $result = mysqli_query($conectar, "INSERT INTO middleLogs (logId, logValue, logType) VALUES ('$logId','{}','1234')");

    if ($result) {
        echo "¡Repartidor creado con éxito!";
    } else {
        echo "false|Error en la consulta: " . mysqli_error($conectar);
        // Puedes añadir información adicional sobre el error al log del servidor
        error_log("Error en la consulta SQL: " . mysqli_error($conectar));
    }
    
});



Flight::start();
