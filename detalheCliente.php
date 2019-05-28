<?php
    include 'conexao.php';
    include 'index.php';
                
        $codigo = $_GET['codigo'];
        $acao = $_GET['acao'];

        $query = $build->Builder("Cliente");
        
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
                    echo "action='acao.php?acao=update&codigo=$codigo&tabela=Cliente'";
                } else {
                    echo "action='acao.php?acao=insert&codigo=$codigo&tabela=Cliente'";
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
                    <label for="cpf">CPF:</label>
                    <input required type="text" class="form-control" name="cpf" id="cpf" value="<?php
                        if ($codigo <> 0) {
                            echo $result['CPF'];
                    }?>">
                </div>
                <div class="form-group">
                    <label for="data">Data de nascimento:</label>
                    <input required type="date" max="<?=date("d m Y")?>" class="form-control" id="data" name="data" value="<?php
                        if ($codigo <> 0) {
                            echo $result['Data Nascimento'];
                    }?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required type="email" class="form-control" id="email" name="email" value="<?php
                        if ($codigo <> 0) {
                            echo $result['Email'];
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
                        echo "<a href='acao.php?acao=delete&codigo=$codigo&tabela=Cliente'" 
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