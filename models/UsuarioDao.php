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
        $user->setAdmin($array['admin'] ?? '');
        return $user;
    }

    public function add(Usuario $u) {
        $date = $u->getNascimento();
        $date = DateTime::createFromFormat('d/m/Y', $date);
        $date = $date->format('Y-m-d');

        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha, telefone, nascimento) VALUES (:nome, :email, :senha, :telefone, :nascimento)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':senha', $u->getSenha());
        $sql->bindValue(':telefone', $u->getTelefone());
        $sql->bindValue(':nascimento', $date);
        $sql->execute();
    }
    
    public function login($pass, $email) {
        $sql = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();
            $hash = $dados['senha'];
            
            if(password_verify($pass, $hash)) {
            $u = $this->generateUser($dados);

            return $u;}
        } else {
            return false;
        }
    }

    public function findAll($id) {
        $array = [];

        $sql = $this->pdo->query('SELECT * FROM usuarios');

        if ($sql->rowCount() > 0) {

        $dados = $sql->fetchAll();

            foreach($dados as $item) {
              
                $u = $this->generateUser($item);
                if ($id != $u->getId()) {
                $array[] = $u;
            }
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
       // $verify = $this->findById($id)

        if($_SESSION['id'] != $id && $this->findById($_SESSION['id'])->getAdmin() === TRUE) {
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute(); }
    }
}

?>