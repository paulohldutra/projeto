<!DOCTYPE html>
<html lang="pt-br">
    <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
	<div class="container" class="table-responsive">        
            <ul class="nav nav-pills">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Pedido</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item mr-sm-4" href="listar.php?tabela=Pedido">Listar</a>
                        <a class="dropdown-item mr-sm-4" href="detalhePedido.php?acao=insert&codigo=0">Inserir</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Cliente</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item mr-sm-4" href="listar.php?tabela=Cliente">Listar</a>
                        <a class="dropdown-item mr-sm-4" href="detalheCliente.php?acao=insert&codigo=0">Inserir</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-sm-2" data-toggle="dropdown" href="#">Produto</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item mr-sm-4" href="listar.php?tabela=Produto">Listar</a>
                        <a class="dropdown-item mr-sm-4" href="detalheProduto.php?acao=insert&codigo=0">Inserir</a>
                    </div>
                </li>
            </ul>
        </div>