<?php

try {
    $img_file = 'sample.bmp';
    $hdl      = fopen(__DIR__ . '/' . $img_file, 'rb');
    $conts    = fread($hdl, 2);
    
    var_dump($conts);
    
    fclose($hdl);
} catch (Exception $e) {
    throw new Exception(
        PHP_EOL   .
        'File:'   . __FILE__   . ',' .
        'Line:'   . __line__   . ',' .
        'Func:' . __FUNCTION__ . ',' .
        $e->getMessage()
    );
}
