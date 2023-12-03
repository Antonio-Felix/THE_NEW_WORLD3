function mostrarSenha(){
    var inputPass = document.getElementById('senha')
    var btnPass = document.getElementById('btnSenha')

    /*se o tipo da variável inputPass for identico a pass word...*/
    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text') /*altera o tipo do input (muda de password para text)*/
        btnPass.classList.replace ('bi-eye', 'bi-eye-slash')/*substituir a classe do botão (nesse caso a classe q já é pré definida pelo icone)/ coloca primeiro a classe q vai ser substituída*/
    }

    else{
        inputPass.setAttribute('type', 'password')
        btnPass.classList.replace ('bi-eye-slash', 'bi-eye')
    }
}