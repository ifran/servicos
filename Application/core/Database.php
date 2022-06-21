<?php
    class Database extends PDO
    {
        private function __construct() 
        {
            parent::__construct(DB_SGBD . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        }

        private function executeQuery($sSql)
        {
            $this->exec($sSql);
        }

        private function select($sSql)
        {
            $oReturn = $this->query($sSql);
            
            $aRetorno = array();
            while ($linha = $oReturn->fetch(PDO::FETCH_ASSOC)) {
                $aRetorno[] = $linha;
            }

            return $aRetorno;
        }
    }
?>