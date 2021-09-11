const commentButtons = Array.from(document.getElementsByClassName('comment'));
const modalElement = document.querySelector('.modal');
const modalImg = modalElement.querySelector('.title-image');
const modalForm = modalElement.querySelector('form');
const btnSubmit = modalElement.querySelector('.btn');
console.log(window.location.href);


commentButtons.forEach(element => element.addEventListener('click', ()=>{
    console.log(element.closest('.card'));
    const card = element.closest('.card');
    const img = card.querySelector('img');
    modalImg.src = img.src;
    modalForm.action = element.href;
}));