<?php
    include 'conexao.php';
    include 'index.php';
                
        $codigo = $_GET['codigo'];
        $acao = $_GET['acao'];

        $query = $build->Builder("Produto");
        
        if ($acao == "select") {
            $result = $conn->query($query->select($codigo));
            $result = $result->fetch_assoc();
        } else {
            $result = $conn->query($query->select(0));
            $result = $result->fetch_assoc();
        }
        
        $query = $build->Builder("Pedido");
        $result1 = $conn->query($query->select());
?>
        <div class='container'>
            <form method="post"
            <?php   
                if ($acao == "select") {
                    echo "action='acao.php?acao=update&codigo=$codigo&tabela=Produto'";
                } else {
                    echo "action='acao.php?acao=insert&codigo=$codigo&tabela=Produto'";
                }
            ?>>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input required type="text" class="form-control" name="nome" id="nome" value="<?php
                        if ($codigo <> 0) {
                            echo $result['Nome'];
                    }?>">
                </div>
                <div class="form-group">
                    <label for="barra">Código de barras:</label>
                    <input required type="text" class="form-control" name="barra" id="barra" value="<?php
                        if ($codigo <> 0) {
                            echo $result['Código de Barra'];
                    }?>">
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input required type="text" class="form-control" name="preco" id="preco" value="<?php
                        if ($codigo <> 0) {
                            echo $result['Preço'];
                    }?>">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input required type="text" class="form-control" name="descricao" id="descricao" value="<?php
                        if ($codigo <> 0) {
                            echo $result['Descrição'];
                    }?>">
                </div>
                <button type="submit" class="btn btn-primary">Modificar</button>
                <?php   
                    $valido = true;
                    while ($row = $result1->fetch_assoc()) {
                        if ($row['Nome Cliente'] == $result['Nome']) {
                            $valido = false;
                            break;
                        }
                    }
                    if ($acao == "select") {
                        echo "<a href='acao.php?acao=delete&codigo=$codigo&tabela=Produto'" 
                                . "class='btn btn-info ";
                        if (!$valido) {                            
                            echo "disabled'";
                        }
                                          
                            echo "' role='button'>Deletar</a>";
                    }
                    $conn->close(); ?>
            </form>
        </div>
    </body>
</html>