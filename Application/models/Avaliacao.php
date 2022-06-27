<?php
    class Avaliacao extends Database 
    {
        public function buscarAvaliacoes($iUsuarioId)
        {
            $sSql = 'SELECT * 
                    FROM avaliacao a
                    LEFT JOIN usuario u ON (u.usuario_id = a.usuario_solicitante_id)
                    WHERE 1=1
                    AND a.usuario_contratado_id = ' . $iUsuarioId;
            
            $oReturn = $this->select($sSql);
            
           return $oReturn;
        }
    }
?>