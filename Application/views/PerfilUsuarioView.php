<?php
    /******************************************
     * Montando a aba de perfil do usuario INI 
    ******************************************/
    {
        $oUsuario = new Usuario();
        $aUsuario = $oUsuario->buscarUsuario($_SESSION['bLogin']);
        
        $oUsuarioData = $aUsuario[0];
        $sLi = '';
        foreach ($aUsuario as $oItem)
        {
            $sLi .= '<li>' . $oItem['servico_nome'] . '</li>';
        }

        $oServicos = new Servicos();
        $aServicos = $oServicos->servicosAprovados();
        
        $sSql = 'SELECT servico_id FROM usuario_servico WHERE usuario_id = ' . $_SESSION['bLogin'];
        $oUsuarioServ = new Usuario();
        $oUsuarioServId = $oUsuarioServ->select($sSql);

        $aUserServId = array();
        foreach ($oUsuarioServId as $oItem)
        {
            $aUserServId[] = $oItem['servico_id'];
        }

        $sOption = '';
        foreach ($aServicos as $oServicos)
        {
            $sSelected = (in_array($oServicos['servico_id'], $aUserServId) ? 'selected' : '');
            $sOption .= '<option ' . $sSelected . ' value="' . $oServicos['servico_id'] . '">' . $oServicos['servico_nome'] . '</option>';
        }
    }
    /******************************************
     * Montando a aba de perfil do usuario FIM
    ******************************************/

    /*******************************************
     * Montando a aba de Agenda de Servicos INI 
    *******************************************/
    {
        $sSql = 'SELECT * FROM agenda a 
                INNER JOIN usuario u ON (u.usuario_id = a.usuario_solicitante_id)
                WHERE a.agenda_aprovacao = 1 AND a.usuario_contratado_id = ' . $_SESSION['bLogin'];
        
        $oAgenda = new Agenda();
        $oAgendaAprovado = $oAgenda->select($sSql);
        
        $sDivAprovado = '';
        foreach ($oAgendaAprovado as $oItem)
        {
            $sDivAprovado .= "<div>" . $oItem['usuario_nome'] . " - " . $oItem['agenda_data']  . " - " . $oItem['agenda_mensagem'] . "</div>";
        }

        $sSql = 'SELECT * FROM agenda a 
                INNER JOIN usuario u ON (u.usuario_id = a.usuario_solicitante_id)
                WHERE a.agenda_aprovacao = 0 AND a.usuario_contratado_id = ' . $_SESSION['bLogin'];
        $oAgenda = new Agenda();
        $oAgendaPendente = $oAgenda->select($sSql);

        $sDivPend = '';
        foreach ($oAgendaPendente as $oItem)
        {
            $sDivPend .= '<form action="registerProcess.php" method="post">';
            $sDivPend .= "<div>" . $oItem['usuario_nome'] . " - " . $oItem['agenda_data']  . " - " . $oItem['agenda_mensagem'] . "</div>";
            $sDivPend .= '<input type="hidden" name="agenda" value="' . $oItem['agenda_id']. '">';
            $sDivPend .= '<button class="btn btn-primary btn-lg" name="aceitar" value="1" type="submit">Aceitar</button>';
            $sDivPend .= '<button class="btn btn-primary btn-lg" name="negar" value="2" type="submit">Negar</button>';
            $sDivPend .= '</form>';
        }
    }
    /*******************************************
     * Montando a aba de Agenda de Servicos FIM
    *******************************************/

    /*********************************************
     * Montando a aba de Servicos Solicitados INI 
    *********************************************/
    {
        $sSql = 'SELECT * FROM agenda a 
                INNER JOIN usuario u ON (u.usuario_id = a.usuario_contratado_id)
                WHERE a.agenda_aprovacao = 1 
                AND a.usuario_solicitante_id = ' . $_SESSION['bLogin'];
        
        $oAgenda = new Agenda();
        $oAgendaAprovado = $oAgenda->select($sSql);
        
        $sDivMeuAprovado = '';
        foreach ($oAgendaAprovado as $oItem)
        {
            $sDivMeuAprovado .= "<div>" . $oItem['usuario_nome'] . " - " . $oItem['agenda_data']  . " - " . $oItem['agenda_mensagem'] . "</div>";
        }

        $sSql = 'SELECT * FROM agenda a 
                INNER JOIN usuario u ON (u.usuario_id = a.usuario_contratado_id)
                WHERE a.agenda_aprovacao IN (0, 2) 
                AND a.usuario_solicitante_id = ' . $_SESSION['bLogin'];
        $oAgenda = new Agenda();
        $oAgendaPendente = $oAgenda->select($sSql);

        $sDivMeuSol = '';
        foreach ($oAgendaPendente as $oItem)
        {
            $sDivMeuSol .= "<div>" . $oItem['usuario_nome'] . " - " . $oItem['agenda_data']  . " - " . $oItem['agenda_mensagem'];
            $sDivMeuSol .= " - <b>" .($oItem['agenda_aprovacao'] == 0 ? 'Aberto' : 'Negado') . "</b></div>";
        }
    }
    /*********************************************
     * Montando a aba de Servicos Solicitados FIM
    *********************************************/

    /*********************************************
     * Montando a aba de ADMIN INI 
    *********************************************/
    {
        $sLiAdmin = '';
        if ($oUsuarioData['usuario_tipo'] == 1)
        {
            $sLiAdmin = '<li><a href="#fragment-4"><span>Serviços Aprovação</span></a></li>';

            $sSql = 'SELECT * FROM servicos WHERE servico_aprovacao = ' . 0;
            $oServicos = new Servicos();
            $aServicos = $oServicos->select($sSql);

            $sDivAdmin = '';
            foreach ($aServicos as $oItem)
            {
                $sDivAdmin .= '<form action="registerProcess.php" method="post">';
                $sDivAdmin .= "<div>" . $oItem['servico_nome'] . "</div>";
                $sDivAdmin .= '<input type="hidden" name="servico" value="' . $oItem['servico_id']. '">';
                $sDivAdmin .= '<button class="btn btn-primary btn-lg" name="aceitarServico" value="1" type="submit">Aceitar</button>';
                $sDivAdmin .= '<button class="btn btn-primary btn-lg" name="negarServico" value="2" type="submit">Negar</button>';
                $sDivAdmin .= '</form>';
            }
        }
    }
    /*********************************************
     * Montando a aba de ADMIN FIM
    *********************************************/
