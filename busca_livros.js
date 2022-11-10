const usuarios = [...document.querySelectorAll('.div_livro')].map(e=>e.getAttribute('nome_titulo').normalize("NFD").replace(/[\u0300-\u036f]/g, ""))
document.querySelector('#pesquisa').addEventListener('change', (e)=>{
    const escrita = document.querySelector('#pesquisa').value
    const newusers = usuarios.filter((titulo)=>titulo.toLowerCase().includes(escrita.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "")));
    [...document.querySelectorAll('.div_livro')].forEach(e=>{
        e.classList.add('hidden')
        if(newusers.includes(e.getAttribute('nome_titulo').normalize("NFD").replace(/[\u0300-\u036f]/g, ""))){
            e.classList.remove('hidden')
        }
    })
})