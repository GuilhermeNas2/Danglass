<?php
namespace App\Models;
use App\Models\Conexao;
use Log\Logs;

class ScreenModels{
    private $conn;
    private $log;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConn();
        $this->log = new Logs();
    }

    public function getScreens($type) {
        $data = array();

        $sql = "SELECT display,nome FROM viewTelas WHERE codigo =".$type;
        $result = mysqli_query($this->conn, $sql);   
    
        while($row = mysqli_fetch_array($result)){     
            $this->log->writeLog("\n".$sql."--->".$row['display']." -- ".$row['nome']."\n" );         
            
            $data[] = array(
                'nome'=> $row['nome'],
                'display'=> utf8_encode($row['display'])
                
            );
                   
        };           
        
        mysqli_free_result($result);
        mysqli_close($this->conn);

        return $data;
    }
}

?>