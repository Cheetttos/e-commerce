<?php
    http_response_code(200);
    $message = md5(rand());
    echo json_encode($message);
    json_encode($array);
?>