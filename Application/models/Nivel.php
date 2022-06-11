<?php
    class Nivel
    {
        public static function pontosPar($iNivel)
        {
            if ($iNivel == 1) {
                return NIVEL_FACIL_PONTOS_PAR;
            } else if ($iNivel == 2) {
                return NIVEL_MEDIO_PONTOS_PAR;
            } else if ($iNivel == 3) {
                return NIVEL_DIFICIL_PONTOS_PAR;
            }
        }
    }
?>