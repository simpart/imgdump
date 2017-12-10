<?php

namespace reader;

class Bitmap extends pReader {
    
    public function getHeader () {
        try {
            $file_hdr = $this->getFileHeader();
            $inf_hdr  = $this->getInfoHeader();
            //$plt_dat  = $this->getPalete();
            
            //for ($loop=0;$loop < 100;$loop++) {
            //    for ($loop2=0;$loop2 < 16;$loop2++) {
            //        printf("%02d ",ord($this->read(1)));
            //    }
            //    echo PHP_EOL;
            //}
            
            return array(
                'File Header'        => $file_hdr,
                'Information Header' => $inf_hdr,
                //'Palette Data'       => $plt_dat
            );
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
    
    private function getFileHeader () {
        try {
            $ret = array();
            $ret['type'] = $this->read(2);
var_dump(ord($this->read(1)));
var_dump(ord($this->read(1)));
var_dump(ord($this->read(1)));
var_dump(ord($this->read(1)));
//            $ret['size'] = $this->readLE(4) . ' (byte)'; //ord($this->read(4)) . ' (byte)';
            /* skip reserve area */
            $this->read(4);
            $ret['offset'] = $this->readLE(4) . ' (byte)';
            
            return $ret;
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
    
    private function getInfoHeader () {
        try {
            $ret['info size'] = intval($this->readLE(4));
            //bin2hex($this->read(2)) . bin2hex($this->read(2));//ord($this->read(2)) . ord($this->read(2));
            if (40 === $ret['info size']) {
                /* windows type */
                $ret['width']       = $this->readLE(4) . ' (px)';
                $ret['height']      = $this->readLE(4) . ' (px)';
                $ret['plane']       = $this->readLE(2);
                $ret['bit count']   = $this->readLE(2) . ' (bit)';
                $ret['compression'] = $this->readLE(4);
                $ret['image size']  = $this->readLE(4) . ' (byte)';
                $ret['x pixel per meter'] = $this->readLE(4) .' (dot/m)';
                $ret['y pixel per meter'] = $this->readLE(4) .' (dot/m)';
                $ret['color count'] = $this->readLE(4);
                $ret['important color count'] = $this->readLE(4);
                
            } else if (12 === $ret['info size']) {
                /* OS/2 type */
                $ret['width']     = ord($this->read(2)) . ' (px)';
                $ret['height']    = ord($this->read(2)) . ' (px)';
                $ret['plane']     = ord($this->read(2));
                $ret['bit count'] = ord($this->read(2)) . ' (bit)';
            }
            $ret['info size'] .= ' (byte)';
            return $ret;
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
    
    private function getPalete () {
        try {
            $ret['blue']  = ord($this->read(1));
            $ret['green'] = ord($this->read(1));
            $ret['red']   = ord($this->read(1));
            
            $ret['blue2']  = ord($this->read(1));
            $ret['green2'] = ord($this->read(1));
            $ret['red2']   = ord($this->read(1));
            
            return $ret;
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
    
    public function getLine ($wid) {
        try {
            for ($loop=0;$loop < $wid;$loop++) {
                $ret[] = ord($this->read(1));
            } 
            return $ret;
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
