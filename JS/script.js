
        const btnUsuarios = document.getElementById("btnUsuarios");
        const btnAnimais = document.getElementById("btnAnimais");
        const tabelaUsuarios = document.getElementById("tabelaUsuarios");
        const tabelaAnimais = document.getElementById("tabelaAnimais");
        const usuariosTxt = document.getElementById("Usuariostxt"); // Obtém o elemento <h4>
        const animaisTxt = document.getElementById("Animaistxt"); // Obtém o elemento <h4>
        const acad = document.getElementById("a-cad"); // Obtém o elemento <h4>
        

        btnUsuarios.addEventListener("click", () => {
            tabelaUsuarios.style.display = "block"; // Mostra a tabela de usuários
            tabelaAnimais.style.display = "none";   // Oculta a tabela de animais
            usuariosTxt.style.display = "block"; 
            animaisTxt.style.display = "none"; 
            acad.style.display = "none"; 
            
        });

        btnAnimais.addEventListener("click", () => {
            tabelaUsuarios.style.display = "none";   // Oculta a tabela de usuários
            tabelaAnimais.style.display = "block";  // Mostra a tabela de animais
            animaisTxt.style.display = "block"; 
            usuariosTxt.style.display = "none"
            acad.style.display = "block"
           
        });
   
