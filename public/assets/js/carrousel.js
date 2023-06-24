// console.log('ok')


// idée, mettre les images dans un tableau

// const img_astro = [{ name: 'Pinky Pie', strength: '50', speed: '65', charisma: '80' }, 
// { name: 'Rainbow Dash', strength: '80', speed: '75', charisma: '90' }, 
// { name: 'Twilight Sparkle', strength: '90', speed: '45', charisma: '70'}, 
// { name: 'Rarity', strength: '30', speed: '50', charisma: '85' }, 
// { name: 'Fluttershy', strength: '67', speed: '64', charisma: '30' }];

const astro = [1, 2, 3, 4, 5];
const containerCarrousel = document.getElementById('container-carrousel');

for (let i = 0; i < astro.length; i++) {
    //console.log(astro);
    let div = document.createElement('div');
    div.classList.add('astro-img');
    let img = document.createElement('img');
    div.append(img);
    img.src = 'assets/img/home' + (i+1) + '.jpg'
    containerCarrousel.append(div);
}





























// class Carrousel {


//     /**
//      * @param {HTMLElement} element
//      * @param {Object} options
//      * @param {Object} options.slidesToScroll Nombre d'élément à faire défiler
//      * @param {Object} options.slidesVisible Nombre d'élément visible sur un slide
//      */

//     constructor(element, options = {}) {
//         this.element = element,
//         this.options = Object.assign({}, {
//             slidesToScroll: 5,
//             slidesVisible: 1
//         }),

//     }
// }

// //ne pas attendre le chargement de la page complète, mais juste du DOM
// document.addEventListener('DOMContentLoaded', function() {
//     new Carrousel(document.querySelector('#carrousel1'), {
//         slidesToScroll: 5,
//         slidesVisible: 1
//     })
// })


// const panneau = document.getElementById('panneau');
// let poney = document.querySelectorAll('.poney');

// for (let i = 0; i < poneys.length; i++) {
//     let div = document.createElement('div');
//     div.classList.add('poney');
//     let img = document.createElement('img');
//     div.append(img);
//     img.src = './img/pony' + (i+1) + '.jpg';
//     panneau.append(div); 
// };