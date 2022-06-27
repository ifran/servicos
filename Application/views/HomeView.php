<?php
    $oServicos = new Servicos();
    $aServicos = $oServicos->servicosAprovados();
    
    $sOption = '<option value="">--- Sem Avalia&ccedil;&atilde;o ---</option>';
    foreach ($aServicos as $oServicos)
    {
        $sOption .= '<option value="' . $oServicos['servico_id'] . '" ' . setSelected('trabalho', $oServicos['servico_id']) . '>' . $oServicos['servico_nome'] . '</option>';
    }
?>
<div class="container">
    <div id="tabs">
        <main>
            <ul>
                <li><a href="#fragment-1"><span>Trabalho</span></a></li>
            </ul>
            <div class="register aba">                
                <form action="Home" method="post">
                    <div class="col-12">
                        <label for="trabalho" class="form-label">Trabalho</label>
                        <select id="trabalho" name="trabalho">
                            <?=$sOption?>
                        </select>
                        <div class="invalid-feedback">
                            Trabalho
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="avaliacao" class="form-label">Avaliação</label>
                        <select id="avaliacao" name="avaliacao">
                            <option value="">--- Sem Avalia&ccedil;&atilde;o ---</option>
                            <option value="1" <?=setSelected('avaliacao', 1)?>>1 estrela</option>
                            <option value="2" <?=setSelected('avaliacao', 2)?>>2 estrelas</option>
                            <option value="3" <?=setSelected('avaliacao', 3)?>>3 estrelas</option>
                            <option value="4" <?=setSelected('avaliacao', 4)?>>4 estrelas</option>
                            <option value="5" <?=setSelected('avaliacao', 5)?>>5 estrelas</option>
                        </select>
                        <div class="invalid-feedback">
                            Avaliacao
                        </div>
                    </div>

                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit" value="buscar">Buscar</button>
                </form>

                <h2>Resultados</h2>

                <?php 
                    if ($_POST)
                    {
                        $oUsuario = new Usuario();
                        $aUsuario = $oUsuario->buscarServicosUsuario($_POST['trabalho'], $_POST['avaliacao']);

                        for ($i = 0; $i < count($aUsuario); $i++)
                        {
                            $aUser1 = array();
                            $aUser2 = array();
                            
                            if (($i % 2) == 0)
                            {
                                $aUser1 = $aUsuario[$i];
                                $aUser2 = (isset($aUsuario[$i + 1]) ? $aUsuario[$i + 1] : '');
                                
                                $sUser1 = '';
                                $sUser2 = '';
                                
                                $sUserImg1 = '';
                                $sUserImg2 = '';

                                $sUserLink1 = '';
                                $sUserLink2 = '';
                                
                                if (isset($aUser1['usuario_id']))
                                {
                                    $sUserLink1 = $aUser1['usuario_id'];
                                    $sUserImg1 = '<img class="imagem" src="public/assets/imguser/' . $aUser1['usuario_foto'] . '">';
                                    $sUser1 = ' <div>' . $aUser1['usuario_nome'] . '</div>
                                                <div>' . $aUser1['avaliacao_nota'] . '</div>
                                                <div>' . $aUser1['servico_nome'] . '</div>';
                                }
                                
                                if (isset($aUser2['usuario_id']))
                                {
                                    $sUserLink2 = $aUser2['usuario_id'];
                                    $sUserImg2 = '<img class="imagem" src="public/assets/imguser/' . $aUser2['usuario_foto'] . '">';
                                    $sUser2 = ' <div>' . $aUser2['usuario_nome'] . '</div>
                                                <div>' . $aUser2['avaliacao_nota'] . '</div>
                                                <div>' . $aUser2['servico_nome'] . '</div>';
                                }
                                
                                include('HomeSearchView.php');
                            }
                            else 
                            {
                                continue;
                            }
                        }
                    }
                ?>
            </div>
        </main>
    </div>
</div>