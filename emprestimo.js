const livros = [...document.querySelectorAll('.div_user')].map(e=>e.getAttribute('nome_user').normalize("NFD").replace(/[\u0300-\u036f]/g, ""))
document.querySelector('#pesquisa').addEventListener('change', (e)=>{
    const escrita = document.querySelector('#pesquisa').value
    const newusers = livros.filter((nome)=>nome.toLowerCase().includes(escrita.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "")));
    [...document.querySelectorAll('.div_user')].forEach(e=>{
        e.classList.add('hidden')
        if(newusers.includes(e.getAttribute('nome_user').normalize("NFD").replace(/[\u0300-\u036f]/g, ""))){
            e.classList.remove('hidden')
        }
    })
})