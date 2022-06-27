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

        $oUsuario->registrarServicosUsuario($_POST['trabalho'], $iUsuarioId);

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
?>