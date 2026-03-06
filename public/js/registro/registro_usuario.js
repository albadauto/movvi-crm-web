document.getElementById("repita_senha").addEventListener("blur", function () {

    let senhaOriginal = document.getElementById("senha_original").value;
    let repitaSenha = document.getElementById("repita_senha").value;

    if (senhaOriginal !== repitaSenha) {
        document.getElementById("btnPlanos").disabled = true;
        alert("As senhas não coincidem");
    }else{
        document.getElementById("btnPlanos").disabled = false;
    }
});
