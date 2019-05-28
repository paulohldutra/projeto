        <?php
            require 'index.php';
            require 'conexao.php';
                
            $tabela = $_GET['tabela'];

            $query = $build->Builder($tabela);
            $result = $conn->query($query->select());

            if ($result->num_rows > 0) {
                echo "<div class='container'><h2>$tabela</h2><table class='table table-hover'><thead><tr>";
                    
                foreach (mysqli_fetch_fields($result) as $value) {
                    if ($value->name == "Código") {
                        continue;
                    }
                    echo "<th>$value->name</th>";
                }

                echo "<th>Exibir</th>";
                echo "</tr></thead><tbody>"; 

                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($row as $key => $value) {
                        if ($key == "Código") {
                            continue;
                        }
                        echo "<td>$value</td>";
                    }
                    switch ($tabela) {
                        case "Pedido":
                            echo "<th><a href='detalhePedido.php?acao=select&"
                                    . "codigo={$row['Código']}' class='btn "
                                    . "btn-info' role='button'>Editar</a></th>";
                            echo "</tr>";
                            break;
                        case "Cliente":
                            echo "<th><a href='detalheCliente.php?acao=select&"
                                    . "codigo={$row['Código']}' class='btn "
                                    . "btn-info' role='button'>Editar</a></th>";
                            echo "</tr>";
                            break;
                        case "Produto":
                            echo "<th><a href='detalheProduto.php?acao=select&"
                                    . "codigo={$row['Código']}' class='btn "
                                    . "btn-info' role='button'>Editar</a></th>";
                            echo "</tr>";
                            break;
                    }
                }
                echo "</tbody></table></div>";
            } else {
                echo "<th>Nenhum resultado encontrado</th></tr></thead></div>";
            }
            $conn->close();
         ?>
    </body>
</html>