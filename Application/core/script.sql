--
-- Banco de dados: memory
--

--
-- Estrutura da tabela carta
--

CREATE TABLE carta (
  carta_id int(11) NOT NULL,
  carta_img varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela ranking
--

CREATE TABLE ranking (
  ranking_id int(11) NOT NULL,
  ranking_pontos int(11) DEFAULT NULL,
  ranking_nivel int(11) DEFAULT NULL,
  ranking_name varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela usuario
--

CREATE TABLE usuario (
  usuario_id int(11) NOT NULL,
  usuario_email varchar(255) DEFAULT NULL,
  usuario_senha varchar(35) DEFAULT NULL,
  usuario_admin tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela carta
--
ALTER TABLE carta
  ADD PRIMARY KEY (carta_id);

--
-- Índices para tabela ranking
--
ALTER TABLE ranking
  ADD PRIMARY KEY (ranking_id);

--
-- Índices para tabela usuario
--
ALTER TABLE usuario
  ADD PRIMARY KEY (usuario_id);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela carta
--
ALTER TABLE carta
  MODIFY carta_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela ranking
--
ALTER TABLE ranking
  MODIFY ranking_id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela usuario
--
ALTER TABLE usuario
  MODIFY usuario_id int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
