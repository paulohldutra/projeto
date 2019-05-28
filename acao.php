<?php
    include 'conexao.php';
                
        $codigo = $_GET['codigo'];
        $acao = $_GET['acao'];
        $tabela = $_GET['tabela'];

        $query = $build->Builder($tabela);
        
        switch ($acao) {
            case "update":
                switch ($tabela) {
                    case "Pedido":
                        $cod_produto = $_POST['produto'];
                        $cod_cliente = $_POST['cliente'];
                        $data_pedido = $_POST['data'];
                        $qntd = $_POST['qntd'];
                        $situacao = $_POST['situacao'];
                        
                        $conn->query($query->update($codigo, $cod_cliente, 
                                    $cod_produto, $data_pedido, $qntd, $situacao));
                        $conn->close();
                            
                        header("Location:detalhePedido.php?acao=select&codigo=$codigo");
                        break;
                    case "Cliente":
                        $nome_cliente = $_POST['nome'];
                        $cpf = $_POST['cpf'];
                        $data_nasc = $_POST['data'];
                        $email = $_POST['email'];
                        
                        $conn->query($query->update($codigo, $nome_cliente, 
                                    $cpf, $data_nasc, $email));
                        $conn->close();
                            
                        header("Location:detalheCliente.php?acao=select&codigo=$codigo");
                        break;
                    case "Produto":
                        $nome_produto = $_POST['nome'];
                        $cod_barra = $_POST['barra'];
                        $descricao = $_POST['descricao'];
                        $preco = $_POST['preco'];
                        
                        $conn->query($query->update($codigo, $nome_produto, 
                                    $cod_barra, $descricao, $preco));
                        $conn->close();
                            
                        header("Location:detalheProduto.php?acao=select&codigo=$codigo");
                        break;
                }
                break;
            case "insert":
                switch ($tabela) {
                    case "Pedido":
                        $cod_produto = $_POST['produto'];
                        $cod_cliente = $_POST['cliente'];
                        $data_pedido = $_POST['data'];
                        $qntd = $_POST['qntd'];
                        $situacao = $_POST['situacao'];
                        
                        $conn->query($query->insert($cod_produto, $cod_cliente, 
                                    $data_pedido, $qntd, $situacao));
                        $conn->close();
                        break;
                    case "Cliente":
                        $nome_cliente = $_POST['nome'];
                        $cpf = $_POST['cpf'];
                        $data_nasc = $_POST['data'];
                        $email = $_POST['email'];
                        
                        $conn->query($query->insert($nome_cliente, $cpf, 
                                    $data_nasc, $email));
                        $conn->close();
                        break;
                    case "Produto":
                        $nome_produto = $_POST['nome'];
                        $cod_barra = $_POST['barra'];
                        $descricao = $_POST['descricao'];
                        $preco = $_POST['preco'];
                        
                        $conn->query($query->insert($nome_produto, $cod_barra,
                                $descricao, $preco));
                        $conn->close();
                        break;
                }
                header("Location:listar.php?tabela=$tabela");
                break;
            case "delete":  
                $conn->query($query->delete($codigo));
                $conn->close();
                header("Location:listar.php?tabela=$tabela");
                break;
        }
?>