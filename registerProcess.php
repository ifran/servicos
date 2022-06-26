<?php
    include('Application/core/Inc.php');

    if ($_POST['cadastro'])
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
?>