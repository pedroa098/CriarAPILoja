<?php
    require_once 'DAL/PedidoDAO.php';

    class PedidoModel {
        public ?int $id;
        public ?int $cliente_id;
        public ?string $data_pedido;
        public ?string $status;
        public ?float $valor_total;
        public ?string $observacoes;

        public function __construct(
            ?int $id = null,
            ?int $cliente_id = null,
            ?string $data_pedido = null,
            ?string $status = null,
            ?float $valor_total = null,
            ?string $observacoes = null,
        )
        {
            $this->id = $id;
            $this->cliente_id = $cliente_id;
            $this->data_pedido = $data_pedido;
            $this->status = $status;
            $this->valor_total = $valor_total;
            $this->observacoes = $observacoes;
        }

        public function getPedido() {
            $pedidoDAO = new PedidoDAO();

            $pedidos = $pedidoDAO->getPedido();

            foreach ($pedidos as $chave => $pedido) {
                $pedido[$chave] = new PedidoModel(
                    $pedido['id'],
                    $pedido['cliente_id'],
                    $pedido['data_pedido'],
                    $pedido['status'],
                    $pedido['valor_total'],
                    $pedido['observacoes'],
                );
            }

            return $pedidos;
        }    

        public function create() {
            $pedidoDAO = new PedidoDAO();

            return $pedidoDAO->createPedido($this);
        }

    }
?>