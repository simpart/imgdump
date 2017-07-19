<?php

namespace cli;

function dump ($hdr) {
    try {
        foreach ($hdr as $hkey => $hval) {
            echo $hkey . PHP_EOL;
            echo '===================================' . PHP_EOL;
            foreach ($hval as $hvkey => $hvval) {
                echo $hvkey . '     :    ' . $hvval . PHP_EOL;
            }
            echo PHP_EOL;
        }
    } catch (Exception $e) {
        throw new Exception(
            PHP_EOL   .
            'File:'   . __FILE__   . ',' .
            'Line:'   . __line__   . ',' .
            'Func:' . __FUNCTION__ . ',' .
            $e->getMessage()
        );
    }
}
