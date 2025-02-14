let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");
    
btn.onclick = function(){
    sidebar.classList.toggle("active");
}

const cards = document.querySelectorAll('.card');
const contentItems = document.querySelectorAll('.content-item');

// Adicionando evento de clique
document.querySelector('.cards').onclick = function(event) {
    // Verifica se o clique foi em um elemento com a classe 'card'
    const clickedCard = event.target.closest('.card');
    if (!clickedCard) return; // Se não foi em um card, sai da função

    // Removendo a classe "active" de todos os cards e conteúdos
    cards.forEach(card => card.classList.remove('active'));
    contentItems.forEach(item => item.classList.remove('active'));

    // Adicionando a classe "active" ao card clicado
    clickedCard.classList.add('active');

    // Identificando o conteúdo relacionado
    const contentId = clickedCard.dataset.content; // Pega o data-content
    const relatedContent = document.querySelector(`#content-${contentId}`);
    if (relatedContent) {
        relatedContent.classList.add('active'); // Ativa o conteúdo correspondente
    }
};
