<?php

class LoadConfig{

        static function getConfig ($filename) {

                if (file_exists($filename)) return json_decode(file_get_contents($filename));
        
                else return false;
        
            }
        
}


?>