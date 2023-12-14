//Navbar animation
const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    //Toggle Nav
    burger.addEventListener('click', () => {
        nav.classList.toggle('nav-active');

        //Link Animation
        navLinks.forEach((linkk, index) => {
            if (linkk.style.animation) {
                linkk.style.animation = '';
            }
            else {
                linkk.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
            }
        });

        //Burger Animation
        burger.classList.toggle('toggle');

        //Block scrolling
        if (document.body.style.overflowY != 'hidden') {
            document.body.style.overflowY = 'hidden';
        }
        else {
            document.body.style.overflowY = 'initial';
        }
    });
}

//Set sizebutton to checked - Item Page
const sizeCheck = () => {
    var sizeBtn = document.getElementsByClassName("sizebtns");

    var addCheckedClass = function(){
        removeCheckedClass();
        this.classList.toggle('btn-checked');
    }
    
    var removeCheckedClass = function(){
        for (let i = 0; i < sizeBtn.length; i++) {
            sizeBtn[i].classList.remove('btn-checked');
        }
    }

    for (let i = 0; i < sizeBtn.length; i++) {
        sizeBtn[i].addEventListener("click", addCheckedClass);
    }
}

//Open filter - Store Page
const filterOpen = () => {
    const filterIcon = document.querySelector('#filter-icon');
    const filter = document.querySelector('#filter-options');
    filterIcon.addEventListener('click', () => {
    filter.classList.toggle("filter-opened");
    filterIcon.classList.toggle("icon-opened");
    });
}