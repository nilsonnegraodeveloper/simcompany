<!-- HEADER-->
@include ('app._layouts._includes.header')
<!-- END HEADER-->

<body class="login">
    <div>

        <div class="login_wrapper">
            <div class="animate form login_form">

                <section class="login_content">

                    <!-- MESSAGES-->
                    @include('app._layouts._includes.messages')
                    <!-- END MESSAGES-->

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <h1>Registro</h1>

                        <div>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nome" maxlenght="100" class="form-control" required="" />
                        </div>

                        <div>
                            <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control" maxlenght="200" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="mail@exemplo.com, mail@exemplo.com.br" placeholder="E-mail" required="" />
                        </div>

                        <div>
                            <input type="text" id="cpf" name="cpf" value="{{ old('cpf') }}" placeholder="CPF" maxlenght="11" class="form-control" required="" />
                        </div>

                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Senha" maxlenght="32" required="" />
                        </div>

                        <div>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirmar Senha" maxlenght="32" required="" />
                        </div>

                        <div class="flex-box">
                            <input type="submit" name="validar" id="validar" class="btn btn-success" value="Registrar" onClick="valida()" />
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <a href="{{ route('index') }}" class="to_register"> Voltar para a Home</a>
                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class=""></i> SIMCOMPANY</h1>
                                <p>©<?php echo date('Y') ?></p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <!-- SCRIPTS -->
    @include ('app._layouts._includes.scriptsRodape')
    <!-- END SCRIPTS -->
</body>

</html>