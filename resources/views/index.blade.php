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

                    <form action="{{ route('auth') }}" method="POST">
                        @csrf
                        <h1>Login</h1>
                        <div>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-mail" maxlenght="200" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="mail@exemplo.com, mail@exemplo.com.br" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" maxlengh="32" placeholder="Senha" required="" />
                        </div>
                        <div class="flex-box">
                            <input type="submit" name="login" class="btn btn-success" value="Logar" />                            
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                       
                            <p class="change_link">Novo por aqui?
                                <a href="{{ route('indexRegister') }}" class="to_register"> Registre-se </a>
                            </p>
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