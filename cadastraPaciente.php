<?php 

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include('head.html'); ?>
<body>
<?php include('header.html'); ?>
    <form action="cadastroPaciente.php" class="prof" method="POST">
        <hr />
        <h2>Novo paciente</h2>
        <hr />
        <div class="row">
            <div class="form-group col-md-6 name="nome_paciente">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="nome_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3" name="cpf_paciente">
                <label for="name">CPF:</label>
                <input type="text" class="form-control" name="cpf_paciente">
            </div>
            <div class="form-group col-md-3" name="rg_paciente">
                <label for="name">RG:</label>
                <input type="text" class="form-control" name="rg_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-2" name="dt_nasc_paciente">
                <label for="name">Data de nascimento:</label>
                <input type="date" class="form-control" name="dt_nasc_paciente">
            </div>
            <div class="form-group col-md-4" name="profissao_paciente">
                <label for="name">Profissão:</label>
                <input type="text" class="form-control" name="profissao_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 name="logadouro_paciente">
                <label for="name">Logadouro(Ex: Rua, Avenida):</label>
                <input type="text" class="form-control" name="logadouro_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-1" name="numero_paciente">
                <label for="name">Nº:</label>
                <input type="text" class="form-control" name="numero_paciente">
            </div>
            <div class="form-group col-md-5" name="bairro_paciente">
                <label for="name">Bairro:</label>
                <input type="text" class="form-control" name="bairro_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="cidade_paciente">
                <label for="name">Cidade:</label>
                <input type="text" class="form-control" name="cidade_paciente">
            </div>
            <div class="form-group col-md-2" name="cep_paciente">
                <label for="name">CEP:</label>
                <input type="text" class="form-control" name="cep_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-1" name="uf_paciente">
                <label for="name">UF:</label>
                <input type="text" class="form-control" name="uf_paciente">
            </div>
            <div class="form-group col-md-2" name="telefone_paciente">
                <label for="name">Telefore:</label>
                <input type="text" class="form-control" name="telefone_paciente">
            </div>
            <div class="form-group col-md-3" name="celular_paciente">
                <label for="name">Celular:</label>
                <input type="text" class="form-control" name="celular_paciente">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4" name="email_paciente">
                <label for="name">E-mail:</label>
                <input type="text" class="form-control" name="email_paciente">
            </div>
            <div class="form-group col-md-2" name="dt_cad_paciente">
                <label for="name">Data do cadastro:</label>
                <input type="date" class="form-control" name="dt_cad_paciente">
            </div>
        </div>
        <hr />
        <div class="row btn-toolbar" role="toolbar" style="padding-left: 30%;">
            <div class="btn-group mr-2" role="group">
              <input type="button" class="btn btn-danger" value="Cancelar">
            </div>
            <div class="btn-group mr-2" role="group">
              <input type="submit" class="btn btn-success" value="Salvar">
            </div>    
        </div>
        <hr />
    </form>
</body>
</html>