?>
<div class="container">
    <div id="tabs">
        <main>
            <ul>
                <li><a href="#fragment-1"><span>Perfil</span></a></li>
                <li><a href="#fragment-2"><span>Agenda de Serviços</span></a></li>
                <li><a href="#fragment-3"><span>Serviços Solicitados</span></a></li>
                <?=$sLiAdmin?>
            </ul>
            
            <!-- ---------------------- Perfil ---------------------- -->
            <div class="register" id="fragment-1">
                <form action="<?=HOST_PUBLIC?>registerProcess.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="col-sm">
                                <img class="imagem" src="public/assets/imguser/<?=$oUsuarioData['usuario_foto']?>">
                                <div><?=$oUsuarioData['avaliacao_nota']?></div>
                                <div><?=$oUsuarioData['servico_nome']?></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="nome" name="foto">
                        <div class="invalid-feedback">
                            Foto
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="nome" class="form-control" id="nome" name="nome" value="<?=$oUsuarioData['usuario_nome']?>">
                        <div class="invalid-feedback">
                            Nome Completo
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=$oUsuarioData['usuario_email']?>">
                        <div class="invalid-feedback">
                            E-mail
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?=$oUsuarioData['usuario_senha']?>">
                        <div class="invalid-feedback">
                            Senha
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="Telefone" class="form-label">Telefone</label>
                        <input type="Telefone" class="form-control" id="Telefone" name="telefone" value="<?=$oUsuarioData['usuario_telefone']?>">
                        <div class="invalid-feedback">
                            Telefone
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="CPF" class="form-label">CPF</label>
                        <input type="CPF" class="form-control" id="CPF" name="cpf" value="<?=$oUsuarioData['usuario_cpf']?>">
                        <div class="invalid-feedback">
                            CPF
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?=$oUsuarioData['usuario_data_nascimento']?>">
                        <div class="invalid-feedback">
                            Data de Nascimento
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" value="<?=$oUsuarioData['usuario_endereco']?>">
                        <div class="invalid-feedback">
                            Endereço
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="preco" class="form-label">Preço</label>
                        <input type="text" class="form-control" id="preco" name="preco" value="<?=$oUsuarioData['usuario_preco']?>">
                        <div class="invalid-feedback">
                            Preço
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <label for="trabalho" class="form-label">Trabalho</label>
                        <select class="form-control" multiple size="4" name="trabalho[]" id="trabalho">
                            <?=$sOption?>
                        </select>
                        <div class="invalid-feedback">
                            Trabalho
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="outro" class="form-label">Outro</label>
                        <input type="text" class="form-control" id="outro" name="outro">
                        <div class="invalid-feedback">
                            outro
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit" name="atualizar" value="Atualizar">Atualizar</button>
                </form>
            </div>

            <!-- ---------------------- Agende de Servicos ---------------------- -->
            <div id="fragment-2">
                <div class="aba">
                    <h2>Atuais</h2>

                    <div class="row">
                        <div class="col">
                            <div class="col-sm">
                                <?=$sDivAprovado?>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    
                    <h2>Solicitações</h2>
                    <?=$sDivPend?>
                </div>
            </div>

            <!-- ---------------------- Servicos Solicitados ---------------------- -->
            <div id="fragment-3">
                <div class="aba">
                    <h2>Atuais Aprovados</h2>

                    <div class="row">
                        <div class="col">
                            <div class="col-sm">
                                <?=$sDivMeuAprovado?>
                            </div>
                        </div>
                    </div>

                    <h2>Solicitados</h2>
                    <?=$sDivMeuSol?>
                </div>
            </div>

            <!-- ---------------------- Admin ---------------------- -->
            <?php 
                if ($oUsuarioData['usuario_tipo'])
                {
                    include('AdministradorView.php');
                }
            ?>
        </main>
    </div>
</div>