/*javaS para fazer a cor acompanhar a opção no menu */

const list = document.querySelectorAll('.linha-lista'); /* o q ta entre parênteses é a classe das linhas da lista */
function activeLink(){
    list.forEach((item) =>
    item.classList.remove('active')); 
    this.classList.add('active');
}

    list.forEach((item) =>
    item.addEventListener('click', activeLink)); 