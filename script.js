/* Variaveis */
const inputCheck = document.querySelector('#modo-noturno')
const elemento = document.querySelector('body')
/* Variaveis */

/* Metodo - checa o click do botão de alternancia */
inputCheck.addEventListener('click', () => {
  const modo = inputCheck.checked ? 'dark' : 'light'; /* se inputcheck:checado defina dark ou light */
  elemento.setAttribute("data-bs-theme", modo) /* utilizando o atributo a variavel data-bs-theme utilizando a constant modo */
})