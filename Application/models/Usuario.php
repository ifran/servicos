<?php
    class Usuario extends Database 
    {
        public function registrarUsuario($aUsuario)
        {
            $sSql = 'INSERT INTO usuario 
                    (usuario_tipo, usuario_nome, usuario_email, usuario_senha,
                    usuario_telefone, usuario_cpf, usuario_data_nascimento, usuario_endereco)
                    VALUES 
                    ( 0, "' . $aUsuario['nome'] . '", "' . $aUsuario['email']. '",
                    "' . $aUsuario['password']. '", "' . $aUsuario['telefone']. '",
                    "' . $aUsuario['cpf']. '", "' . $aUsuario['data_nascimento']. '", 
                    "' . $aUsuario['endereco']. '"
                    );
                ';
            $iId = $this->insert($sSql);

            return $iId;
        }

        public function servicosUsuario($aTrabalho, $iUsuarioId)
        {
            $sSql = 'DELETE FROM usuario_servico WHERE usuario_id = ' . $iUsuarioId . ';';
            
            foreach ($aTrabalho as $iTrabalhoId)
            {
                $sSql .= 'INSERT INTO usuario_servico (usuario_id, servico_id) VALUES (' . $iUsuarioId . ',' . $iTrabalhoId . ');';
            }
            
            $this->executeQuery($sSql);
        }
    }
?>