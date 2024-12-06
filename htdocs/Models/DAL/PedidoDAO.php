<?php
    require_once 'Conexao.php';

    class PedidoDAO {
        public function getPedido() {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM pedido;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function createPedido(PedidoModel $pedido) {
            $conexao = (new conexao())->getConexao();

            $sql = "INSERT INTO pedido VALUES (null, :cliente_id, :data_pedido, :status, :valor_total, :observacoes)";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':cliente_id', $pedido->cliente_id);
            $stmt->bindValue(':data_pedido', $pedido->data_pedido);
            $stmt->bindValue(':status', $pedido->status);
            $stmt->bindValue(':valor_total', $pedido->valor_total);
            $stmt->bindValue(':observacoes', $pedido->observacoes);

            return $stmt->execute();
        }

    }
?>