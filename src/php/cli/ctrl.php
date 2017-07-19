<?php
/**
 * @file cli/ctrl.php
 */
try {
    require_once(__DIR__ . '/../ttr/require.php');
    require_once(__DIR__ . '/dump.php');
    
    $tgt = $argv[1];
    
    # check target exists
    if ( (true === empty($tgt)) ||
         (false === ttr\file\isExists($tgt)) ) {
        throw new \Exception('could not find target');
    }
    
    # check image type
    $ex_tgt = explode('.', $tgt);
    if (2 > count($ex_tgt)) {
        throw new Exception('invalid target');
    }
    $type = $ex_tgt[count($ex_tgt)-1];
    
    # dump image file
    $img = null;
    if (0 === strcmp('bmp', $type)) {
        $img = new \reader\Bitmap($tgt);
    } else {
        throw new Exception('invalid type');
    }
    \cli\dump($img->getHeader());
} catch (Exception $e) {
    throw new Exception(
        PHP_EOL   .
        'File:'   . __FILE__   . ',' .
        'Line:'   . __line__   . ',' .
        'Func:' . __FUNCTION__ . ',' .
        $e->getMessage()
    );
}
/* end of file */
