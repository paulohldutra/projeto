<?php
    $servername = "localhost";
    $username = "paulo";
    $password = "LOKO0525";
    $db = "projeto";

    $conn = new mysqli($servername, $username, $password, $db);
    
    class Tabela {
        protected function select($tipo) {
            switch ($tipo) {
                case "Pedido":
                    return (string) "SELECT ped.cod_pedido 'Código', "
                            . "cli.nome_cliente 'Nome Cliente', cli.cpf 'CPF', "
                            . "cli.email 'Email', ped.data_pedido 'Data', "
                            . "pro.cod_barra 'Codigo Barras', pro.nome_produto "
                            . "'Nome Produto', pro.preco 'Preço', ped.qntd "
                            . "'Quantidade', ped.situacao 'Situação' FROM pedido "
                            . "ped, cliente cli, produto pro WHERE "
                            . "ped.cod_cliente = cli.cod_cliente AND "
                            . "ped.cod_produto = pro.cod_produto ";
                break;
                case "Cliente":                
                    return (string) "SELECT cod_cliente 'Código', nome_cliente "
                            . "'Nome', cpf 'CPF', data_nasc 'Data Nascimento', "
                            . "email 'Email' FROM cliente WHERE cod_cliente = ";
                break;
                case "Produto":
                    return (string) "SELECT cod_produto 'Código', nome_produto "
                            . "'Nome', cod_barra 'Código de Barra', descricao "
                            . "'Descrição', preco 'Preço' FROM produto WHERE "
                            . "cod_produto = ";
                break;
            }
        }
    
        protected function inserti($tipo) {
            switch ($tipo) {
                case "Pedido":
                    return (string) "INSERT INTO pedido(cod_cliente, cod_produto, "
                            . "data_pedido, qntd, situacao) VALUES ";
                break;
                case "Cliente":                
                    return (string) "INSERT INTO cliente(nome_cliente, cpf, "
                            . "data_nasc, email) VALUES ";
                break;
                case "Produto":
                    return (string) "INSERT INTO produto(nome_produto, cod_barra, "
                            . "descricao, preco) VALUES ";
                break;
            }
        }
    
        protected function updatei($tipo) {
            switch ($tipo) {
                case "Pedido":
                    return (string) "UPDATE pedido SET ";
                break;
                case "Cliente":                
                    return (string) "UPDATE cliente SET ";
                break;
                case "Produto":
                    return (string) "UPDATE produto SET ";
                break;
            }
        }
    
        protected function delete($tipo) {
            switch ($tipo) {
                case "Pedido":
                    return (string) "DELETE FROM pedido WHERE ";
                break;
                case "Cliente":                
                    return (string) "DELETE FROM cliente WHERE ";
                break;
                case "Produto":
                    return (string) "DELETE FROM produto WHERE ";
                break;
            }
        }
    }
    
    class Pedido extends Tabela {  
        function Pedido() {}
        
        public function select($cod_pedido = null, $cod_produto = 
                "ped.cod_produto", $cod_cliente = "ped.cod_cliente", 
                $data_pedido = "ped.data_pedido", $qntd = "ped.qntd", $situacao 
                = "ped.situacao") {
            if ($cod_pedido == null) {
                return (string) parent::select("Pedido") . " ORDER BY "
                        . "ped.cod_pedido DESC";
            } else {
                return (string) parent::select("Pedido") . " AND ped.cod_pedido = "
                        . "$cod_pedido AND ped.cod_cliente = $cod_cliente  AND "
                        . "ped.cod_produto = $cod_produto AND ped.data_pedido = "
                        . "$data_pedido AND ped.qntd = $qntd AND ped.situacao = "
                        . "$situacao ORDER BY ped.cod_pedido DESC";
            }        
        }
    
        public function insert($cod_produto, $cod_cliente, $data_pedido, $qntd, 
                $situacao) {
            return (string) parent::inserti("Pedido") . "($cod_produto, "
                    . "$cod_cliente, '$data_pedido', $qntd, '$situacao')";
        }
    
        public function update($cod_pedido, $cod_produto, $cod_cliente, 
                $data_pedido, $qntd, $situacao) {
            return (string) parent::updatei("Pedido") . "cod_cliente = "
                    . "$cod_cliente, cod_produto = $cod_produto, data_pedido = "
                    . "'$data_pedido', qntd = $qntd, situacao = '$situacao' WHERE "
                    . "cod_pedido = $cod_pedido";
        }
        
        public function delete($cod_pedido) {
            return (string) parent::delete("Pedido") . "cod_pedido = $cod_pedido";
        }
    }
    
    class Cliente extends Tabela {
        function Cliente() {}
        
        public function select($cod_cliente = null, $nome_cliente = 
                "nome_cliente", $cpf = "cpf", $data_nasc = "data_nasc", $email = 
                "email") {
            if ($cod_cliente == null) {
                return (string) parent::select("Cliente") . "cod_cliente ORDER "
                        . "BY cod_cliente DESC";
            } else {
                return (string) parent::select("Cliente") . "$cod_cliente AND "
                        . "nome_cliente = $nome_cliente  AND cpf = $cpf AND "
                        . "data_nasc = $data_nasc AND email = $email ORDER BY "
                        . "cod_cliente DESC";
            }        
        }
    
        public function insert($nome_cliente, $cpf, $data_nasc, $email) {
            return (string) parent::inserti("Cliente") . "('$nome_cliente', '$cpf', "
                    . "'$data_nasc', '$email')";
        }
    
        public function update($cod_cliente, $nome_cliente, $cpf, $data_nasc, 
                $email) {
            return (string) parent::updatei("Cliente") . "nome_cliente = "
                    . "'$nome_cliente', cpf = '$cpf', data_nasc = '$data_nasc', email "
                    . "= '$email' WHERE cod_cliente = $cod_cliente";
        }
    
        public function delete($cod_cliente) {
            return (string) parent::delete("Cliente") . "cod_cliente = "
                    . "$cod_cliente";
        }
    }
    
    class Produto extends Tabela {  
        public function Produto() {}
        
        public function select($cod_produto = null, $nome_produto = 
                "nome_produto", $descricao = "descricao", $cod_barra = 
                "cod_barra", $preco = "preco") {
            if ($cod_produto == null) {
                return (string) parent::select("Produto") . "cod_produto ORDER "
                        . "BY cod_produto DESC";
            } else {
                return (string) parent::select("Produto") . "$cod_produto AND "
                        . "nome_produto = $nome_produto  AND descricao = "
                        . "$descricao AND cod_barra = $cod_barra AND preco = "
                        . "$preco ORDER BY cod_produto DESC";
            }        
        }
    
        public function insert($nome_produto, $cod_barra, $descricao, $preco) {
            return (string) parent::inserti("Produto") . "('$nome_produto', "
                    . "'$cod_barra', '$descricao', " . (float) $preco . ")";
        }
    
        public function update($cod_produto, $nome_produto, $cod_barra, 
                $descricao, $preco) {
            return (string) parent::updatei("Produto") . "nome_produto =  "
                    . "'$nome_produto', cod_barra = '$cod_barra', descricao = "
                    . "'$descricao', preco = " . (float) $preco . " WHERE "
                    . "cod_produto = $cod_produto";
        }
    
        public function delete($cod_produto) {
            return (string) parent::delete("Produto") . "cod_produto = "
                    . "$cod_produto";
        }
    }
    
    class Buider {
        public function Builder($tipo = null) {
            switch ($tipo) {
                case "Pedido":
                    return new Pedido();
                break;
                case "Cliente":                
                    return new Cliente();
                break;
                case "Produto":
                    return new Produto();
                break;
            }
        }
    }
    
    $build = new Buider();
?>