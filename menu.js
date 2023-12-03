/*pegar evento de rolagem, capturar momento em q o usuário está rolando a tela 
e aplicar um efeito em um determinado elemento*/

/*escutador de eventos avisa quando um evento acontecer*/
/*o function vai dizer oq acontece quando o evento ocorrer*/
/*se cria uma varável para capturar o elemento header do css */ 
window.addEventListener ('scroll', function(){
    var header = document.querySelector('#header') /*necessário capturar o id */
    header.classList.toggle('rolagem', window.scrollY > 0) /*adicionar uma classe dinamicamente ao header */
})

/*togle = se a classe(classe criada com javascript) existir, remova ela, se não existir, adicione ela*/
/*parêntese da linha 8 faz:  classe rolagem seja adidicionada sempre que a janela(window) 
tiver uma rolagem no eixo Y(vertical) e que a posição da rolagem seja maior que zero*/