<?php
    class Servicos extends Database
    {
        public function servicosAprovados()
        {
            $sSql = 'SELECT * FROM servicos 
                    WHERE servico_aprovacao = 1
                    ORDER BY servico_nome';
            
            $oReturn = parent::select($sSql);

            return $oReturn;
        }
    }
?>