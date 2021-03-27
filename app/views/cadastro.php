<div class="row container">
    <div class= "col s12">
        <h3 class="light">Página Cadastro
        </h3>
    </div>

    <div class="col s12">
        <form action="?router=Site/cadastro/" method="post">
            <div class="col s12 m6 input-field">
                <input type="text" name="nome" id="nome" required>
                <label for="nome">Digite seu nome</label>
            </div>
            <div class="col s12 m6 input-field">
                <input type="email" name="email" id="email" required>
                <label for="email">Digite seu e-mail</label>
            </div>
            <div class="col s12 input-field">
                <input type="tel" name="telefone" id="telefone" required>
                <label for="telefone">Digite seu telefone</label>
            </div>
            <div class="col s12 m6 input-field">
                <input type="submit" value="Enviar" class="btn-small">
                <input type="reset" value="Limpar" class="btn-small red">
            </div>
       
        </form>
    </div>
</div>
