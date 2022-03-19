<?php 
require_once 'Usuario.php';

class UsuarioDaoMysql implements UsuarioDao {
    private $pdo;

    public function __construct (PDO $engine) {
        $this->pdo = $engine;
    }

    public function generateUser ($array) {
        $user = new Usuario();
        $user->setId($array['id'] ?? '');
        $user->setNome($array['nome'] ?? '');
        $user->setEmail($array['email'] ?? '');
        $user->setNascimento($array['nascimento'] ?? '');
        $user->setTelefone($array['telefone'] ?? '');
        $user->setRegistro($array['registro'] ?? '');
        $user->setSenha($array['senha'] ?? '');
        return $user;
    }

    public function add(Usuario $u) {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha, telefone, nascimento) VALUES (:nome, :email, :senha, :telefone, :nascimento)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':senha', $u->getSenha());
        $sql->bindValue(':telefone', $u->getTelefone());
        $sql->bindValue(':nascimento', $u->getNascimento());
        $sql->execute();
    }
    
    public function login(Usuario $u) {
        $sql = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();
            $pass = $u->getSenha();
            $hash = $dados['senha'];
            
            if(password_verify($pass, $hash)) {
            $u = $this->generateUser($dados);

            return $u;}
        } else {
            return false;
        }
    }

    public function findAll() {
        $array = [];

        $sql = $this->pdo->query('SELECT * FROM usuarios');

        if ($sql->rowCount() > 0) {

        $dados = $sql->fetchAll();

            foreach($dados as $item) {
                $u = $this->generateUser($item);
                $array[] = $u;
            }

            

        }
        
        return $array;
    }

    public function findById($id) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();
            $u = $this->generateUser($dados);
            return $u;
        } else {
            return false;
        }

    }
    
    public function findByEmail($email) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();
            $u = $this->generateUser($dados);
            return $u;
        } else {
            return false;
        }

    }

    public function update(Usuario $u) {
        
        $sql = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone, nascimento = :nascimento WHERE id = :id");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':senha', $u->getSenha());
        $sql->bindValue(':telefone', $u->getTelefone());
        $sql->bindValue(':nascimento', $u->getNascimento());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();
    }

    public function delete($id) {
        
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

    }
}

?>