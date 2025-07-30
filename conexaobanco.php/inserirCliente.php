<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: #f8f9fa;
      font-family: Arial, sans-serif;
    }

    h2 {
      margin-bottom: 20px;
      color: #333;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      background: white;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      min-width: 320px;
    }

    label {
      font-weight: 600;
      color: #555;
    }

    input[type="text"],
    input[type="email"] {
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    button {
      padding: 10px;
      background-color: #2563eb;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #1e4bb8;
    }
  </style>
</head>
<body>
    <h2>Cadastro de Cliente</h2>
    <form action="processarInsercao.php" method="POST">
        <label for="nome">Nome: </label>
        <input type="text" id="nome" name="nome" required>

        <label for="endereco">Endereço: </label>
        <input type="text" id="endereco" name="endereco" required>

        <label for="telefone">Telefone: </label>
        <input type="text" id="telefone" name="telefone" required>

        <label for="email">E-mail: </label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Cadastrar Cliente</button>
    </form>
</body>
</html>