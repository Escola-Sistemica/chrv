<div>
  <h1 class="titulo_corpo" align="center"> Aviso </h1>
    <div class="mensagem_aviso">
      <?php

        $g_id = $_GET['id'];

        $msg_aviso = "Erro";
        $cor       = "erro";

        if ($g_id=="") {
          $msg = msgGeral('4','','nome');
        }else {

            $sql_sel_produto = "SELECT produtos.id FROM entradas INNER JOIN produtos ON entradas.produtos_id=produtos.id WHERE produtos.id='".$g_id."' AND entradas.esgotada='0'";

            $sql_sel_produto_preparado = selecionar($sql_sel_produto);

            if ($sql_sel_produto_preparado->rowCount()==0) {

              $tabela = "produtos";

              $dados = array(
                'status'          => '1'
              );

              $condicao = "id = '".$g_id."'";

              $sql_alt_produto_resultado = alterar($tabela, $dados, $condicao);

              if ($sql_alt_produto_resultado) {
                $msg_aviso = "Confirmação";
                $msg       = msgGeral('5', 'Desativação', 'produto');
                $cor       = "confirmacao";
              }else {
                $msg = msgGeral('2', 'desativação', 'produto');
              }
            }else {
              $msg = msgGeral('7','produto','movimentações');
            }
          }
  ?>
  <!--class erro e sucesso -->
      <h3 class="<?php echo $cor ?>" ><?php echo $msg_aviso ?></h3>
      <p><?php echo $msg ?></p>
      <hr/ class="limpa_float">
      <a class="icone" href="?folder=registros/produto/&file=registro_produto_produto&ext=php"><i class="fa fa-reply" aria-hidden="true"></i>Voltar</a>
    </div>
</div>
