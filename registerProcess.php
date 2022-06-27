<?php
    include('Application/core/Inc.php');

    if (isset($_POST['cadastro']))
    {
        $oUsuario = new Usuario();
        $iUsuarioId = $oUsuario->registrarUsuario($_POST);

        $oServicos = new Servicos();
        if (!empty($_POST['outro'] != ''))
        {
            $sSql = 'INSERT INTO servicos (servico_nome, servico_aprovacao) VALUES ("' . $_POST['outro'] . '", 0);';
            $oServicos->insert($sSql);
        }

        if (isset($_POST['trabalho']) && count($_POST['trabalho']) > 0) 
        {
            $oUsuario->registrarServicosUsuario($_POST['trabalho'], $_SESSION['bLogin']);
        }

        $_SESSION['bLogin'] = $iUsuarioId;
        headerLocation('Home');
    }
    else if (isset($_POST['contatar']))
    {
        $sSql = 'INSERT INTO agenda (usuario_contratado_id, usuario_solicitante_id, agenda_aprovacao, agenda_mensagem, agenda_data)
            VALUES ('. $_POST['usuario_contratado'] .',' . $_SESSION['bLogin'] . ', 0 , "' . $_POST['mensagem'] . '", "' . $_POST['data'] . '");';
        
        $oAgenda = new Agenda();
        $oAgenda->insert($sSql);

        alert('Contato solicitado. Aguardar por resposta');
        headerLocation('PerfilTrabalhador/' . $_POST['usuario_contratado']);
    }
    else if (isset($_POST['avaliar']))
    {
        $sSql = 'INSERT INTO avaliacao (usuario_contratado_id, usuario_solicitante_id, avaliacao_mensagem, avaliacao_nota)
            VALUES ('. $_POST['usuario_contratado'] .',' . $_SESSION['bLogin'] . ', "' . $_POST['mensagem'] . '", "' . $_POST['nota'] . '");';
        
        $oAvaliacao = new Avaliacao();
        $oAvaliacao->insert($sSql);

        alert('Serviço Avaliado!');
        headerLocation('PerfilTrabalhador/' . $_POST['usuario_contratado']);
    }
    else if (isset($_POST['atualizar']))
    {
        $oUsuario = new Usuario();
        $oUsuario->atualizarUsuario($_POST);

        $oServicos = new Servicos();
        if (!empty($_POST['outro'] != ''))
        {
            $sSql = 'INSERT INTO servicos (servico_nome, servico_aprovacao) VALUES ("' . $_POST['outro'] . '", 0);';
            $oServicos->insert($sSql);
        }

        if (isset($_POST['trabalho']) && count($_POST['trabalho']) > 0) 
        {
            $oUsuario->registrarServicosUsuario($_POST['trabalho'], $_SESSION['bLogin']);
        }
        
        if (!empty($_FILES["foto"]['name']))
        {
            $sFoto = rand(10000, 990000). '_'. time().'.png';
            $filePath = 'public/assets/imguser/'. $sFoto;
            
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $filePath)) 
            {
                $sql = "UPDATE usuario SET usuario_foto = '" . $sFoto . "' WHERE usuario_id = " . $_SESSION['bLogin'];
                $oCon = new Database();
                $oCon->executeQuery($sql);
            }
            else 
            {
                $msg = errorMessage( "Problem in uploading file");
            }
        }
        
        headerLocation('PerfilUsuario');
    }
    else if (isset($_POST['aceitar']) OR isset($_POST['negar']))
    {
        $iAprov = (isset($_POST['aceitar']) ? $_POST['aceitar'] : $_POST['negar']);
        $sSql = 'UPDATE agenda SET agenda_aprovacao = ' . $iAprov . ' WHERE agenda_id = ' . $_POST['agenda'];
        $oAgenda = new Agenda();
        $oAgenda->executeQuery($sSql);
        
        headerLocation('PerfilUsuario#fragment-2');
    }
    else if (isset($_POST['aceitarServico']) OR isset($_POST['negarServico']))
    {
        $iAprov = (isset($_POST['aceitarServico']) ? $_POST['aceitarServico'] : $_POST['negarServico']);
        $sSql = 'UPDATE servicos SET servico_aprovacao = ' . $iAprov . ' WHERE servico_id = ' . $_POST['servico'];
        
        $oServicos = new Servicos();
        $oServicos->executeQuery($sSql);
        
        headerLocation('PerfilUsuario#fragment-4');
    }
?>