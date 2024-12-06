<?php
    require_once './models/ClienteModel.php';

    class ClienteController {
        public function getClientes() {
            $clienteModel = new ClienteModel();

            $clientes = $clienteModel->getClientes();

            return json_encode([
                'error' => null,
                'result' => $clientes
            ]);
        }

        public function createCliente() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['nome']))
                return $this->mostrarErro('Você deve informar o nome!');

            if (empty($dados['sobrenome']))
                return $this->mostrarErro('Você deve informar o sobrenome!');

            if (empty($dados['email']))
                return $this->mostrarErro('Você deve informar o email!');

            if (empty($dados['telefone']))
                return $this->mostrarErro('Você deve informar o telefone!');

            if (empty($dados['endereco']))
                return $this->mostrarErro('Você deve informar o endereco!');

            if (empty($dados['cidade']))
                return $this->mostrarErro('Você deve informar o cidade!');

            if (empty($dados['estado']))
                return $this->mostrarErro('Você deve informar o estado!');

            if (empty($dados['cep']))
                return $this->mostrarErro('Você deve informar o cep!');

            if (empty($dados['data_cadastro']))
                return $this->mostrarErro('Você deve informar a data_cadastro!');
        
            $cliente = new ClienteModel(
                null,
                $dados['nome'],
                $dados['sobrenome'],
                $dados['email'],
                $dados['telefone'],
                $dados['endereco'],
                $dados['cidade'],
                $dados['estado'],
                $dados['cep'],
                $dados['data_cadastro'],
            );

            $cliente->create();

            return json_encode([
                'error' => null,
                'result' => true
            ]);
        }

        public function updateCliente() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['id']))
                return $this->mostrarErro('Você deve informar o id!');

            if (empty($dados['nome']))
                return $this->mostrarErro('Você deve informar o nome!');

            if (empty($dados['sobrenome']))
                return $this->mostrarErro('Você deve informar o sobrenome!');

            if (empty($dados['email']))
                return $this->mostrarErro('Você deve informar o email!');

            if (empty($dados['telefone']))
                return $this->mostrarErro('Você deve informar o telefone!');

            if (empty($dados['endereco']))
                return $this->mostrarErro('Você deve informar o endereco!');

            if (empty($dados['cidade']))
                return $this->mostrarErro('Você deve informar o cidade!');

            if (empty($dados['estado']))
                return $this->mostrarErro('Você deve informar o estado!');

            if (empty($dados['cep']))
                return $this->mostrarErro('Você deve informar o cep!');

            if (empty($dados['data_cadastro']))
                return $this->mostrarErro('Você deve informar a data_cadastro!');
        
            $cliente = new ClienteModel(
                $dados['id'],
                $dados['nome'],
                $dados['sobrenome'],
                $dados['email'],
                $dados['telefone'],
                $dados['endereco'],
                $dados['cidade'],
                $dados['estado'],
                $dados['cep'],
                $dados['data_cadastro'],
            );

            $cliente->update();

            return json_encode([
                'error' => null,
                'result' => true
            ]);
        }
        private function mostrarErro(string $mensagem) {
            return json_encode([
                'error' => $mensagem,
                'result' => null
            ]);
        }
    }
?>