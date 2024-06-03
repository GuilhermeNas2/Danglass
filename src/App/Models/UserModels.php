<?php
namespace App\Models;
use App\Models\Conexao;
use Log\Logs;

class UserModels{
    private $conn;    
    private $log;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConn();
        $this->log = new Logs();
    }

    private function verifyEmail() {

    }

    public function getTypeUser() {
        $sql = "SELECT tipo, codigo FROM tipouser ";
        $response = mysqli_query($this->conn, $sql);
        $arrayType = array();

        while($rowS = mysqli_fetch_assoc($response)){
            $arrayType[] =  array(
                "tipo" => $rowS['tipo'],
                "cod" => $rowS['codigo']
            );
        };
        mysqli_free_result($response);
        return $arrayType;
    }

    public function getUserLogin($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email ='".$email."' AND senha ='".$senha."'";
        $response = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($response);
        return $row;
    }

    public function getUserBasic($data, $key) {
        $sql = "SELECT id,nome,tipoUsuario
             FROM usuarios WHERE ".$key."='".$data."'";
        $response = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($response);      

        $result = array( 
            "id"=> $row['id'],
            "nome"=> $row['nome'],    
            "tipoUsuario"=> $row['tipoUsuario']            
        );        
       mysqli_close($this->conn);  
       return $result;
    }  

    public function getUser($data, $key) {
        $sql = "SELECT id,nome,
            CASE tipoUsuario
            WHEN 0 THEN 'Normal'
            WHEN 1 THEN 'Administrador'
            WHEN 2 THEN 'Administrador Master'
            END AS tipoUsuario
             FROM usuarios WHERE ".$key."='".$data."'";
        $response = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($response);

        if($response){
            mysqli_free_result($response);
            $arrayType = UserModels::getTypeUser();    
        };

        $result = array( 
            "id"=> $row['id'],
            "nome"=> $row['nome'],    
            "tipoUsuario"=> $row['tipoUsuario'],
            "tipos"=> $arrayType['tipo']
        );        
       mysqli_close($this->conn);  
       return $result;
    }  

    public function deleteUser($id) {
        mysqli_begin_transaction($this->conn);
        try {
            $sql = "DELETE FROM usuarios WHERE id=".$id;
            $this->log->writeLog("\n".$sql."\n");
            $response = mysqli_query($this->conn, $sql);
            
            if (!($response)) {
                throw new \mysqli_sql_exception($this->conn->error);
            }; 
                    
            mysqli_commit($this->conn);

            $result = array(
                "value" => "Usuario excluido"
            );       

        } catch (\mysqli_sql_exception $exception) {
            $this->log->writeLog("\n".$sql." -----> ".$exception."\n");
            mysqli_rollback($this->conn);
            $result = array(
                "value" => "Operação não concluida"
            );
            http_response_code(500); 
        };   
        mysqli_close($this->conn);     

        return $result;
    }

    public function createUser($data) {
        $user = UserModels::getUserBasic($data['email'], 'email');
        
        if($user['id'] != NULL ) {
            $result = array(
                'value' => 'E-mail já cadastrado'
            );
            return $result;
        }
        UserModels::__construct();
        mysqli_begin_transaction($this->conn);
        try {
            $sql = "INSERT INTO usuarios (nome, senha, email, tipoUsuario) values ('".$data['nome']."','".$data['senha']."','".$data['email']."',".$data['tipouser'].")";
            
            $response = mysqli_query($this->conn, $sql);
            

            if (!($response)) {
                throw new \mysqli_sql_exception($this->conn->error);
            }; 

            mysqli_commit($this->conn);

            $result[] = array(
                "value" => "Usuario registrado com sucesso"
            );

        } catch (\mysqli_sql_exception $exception) { 

            $this->log->writeLog("\n".$sql." -----> ".$exception."\n");
            mysqli_rollback($this->conn);

            $result[] = array(
                "value" => "Operação não concluida"
            );
            http_response_code(500); 
        };   
        mysqli_close($this->conn);    

        return $result;
    }   

    public function updateUser($data, $id) {        
        mysqli_begin_transaction($this->conn);
        
        try {
            $sql = "SELECT codigo FROM tipouser WHERE tipo='".$data."'";
            $response = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($response);

            mysqli_free_result($response);
            
            
            $data = $row['codigo'];
            
            $sql = "UPDATE usuarios SET tipoUsuario=".$data." WHERE id=".$id."";
            $this->log->writeLog("\n".$sql."\n");
            
            $response = mysqli_query($this->conn, $sql);       
                
            
            if (!($response)) {            
                throw new \mysqli_sql_exception($this->conn->error);            
            }; 

            mysqli_commit($this->conn);        
            $result = array(
                "value" => "Operação feita com sucesso"
            );
        

        } catch (\mysqli_sql_exception $exception) {
            $this->log->writeLog("\n".$sql." -----> ".$exception."\n");

            mysqli_rollback($this->conn);
            $result = array(
                "value" => "Operação não concluida"
            );
            http_response_code(500); 

        };   
        mysqli_close($this->conn);  
        return $result;       
    }
}

?>