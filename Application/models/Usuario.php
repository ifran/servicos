<?php
    class Usuario extends Database 
    {
        public function registrarUsuario($aUsuario)
        {
            $sSql = 'INSERT INTO usuario 
                    (usuario_tipo, usuario_nome, usuario_email, usuario_senha,
                    usuario_telefone, usuario_cpf, usuario_data_nascimento, usuario_endereco)
                    VALUES 
                    ( 0, "' . $aUsuario['nome'] . '", "' . $aUsuario['email'] . '",
                    "' . md5($aUsuario['password']) . '", "' . $aUsuario['telefone'] . '",
                    "' . $aUsuario['cpf'] . '", "' . $aUsuario['data_nascimento'] . '", 
                    "' . $aUsuario['endereco'] . '"
                    );
                ';
            $iId = $this->insert($sSql);

            return $iId;
        }

        public function registrarServicosUsuario($aTrabalho, $iUsuarioId)
        {
            $sSql = 'DELETE FROM usuario_servico WHERE usuario_id = ' . $iUsuarioId . ';';
            
            foreach ($aTrabalho as $iTrabalhoId)
            {
                $sSql .= 'INSERT INTO usuario_servico (usuario_id, servico_id) VALUES (' . $iUsuarioId . ',' . $iTrabalhoId . ');';
            }
            
            $this->executeQuery($sSql);
        }

        public function buscarServicosUsuario($iTrabalhoId = null, $iAvaliacao = null)
        {
            $sSql = 'SELECT us.*, s.*, u.*
                        , IFNULL((SELECT ROUND(AVG(avaliacao_nota), 2) FROM avaliacao WHERE usuario_contratado_id = u.usuario_id), "Sem Avaliação") AS avaliacao_nota
                        , (SELECT count(avaliacao_nota) FROM avaliacao WHERE usuario_contratado_id = u.usuario_id) AS avaliacao_pessoas
                        , GROUP_CONCAT(s.servico_nome) AS servico_nome
                    FROM usuario u
                    LEFT JOIN usuario_servico us ON (us.usuario_id = u.usuario_id)
                    LEFT JOIN servicos s ON (s.servico_id = us.servico_id)
                    WHERE 1=1';
            
            if ($iAvaliacao != null)
            {
                $sSql .= ' AND (SELECT AVG(avaliacao_nota) FROM avaliacao WHERE usuario_contratado_id = u.usuario_id) = ' . $iAvaliacao;
            }
            if ($iTrabalhoId != null) 
            {
                $sSql .= ' AND us.servico_id = ' . $iTrabalhoId;
            }
            
            $sSql .= ' GROUP BY u.usuario_id';

            $oReturn = $this->select($sSql);
            return $oReturn;
        }

        public function buscarUsuario($iUsuarioId)
        {
            $sSql = 'SELECT u.*, us.*, s.*
                        , IFNULL((SELECT ROUND(AVG(avaliacao_nota), 2) FROM avaliacao WHERE usuario_contratado_id = u.usuario_id), "Sem Avaliação") AS avaliacao_nota
                        , (SELECT count(avaliacao_nota) FROM avaliacao WHERE usuario_contratado_id = u.usuario_id) AS avaliacao_pessoas
                    FROM usuario u
                    LEFT JOIN usuario_servico us ON (us.usuario_id = u.usuario_id)
                    LEFT JOIN servicos s ON (s.servico_id = us.servico_id)
                    WHERE 1=1
                    AND u.usuario_id = ' . $iUsuarioId;

            $oReturn = $this->select($sSql);
            return $oReturn;
        }
    }
?>