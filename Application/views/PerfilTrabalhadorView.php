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
                                <img src="public/assets/img/">
                                <div><?=$oUsuarioData['usuario_nome']?></div>
                                <div><?=$oUsuarioData['avaliacao_nota']?></div>
                                <div>Trabalhos<u><?=$sLi?></u></div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    <!-- ----------------------------------------------------------- -->

                    <!-- Link to open the modal -->
                    <p><a href="#ex1" rel="modal:open">Contatar</a></p>
                    <p><a href="#ex2" rel="modal:open">Avaliar</a></p>
                    <button class="btn btn-primary btn-lg" type="submit">Whastapp</button>
                    
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
                                $aUser1 = $aUsuario[$i];
                                $aUser2 = (isset($aUsuario[$i + 1]) ? $aUsuario[$i + 1] : '');
                                
                                $sUser1 = '';
                                $sUser2 = '';

                                if (count($aUser1) > 0) 
                                {
                                    $sUser1 = ' <div>' . $aUser1['usuario_nome'] . '</div>
                                                <div>' . $aUser1['avaliacao_mensagem'] . '</div>';
                                } 
                                else if (count($aUser2) > 0) 
                                {
                                    $sUser2 = ' <div>' . $aUser2['usuario_nome'] . '</div>
                                                <div>' . $aUser2['avaliacao_mensagem'] . '</div>';
                                }

                                include('HomeSearchView.php');
                            }
                        }
                    ?>
                </form>
            </div>
        </main>
    </div>
</div>
<!-- Modal HTML embedded directly into document -->
<div id="ex1" class="modal">
    <p>Thanks for clicking. That felt good.</p>
    <a href="#" rel="modal:close">Close</a>
</div>
<div id="ex2" class="modal">
    <p>Thanks for clicking. That felt good.</p>
    <a href="#" rel="modal:close">Close</a>
</div>