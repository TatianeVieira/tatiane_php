<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro de Fornecedor</title>
</head>
<link rel="stylesheet" href="ativ_form_tab/css/style.css">
<script src="validacao.js"></script>

<body>

  <form action="form3_completo.php" method="POSget">
    <fieldset>
      <legend>INFORMAÇÕES DO FORNECEDOR</legend>

      <!-- Logo e título alinhados dentro do formulário -->
      <table border="0" cellpadding="10" cellspacing="0" width="100%" style="margin-bottom: 15px;">
        <tr>
          <td width="150" valign="middle">
            <img src="18123250.png" alt="Logo da Empresa" width="120" />
          </td>
          <td valign="middle">
            <h1>Cadastro de Fornecedor</h1>
          </td>
        </tr>
      </table>

      <p>
        Este formulário coleta as principais informações sobre o fornecedor, incluindo dados de contato, endereço e tipo de pessoa. Preencha todos os campos corretamente para garantir o registro completo no sistema.
      </p>

      <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <tr>
          <th colspan="2">Identificação</th>
          <th colspan="2">Contato</th>
          <th colspan="2">Endereço</th>
          <th rowspan="2">Tipo</th>
        </tr>
        <tr>
          <td>CNPJ</td>
          <td>Nome</td>
          <td>Telefone</td>
          <td>E-mail</td>
          <td>Endereço</td>
          <td>Data do Cadastro</td>
        </tr>
        <tr>
          <td><input type="text" name="cnpj" placeholder="00.000.000/0000-00" maxlength="18" required></td>
          <td><input type="text" name="nome"></td>
          <td><input type="tel" name="telefone" placeholder="(00) 00000-0000"></td>
          <td><input type="email" name="email"></td>
          <td><input type="text" name="endereco"></td>
          <td><input type="date" name="data_cadastro" required></td>
          <td rowspan="2" valign="top">
            <input type="radio" name="tipo" id="pj" value="Pessoa Jurídica" checked>
            <label for="pj">PJ</label>
            <input type="radio" name="tipo" id="pf" value="Pessoa Física">
            <label for="pf">PF</label>
          </td>
        </tr>
        <tr>
          <td colspan="7" align="center">
            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar">
          </td>
        </tr>
      </table>

    </fieldset>
  </form>

<center>
    <address>
        Tatiane Vieira / Estudante / Tecnico em Deenvolvimento de Sistemas
    </address>
</center>


</body>
</html>
