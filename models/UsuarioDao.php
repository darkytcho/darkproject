<?php 
require_once 'Usuario.php';

class UsuarioDaoMysql implements UsuarioDao {
    private $pdo;

    public function __construct (PDO $engine) {
        $this->pdo = $engine;
    }

    public function add(Usuario $u) {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':senha', $u->getSenha());
        $sql->execute();
    }
    
    public function findAll() {

    }
    public function findById($id) {

    }
    public function findByEmail($email) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();

            $u = new Usuario();
            $u->setId($dados['id']);
            $u->setNome($dados['nome']);
            $u->setEmail($dados['email']);

            return $u;
        } else {
            return false;
        }

    }
    public function update(Usuario $u) {

    }
    public function delete($id) {

    }
}

?>