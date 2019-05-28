<?php
    include 'conexao.php';
    include 'index.php';
                
        $codigo = $_GET['codigo'];
        $codigoC = 0;
        $codigoP = 0;
        $acao = $_GET['acao'];

        $query = $build->Builder("Pedido");
        
        if ($acao == "select") {
            $result = $conn->query($query->select($codigo));
            $result = $result->fetch_assoc();
        } else {
            $result = $conn->query($query->select(0));
            $result = $result->fetch_assoc();
        }
        
        $query = $build->Builder("Produto");
        $result1 = $conn->query($query->select());
        
        $query = $build->Builder("Cliente");
        $result2 = $conn->query($query->select());
?>
        <div class='container'>
            <form method="post"
            <?php   
                if ($acao == "select") {
                    echo "action='acao.php?acao=update&codigo=$codigo&tabela=Pedido'";
                } else {
                    echo "action='acao.php?acao=insert&codigo=$codigo&tabela=Pedido'";
                }
            ?>>
                <div class="form-group">
                    <label for="Cliente">Cliente:</label>
                    <select required class="form-control" id="cliente" name="cliente">
                        <option>Selecione uma Opção</option>
            <?php
                while ($row = $result2->fetch_assoc()) {
                    echo "<option value='{$row['Código']}' ";

                    if ($result['Nome Cliente'] == $row['Nome'] and $codigo <> 0) {
                        echo "selected";
                        $GLOBALS['codigoC'] = $row['Código'];
                    }
                    echo ">{$row['Nome']}</option>";
                }
            ?>            
                    </select>
                </div>
                <div class="form-group">
                    <label for="produto">Produto:</label>
                    <select required class="form-control" id="produto" name="produto">
                        <option>Selecione uma Opção</option>
            <?php
                while ($row = $result1->fetch_assoc()) {
                    echo "<option value='{$row['Código']}' ";

                    if ($result['Nome Produto'] == $row['Nome'] and $codigo <> 0) {
                        echo "selected";
                        $GLOBALS['codigoP'] = $row['Código'];
                    }
                    echo ">{$row['Nome']}</option>";
                }
            ?>      
                    </select>
                </div>
                <div class="form-group">
                    <label for="qntd">Quantidade:</label>
                    <input required type="number" class="form-control" id="qntd" min="1" name="qntd" value="<?php
                        if ($codigo <> 0) {
                            echo $result['Quantidade'];
                    }?>" min="1">
                </div>
                <div class="form-group">
                    <label for="data">Data de solicitação:</label>
                    <input required type="date" class="form-control" id="data" name="data" value="<?php
                        if ($codigo <> 0) {
                            echo $result["Data"];
                    }?>">
                </div>
                <div class="form-group">
                    <label for="situacao">Situação:</label>
                    <select required class="form-control" id="situacao" name="situacao">
                        <option value="Em Aberto" <?php if ($result['Situação'] 
                                == "Em Aberto" and $codigo <> 0) {
                                echo "selected";
                            }?>>Em Aberto</option>
                        <option value="Em Aberto" <?php if ($result['Situação'] 
                                == "Cancelado" and $codigo <> 0) {
                                echo "selected";
                            }?>>Cancelado</option>
                        <option value="Em Aberto" <?php if ($result['Situação'] 
                                == "Pago" and $codigo <> 0) {
                                echo "selected";
                            }?>>Pago</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Modificar</button>
                <?php   
                    if ($acao == "select") {  
                        echo "<a href='acao.php?acao=delete&codigo=$codigo&tabela=Pedido>'" 
                                . "class='btn btn-info' role='button'>Deletar</a>";                     
                        echo "<a href='detalheCliente.php?acao=select&codigo="
                            . "$codigoC' class='btn btn-info' role='button'>Ver "
                            . "Cliente</a>";
                        echo "<a href='detalheProduto.php?acao=select&codigo="
                            . "$codigoP'class='btn btn-info' role='button'>Ver "
                            . "Produto</a>";
                    }
                    $conn->close(); ?>
            </form>
        </div>
    </body>
</html>