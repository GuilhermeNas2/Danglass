<?php

class Log {
    private $file = './mysqllog.txt';
    

    public function __construct() {

    }

    public function writeLog($content) {
        $time = date('d/m/Y H:i');
        $content .= "  ".$time;

        if(file_get_contents($this->file)){
            file_put_contents($this->file, $content, FILE_APPEND | LOCK_EX);
            return;
        };

        file_put_contents($this->file, $content);
        return;
        
    }
};


?>
