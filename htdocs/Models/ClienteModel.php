<?php
    require_once 'DAL/ClienteDAO.php';

    class ClienteModel {
        public ?int $id;
        public ?string $nome;
        public ?string $sobrenome;
        public ?string $email;
        public ?string $telefone;
        public ?string $endereco;
        public ?string $cidade;
        public ?string $estado;
        public ?string $cep;
        public ?string $data_cadastro;

        public function __construct(
            ?int $id = null,
            ?string $nome = null,
            ?string $sobrenome = null,
            ?string $email = null,
            ?string $telefone = null,
            ?string $endereco = null,
            ?string $cidade = null,
            ?string $estado = null,
            ?string $cep = null,
            ?string $data_cadastro = null
        ) {
            $this->id = $id;
            $this->nome = $nome;
            $this->sobrenome = $sobrenome;
            $this->email = $email;
            $this->telefone = $telefone;
            $this->endereco = $endereco;
            $this->cidade = $cidade;
            $this->estado = $estado;
            $this->cep = $cep;  
            $this->data_cadastro = $data_cadastro;
        }

        public function getClientes() {
            $clienteDAO = new ClienteDAO();

            $clientes = $clienteDAO->getClientes();

            foreach ($clientes as $chave => $cliente) {
                $clientes[$chave] = new ClienteModel(
                    $cliente['id'],
                    $cliente['nome'],
                    $cliente['sobrenome'],
                    $cliente['email'],
                    $cliente['telefone'],
                    $cliente['endereco'],
                    $cliente['cidade'],
                    $cliente['estado'],
                    $cliente['cep'],
                    $cliente['data_cadastro']
                );
            }

            return $clientes;
        }

        public function create() {
            $clienteDAO = new ClienteDAO();

            return $clienteDAO->createCliente($this);
        }

        public function update() {
            $clienteDAO = new ClienteDAO();

            return $clienteDAO->updateCliente($this);
        }
    }
?>