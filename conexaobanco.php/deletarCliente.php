<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
    
    <style>
    /* Centralizar o conteúdo da página */
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background:rgba(248, 249, 250, 0.38);
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
      min-width: 280px;
    }

    label {
      font-weight: 600;
      color: #555;
    }

    input[type="number"] {
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
      background-color:rgba(30, 76, 184, 0.56);
    }
  </style>
</head>
<body>
<?php
$urlAnterior = $_SERVER['HTTP_REFERER'] ?? 'navegar.php';
?>

<button onclick="window.location.href='<?php echo $urlAnterior; ?>'"> Voltar</button>

    <h2>Excluir Cliente</h2>
    <form action="processarDelecao.php" method="POST">
        <label for="id">ID do Cliente:</label>
        <input type="number" id="id" name="id" required>

        <button type="submit">Excluir Cliente</button>
    </form>
</body>
</html>