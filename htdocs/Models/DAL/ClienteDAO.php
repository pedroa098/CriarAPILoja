<?php
    require_once 'Conexao.php';

    class ClienteDAO {
        public function getClientes() {
            $conexao = (new Conexao())->getConexao();

            $sql = "SELECT * FROM cliente;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function createCliente(ClienteModel $cliente) {
            $conexao = (new Conexao())->getConexao();

            $sql = "INSERT INTO cliente VALUES (null, :nome, :sobrenome, :email, :telefone, :endereco, :cidade, :estado, :cep, :data_cadastro);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':nome', $cliente->nome);
            $stmt->bindValue(':sobrenome', $cliente->sobrenome);
            $stmt->bindValue(':email', $cliente->email);
            $stmt->bindValue(':telefone', $cliente->telefone);
            $stmt->bindValue(':endereco', $cliente->endereco);
            $stmt->bindValue(':cidade', $cliente->cidade);
            $stmt->bindValue(':estado', $cliente->estado);
            $stmt->bindValue(':cep', $cliente->cep);
            $stmt->bindValue(':data_cadastro', $cliente->data_cadastro);

            return $stmt->execute();
        }

        public function updateCliente(ClienteModel $cliente) {
            $conexao = (new Conexao())->getConexao();

            $sql = "UPDATE cliente SET nome = :nome, sobrenome = :sobrenome, email = :email, telefone = :telefone, endereco = :endereco, cidade = :cidade, estado = :estado, cep = :cep, data_cadastro = :data_cadastro WHERE id = :id;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $cliente->id);
            $stmt->bindValue(':nome', $cliente->nome);
            $stmt->bindValue(':sobrenome', $cliente->sobrenome);
            $stmt->bindValue(':email', $cliente->email);
            $stmt->bindValue(':telefone', $cliente->telefone);
            $stmt->bindValue(':endereco', $cliente->endereco);
            $stmt->bindValue(':cidade', $cliente->cidade);
            $stmt->bindValue(':estado', $cliente->estado);
            $stmt->bindValue(':cep', $cliente->cep);
            $stmt->bindValue(':data_cadastro', $cliente->data_cadastro);

            return $stmt->execute();
        }
    }

?>