<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Sistema de Denúncias</title>
  <style>
    body {
      font-family: Arial, sans-serif;
  background: url('https://www.seuamigoguru.com/content/uploads/2020/11/morar-em-um-bairro-barulhento-aumenta-o-risco-de-desenvolver-demencia.jpg') no-repeat center center fixed;
  background-size: cover;
  margin: 0; /* remove margin */
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  min-height: 100vh; /* set minimum height for viewport */
    }
    .container {
  background-color: rgba(300, 255, 300, 0.85);
  padding: 10px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
  text-align: center;
  width: 37%; /* set width as percentage */
    }
    button {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #218838;
    }
    form {
      display: none;
      flex-direction: column
    }
    h1 {
      text-align: center;
      color: #333;
    }
    label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }
    input[type="text"], input[type="email"], textarea, select {
      width: calc(100% - 20px);
      padding: 8px;
      margin-bottom: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .form-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }
    .form-row select, .form-row input {
      width: calc(48% - 5px);
    }
    input[type="submit"] {
      width: calc(100% - 20px);
      padding: 10px;
      background-color: #28a745;
      border: none;
      border-radius: 5px;
      color: #fff;
      font-size: 14px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #218838;
    }
  </style>
  <script>
    function showForm() {
      document.getElementById('initial-screen').style.display = 'none';
      document.getElementById('cadastro').style.display = 'flex';
    }

    function hideForm() {
      document.getElementById('cadastro').style.display = 'none';
      document.getElementById('initial-screen').style.display = 'flex';
    }

    function buscaCEP(cep) {
      fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(data => {
          if (!("erro" in data)) {
            document.getElementById('rua').value = data.logradouro;
            document.getElementById('bairro').value = data.bairro;
            document.getElementById('cidade').value = data.localidade;
            document.getElementById('uf').value = data.uf;
            document.getElementById('municipio').value = data.localidade;
          } else {
            alert("CEP não encontrado.");
          }
        })
        .catch(error => console.error('Erro ao buscar o CEP:', error));
    }
  </script>
</head>
<body>
  <div id="initial-screen" class="container">
    <h1>Bem-vindo ao Sistema de Denúncias</h1>
    <button onclick="showForm()">Registrar Denúncia</button>
  </div>

  <form id="cadastro" class="container" method="POST" action="" onsubmit="hideForm()">
    <h1>Formulário de Denúncia</h1>
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome"><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br>
    <label for="cep">CEP:</label>
    <input type="text" id="cep" name="cep" onblur="buscaCEP(this.value)"><br>
    <label for="rua">Rua:</label>
    <input type="text" id="rua" name="rua"><br>
    <label for="bairro">Bairro:</label>
    <input type="text" id="bairro" name="bairro"><br>
    <label for="cidade">Cidade:</label>
    <input type="text" id="cidade" name="cidade"><br>
    <div class="form-row">
      <select id="uf" name="uf">
        <option value="" disabled selected>Selecionar UF</option>
        <option value="AC">AC</option>
        <option value="AL">AL</option>
        <option value="AP">AP</option>
        <option value="AM">AM</option>
        <option value="BA">BA</option>
        <option value="CE">CE</option>
        <option value="DF">DF</option>
        <option value="ES">ES</option>
        <option value="GO">GO</option>
        <option value="MA">MA</option>
        <option value="MT">MT</option>
        <option value="MS">MS</option>
        <option value="MG">MG</option>
        <option value="PA">PA</option>
        <option value="PB">PB</option>
        <option value="PR">PR</option>
        <option value="PE">PE</option>
        <option value="PI">PI</option>
        <option value="RJ">RJ</option>
        <option value="RN">RN</option>
        <option value="RS">RS</option>
        <option value="RO">RO</option>
        <option value="RR">RR</option>
        <option value="SC">SC</option>
        <option value="SP">SP</option>
        <option value="SE">SE</option>
        <option value="TO">TO</option>
      </select>
      <input type="text" id="municipio" name="municipio" placeholder="Município">
    </div>
    <label for="descricao">Descrição da Denúncia:</label>
    <textarea id="descricao" name="descricao" rows="4"></textarea><br>
    <input type="submit" name="submit" id="submit" value="Enviar">
  </form>

  <?php
  if (isset($_POST['submit'])) {
    include_once('conexao.php');
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $municipio = $_POST['municipio'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO mrrrh8fsanxe85db (nome, email, cep, rua, bairro, cidade, uf, municipio, descricao)
            VALUES ('$nome', '$email', '$cep', '$rua', '$bairro', '$cidade', '$uf', '$municipio', '$descricao')";

    if (mysqli_query($conexao, $sql)) {
      echo "<script>alert('Denúncia cadastrada com sucesso');</script>";
    } else {
      echo "<script>alert('Erro: " . mysqli_error($conexao) . "');</script>";
    }

    mysqli_close($conexao);
  }
  ?>
</body>
</html>
