<?php
class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    
    public function getId() {
    return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function __construct(){
        $dns = "mysql:dbname=obanco;host=localhost";
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dns, $dbUser, $dbPass);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function cadastra($nome, $email, $senha){
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);

        return $stmt->execute();
    }

    public function chkUser($email){
        $sql = "SELECT * FROM usuarios WHERE email = :e";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $smt->execute();

        if( $stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function chkPass($email, $senha){
        $sql = "SELECT * FROM usuarios WHERE email = :e AND senha = :s";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            return $stmt->fetch();
        }else{
            return false;
        }
    }

}

?>