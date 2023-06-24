new Carousel

const panneau = document.getElementById('panneau');
let poney = document.querySelectorAll('.poney');

for (let i = 0; i < poneys.length; i++) {
    let div = document.createElement('div');
    div.classList.add('poney');
    let img = document.createElement('img');
    div.append(img);
    img.src = './img/pony' + (i+1) + '.jpg';
    panneau.append(div); 
};