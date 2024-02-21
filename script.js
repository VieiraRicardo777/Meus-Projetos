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
