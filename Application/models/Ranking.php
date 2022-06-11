<?php 
    class Ranking extends Database
    {
        function listarRankingNivel($iNivel)
        {
            $sSql = 'SELECT * FROM ranking 
                    WHERE ranking_nivel = ' . $iNivel . ' 
                    ORDER BY ranking_pontos DESC LIMIT 0,10';
            
            $oReturn = parent::select($sSql);

            return $oReturn;
        }

        function listarRanking()
        {
            $aNivelRanking = array();
            $aNivelRanking[NIVEL_FACIL] = $this->listarRankingNivel(NIVEL_FACIL);
            $aNivelRanking[NIVEL_MEDIO] = $this->listarRankingNivel(NIVEL_MEDIO);
            $aNivelRanking[NIVEL_DIFICIL] = $this->listarRankingNivel(NIVEL_DIFICIL);

            return $aNivelRanking;
        }
    }
?>