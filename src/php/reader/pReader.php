<?php

namespace reader;

class pReader {
    private $handle   = null;
    private $read_cnt = 0;
    
    function __construct($img) {
        try {
            $this->handle = fopen($img, 'rb');
            if (false === $this->handle) {
                throw new \Exception('could not open image file : ' . $img);
            }
        } catch (\Exception $e) {
            throw new \Exception(
                PHP_EOL   .
                'File:'   . __FILE__         . ',' .
                'Line:'   . __line__         . ',' .
                'Class:'  . get_class($this) . ',' .
                'Method:' . __FUNCTION__     . ',' .
                $e->getMessage()
            );
        }
    }
    
    public function getHeader () {
        try {
            throw new \Exception('not implements');
        } catch (\Exception $e) {
            throw new \Exception(
                PHP_EOL   .
                'File:'   . __FILE__         . ',' .
                'Line:'   . __line__         . ',' .
                'Class:'  . get_class($this) . ',' .
                'Method:' . __FUNCTION__     . ',' .
                $e->getMessage()
            );
        }
    }
    
    protected function read ($cnt) {
        try {
            $this->read_cnt = $this->read_cnt + $cnt;
            return fread($this->handle, $cnt);
        } catch (\Exception $e) {
            throw new \Exception(
                PHP_EOL   .
                'File:'   . __FILE__         . ',' .
                'Line:'   . __line__         . ',' .
                'Class:'  . get_class($this) . ',' .
                'Method:' . __FUNCTION__     . ',' .
                $e->getMessage()
            );
        }
    }
    
    protected function readLE ($cnt) {
        try {
            if ( (0 !== strcmp('integer', gettype($cnt))) ||
                 (0 >= $cnt) ||
                 ( (2 != $cnt) && (4 != $cnt)) ) {
                throw new \Exception('invalid parameter');
            }
            
            for ($loop=0; $loop < $cnt ;$loop++) {
                $data[] = ord($this->read(1));
            }
            
            $ret = '';
            for ($loop=count($data)-1; $loop >= 0 ;$loop--) {
                $ret .= $data[$loop];
            }
            return intval($ret);
        } catch (\Exception $e) {
            throw new \Exception(
                PHP_EOL   .
                'File:'   . __FILE__         . ',' .
                'Line:'   . __line__         . ',' .
                'Class:'  . get_class($this) . ',' .
                'Method:' . __FUNCTION__     . ',' .
                $e->getMessage()
            );
        }
    }
    
    protected function getCount() {
        try {
            return $this->read_cnt;
        } catch (\Exception $e) {
            throw new \Exception(
                PHP_EOL   .
                'File:'   . __FILE__         . ',' .
                'Line:'   . __line__         . ',' .
                'Class:'  . get_class($this) . ',' .
                'Method:' . __FUNCTION__     . ',' .
                $e->getMessage()
            );
        }
    }
    
    function __destruct () {
        try {
            fclose($this->handle);
        } catch (\Exception $e) {
            throw new \Exception(
                PHP_EOL   .
                'File:'   . __FILE__         . ',' .
                'Line:'   . __line__         . ',' .
                'Class:'  . get_class($this) . ',' .
                'Method:' . __FUNCTION__     . ',' .
                $e->getMessage()
            );
        }
    }
}
