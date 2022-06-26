<?php
    $oServicos = new Servicos();
    $aServicos = $oServicos->servicosAprovados();
    
    $sOption = '';
    foreach ($aServicos as $oServicos)
    {
        $sOption .= '<option value="' . $oServicos['servico_id'] . '">' . $oServicos['servico_nome'] . '</option>';
    }
?>
<div class="container">
    <div id="tabs">
        <main>
            <ul>
                <li><a href="#fragment-1"><span>Cadastro</span></a></li>
            </ul>
            <div>
                <form action="registerProcess.php" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" id="nome">
                        <div class="invalid-feedback">
                            Nome Completo
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email">
                        <div class="invalid-feedback">
                            E-mail
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <div class="invalid-feedback">
                            Senha
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="Telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="telefone">
                        <div class="invalid-feedback">
                            Telefone
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="CPF" class="form-label">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="CPF">
                        <div class="invalid-feedback">
                            CPF
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento">
                        <div class="invalid-feedback">
                            Data de Nascimento
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" name="endereco" id="endereco">
                        <div class="invalid-feedback">
                            Endereço
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <label for="trabalho" class="form-label">Trabalho</label>
                        <select class="form-control" multiple size="4" name="trabalho[]" id="trabalho">
                            <?=$sOption?>
                        </select>
                        <div class="invalid-feedback">
                            trabalho
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="outro" class="form-label">Outro</label>
                        <input type="text" class="form-control" name="outro" id="outro">
                        <div class="invalid-feedback">
                            outro
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    <input class="w-100 btn btn-primary btn-lg" name="cadastro" value="Cadastrar" type="submit">
                </form>
            </div>
        </main>
    </div>
</div>