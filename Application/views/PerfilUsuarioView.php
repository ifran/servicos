<div class="container">
    <div id="tabs">
        <main>
            <ul>
                <li><a href="#fragment-1"><span>Perfil</span></a></li>
                <li><a href="#fragment-2"><span>Agenda de Serviços</span></a></li>
                <li><a href="#fragment-3"><span>Serviços Solicitados</span></a></li>
            </ul>
            
            <!-- ---------------------- Perfil ---------------------- -->
            <div class="register" id="fragment-1">
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="col-sm">
                                <div>Nome</div>
                                <div>Avaliação</div>
                                <div>Trabalhos</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="nome" class="form-control" id="nome">
                        <div class="invalid-feedback">
                            Nome Completo
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email">
                        <div class="invalid-feedback">
                            E-mail
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="passowrd" class="form-label">Senha</label>
                        <input type="passowrd" class="form-control" id="passowrd">
                        <div class="invalid-feedback">
                            Senha
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="Telefone" class="form-label">Telefone</label>
                        <input type="Telefone" class="form-control" id="Telefone">
                        <div class="invalid-feedback">
                            Telefone
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="CPF" class="form-label">CPF</label>
                        <input type="CPF" class="form-control" id="CPF">
                        <div class="invalid-feedback">
                            CPF
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="data_nascimento" class="form-control" id="data_nascimento">
                        <div class="invalid-feedback">
                            Data de Nascimento
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco">
                        <div class="invalid-feedback">
                            Endereço
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <label for="trabalho" class="form-label">Trabalho</label>
                        <input type="text" class="form-control" id="trabalho">
                        <div class="invalid-feedback">
                            trabalho
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="outro" class="form-label">Outro</label>
                        <input type="text" class="form-control" id="outro">
                        <div class="invalid-feedback">
                            outro
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Cadastrar</button>
                </form>
            </div>

            <!-- ---------------------- Agende de Servicos ---------------------- -->
            <div class="" id="fragment-2">

                <h2>Atuais</h2>

                <div class="row">
                    <div class="col">
                        <div class="col-sm">
                            <div>Nome - Data - Horário - Preço Final </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">
                
                <h2>Solicitações</h2>
                <div>Texto</div>
                <button class="btn btn-primary btn-lg" type="submit">Aceitar</button>
                <button class="btn btn-primary btn-lg" type="submit">Negar</button>
            </div>

            <!-- ---------------------- Servicos Solicitados ---------------------- -->
            <div class="" id="fragment-3">
                <h2>Atuais</h2>

                <div class="row">
                    <div class="col">
                        <div class="col-sm">
                            <div>Nome - Data - Horário - Preço Final </div>
                        </div>
                    </div>
                </div>

                <h2>Solicitados</h2>
                <div>Texto - STATUS</div>
            </div>
        </main>
    </div>
</div>