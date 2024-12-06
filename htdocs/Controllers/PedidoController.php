<?php
    require_once './models/PedidoModel.php';

    class PedidoController {
        public function getPedido() {
            $pedidoModel = new PedidoModel();

            $pedido = $pedidoModel->getPedido();

            return json_encode([
                'error' => null,
                'result' => $pedido
            ]);
        }

        public function createPedido() {
            $dados = json_decode(file_get_contents('php://input'), true);

            if (empty($dados['cliente_id']))
                return $this->mostrarErro('Você deve informar o cliente_id');

            if (empty($dados['data_pedido']))
                return $this->mostrarErro('Você deve informar o data_pedido');

            if (empty($dados['status']))
                return $this->mostrarErro('Você deve informar o status');

            if (empty($dados['valor_total']))
                return $this->mostrarErro('Você deve informar o valor_total');

            if (empty($dados['observacoes']))
                return $this->mostrarErro('Você deve informar o observacoes');


            $pedido = new PedidoModel(
                null,
                $dados['cliente_id'],
                $dados['data_pedido'],
                $dados['status'],
                $dados['valor_total'],
                $dados['observacoes'],
            );

            $pedido->create();

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