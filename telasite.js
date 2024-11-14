function buscaCEP(cep) {
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
      .then(response => response.json())
      .then(data => {
        if (!("erro" in data)) {
          document.getElementById('rua').value = data.logradouro;
          document.getElementById('bairro').value = data.bairro;
          document.getElementById('cidade').value = data.localidade;
        } else {
          alert("CEP não encontrado.");
        }
      })
      .catch(error => console.error('Erro ao buscar o CEP:', error));
  }
  