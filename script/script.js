const leftBar = document.querySelector('.leftBar');
const leftBarBurger = document.querySelector('.leftBarBurger');
const menu_icon = document.querySelector('.menu-icon');
const overlay = document.querySelector('.overlay');

leftBarBurger.innerHTML = leftBar.innerHTML;

menu_icon.addEventListener('click', () => {
    overlay.style.display = 'block';
    leftBarBurger.style.transform = 'translateX(0)';
});

overlay.addEventListener('click', () => {
    overlay.style.display = 'none';
    leftBarBurger.style.transform = 'translateX(-100%)';
});
