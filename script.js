/* Variaveis */
const inputCheck = document.querySelector('#modo-claro');
const elemento = document.querySelector('body');
/* Variaveis */

/* Metodo - checa o click do botão de alternancia */
inputCheck.addEventListener('click', () => {
  const modo = inputCheck.checked ? 'light' : 'dark'; /* se inputcheck:checado defina dark ou light */
  elemento.setAttribute("data-bs-theme", modo); /* utilizando o atributo a variavel data-bs-theme utilizando a constant modo */

  // Alterar a cor de fundo do input de acordo com o modo selecionado
  const modoSwitch = document.querySelector('.modo-switch');
  if (modo === 'light') {
    // Modo claro
    modoSwitch.parentElement.style.backgroundColor = 'white'; // Define o fundo do input como branco no modo claro
  } else {
    // Modo escuro
    modoSwitch.parentElement.style.backgroundColor = 'black'; // Remove a cor de fundo definida para o input no modo escuro
  }
});


// script.js
function enviarFormulario() {
  fetch('enviar.php', {
      method: 'POST',
      body: new FormData(document.getElementById('formularioContato'))
  })
  .then(response => {
      if (response.ok) {
          document.getElementById('formularioContato').reset();
          alert('E-mail enviado com sucesso!');
      } else {
          alert('Erro ao enviar e-mail. Por favor, tente novamente.');
      }
  })
  .catch(error => {
      console.error('Ocorreu um erro:', error);
      alert('Erro ao enviar e-mail. Por favor, tente novamente.');
  });
}

 // Função para exibir o popup com a mensagem
 function exibirPopup(mensagem) {
  // Define o texto da mensagem no elemento HTML
  document.getElementById("mensagemPopup").innerText = mensagem;
  
  // Exibe o popup
  document.getElementById("popup").style.display = "block";
  
  // Define um tempo para ocultar o popup após alguns segundos (opcional)
  setTimeout(function() {
      document.getElementById("popup").style.display = "none";
  }, 5000); // O popup será ocultado após 5 segundos (5000 milissegundos)
}

// Função para enviar o formulário via fetch e exibir o popup
function enviarFormulario() {
  fetch('enviar.php', {
      method: 'POST',
      body: new FormData(document.getElementById('formularioContato'))
  })
  .then(response => {
      if (response.ok) {
          // Limpa o formulário após o envio bem-sucedido
          document.getElementById('formularioContato').reset();
          // Exibe o popup com a mensagem
          exibirPopup('E-mail enviado com sucesso!');
      } else {
          // Exibe uma mensagem de erro em caso de falha no envio
          alert('Erro ao enviar e-mail. Por favor, tente novamente.');
      }
  })
  .catch(error => {
      // Exibe uma mensagem de erro em caso de erro de conexão
      console.error('Ocorreu um erro:', error);
      alert('Erro ao enviar e-mail. Por favor, tente novamente.');
  });
}
