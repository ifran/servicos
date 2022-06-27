<?php
    $oUsuario = new Usuario();
    $aUsuario = $oUsuario->buscarUsuario($_GET['iUsuarioId']);
    
    $oUsuarioData = $aUsuario[0];
    $sLi = '';
    foreach ($aUsuario as $oItem)
    {
        $sLi .= '<li>' . $oItem['servico_nome'] . '</li>';
    }
?>
<div class="container">
    <div id="tabs">
        <main>
            <ul>
                <li><a href="#fragment-1"><span>Trabalho</span></a></li>
            </ul>
            
            <div class="register">
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="col-sm">
                                <img class="imagem" src="<?=HOST_PUBLIC?>public/assets/imguser/<?=$oUsuarioData['usuario_foto']?>">
                                <div><?=$oUsuarioData['usuario_nome']?></div>
                                <div><?=$oUsuarioData['avaliacao_nota']?></div>
                                <div>Preço base: <?=$oUsuarioData['usuario_preco']?></div>
                                <div>Trabalhos<u><?=$sLi?></u></div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <!-- ----------------------------------------------------------- -->
                    
                    <!-- Abrir modal -->
                    <?php if ($_SESSION['bLogin'] != $_GET['iUsuarioId']) { ?>
                        <p><a href="#contatar" rel="modal:open">Contatar</a></p>
                        <p><a href="#avaliar" rel="modal:open">Avaliar</a></p>
                        <button class="btn btn-primary btn-lg" type="submit">Whastapp</button>
                    <?php } ?>

                    <hr class="my-4">

                    <h2>Avalicações</h2>
                    <?php 
                        $oAvaliacao = new Avaliacao();
                        $aAvaliacao = $oAvaliacao->buscarAvaliacoes($_GET['iUsuarioId']);

                        for ($i = 0; $i < count($aAvaliacao); $i++)
                        {
                            $aUser1 = array();
                            $aUser2 = array();
                            if ($i % 2 == 0)
                            {
                                $aUser1 = $aAvaliacao[$i];
                                $aUser2 = (isset($aAvaliacao[$i + 1]) ? $aAvaliacao[$i + 1] : '');
                                
                                $sUser1 = '';
                                $sUser2 = '';
                                
                                if (isset($aUser1['usuario_nome']))
                                {
                                    $sUser1 = ' <div>' . $aUser1['usuario_nome'] . '</div>
                                                <div>' . $aUser1['avaliacao_mensagem'] . '</div>
                                                <div>' . $aUser1['avaliacao_nota'] . ' estrelas</div>
                                                ';
                                } 
                                if (isset($aUser2['usuario_nome']))
                                {
                                    $sUser2 = ' <div>' . $aUser2['usuario_nome'] . '</div>
                                                <div>' . $aUser2['avaliacao_mensagem'] . '</div>
                                                <div>' . $aUser2['avaliacao_nota'] . '</div>
                                                ';
                                }

                                include('AvaliacaoView.php');
                            }
                        }
                    ?>
                </form>
            </div>
        </main>
    </div>
</div>

<!-- Modais -->
<div id="contatar" class="modal">
    <form action="../registerProcess.php" method="post">
        <input type="hidden" name="usuario_contratado" value="<?=$_GET['iUsuarioId']?>">
        <table class="tabela">
            <tr>
                <td class="coluna">Mensagem</td>
                <td class="coluna"><textarea name="mensagem"></textarea></td>
            </tr>
            <tr>
                <td class="coluna">Data</td>
                <td class="coluna"><input type="date" name="data"></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center coluna"><input type="submit" value="Contatar" name="contatar"></td>
            </tr>
        </table>
    </form>
</div>

<div id="avaliar" class="modal">
    <form action="../registerProcess.php" method="post">
        <input type="hidden" name="usuario_contratado" value="<?=$_GET['iUsuarioId']?>">
        <table class="tabela">
            <tr>
                <td class="coluna">Nota</td>
                <td class="coluna">
                    <select name="nota">
                        <option>--- Sem Avalia&ccedil;&atilde;o ---</option>
                        <option value="1">1 estrela</option>
                        <option value="2">2 estrelas</option>
                        <option value="3">3 estrelas</option>
                        <option value="4">4 estrelas</option>
                        <option value="5">5 estrelas</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="coluna">Mensagem</td>
                <td class="coluna"><textarea name="mensagem"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center coluna"><input type="submit" value="Avaliar" name="avaliar"></td>
            </tr>
        </table>
    </form>
</div>