import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// product detail js
const stars = document.querySelectorAll('.star');
const submitRatingBtn = document.getElementById('submitRating');
const popUpContainer = document.getElementById('popup-container');
const popUpContainerX = document.getElementById('popup-containerX');
const ratingStars = document.querySelectorAll('.give-rating .star');
const closePopupX = document.getElementById('closePopupX');
const rateButton = document.getElementById('rateButton');
const closePopup = document.getElementById('closePopup');


document.addEventListener('DOMContentLoaded', function() {
        ratingStars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                ratingStars.forEach(s => {
                    if (s.getAttribute('data-rating') <= rating) {
                        s.classList.add('rated');
                    } else {
                        s.classList.remove('rated');
                    }
                });
            });
        });
    
    });
   
    document.addEventListener('DOMContentLoaded', function() {
        ratingStars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                ratingStars.forEach(s => {
                    if (s.getAttribute('data-rating') <= rating) {
                        s.classList.add('rated');
                    } else {
                        s.classList.remove('rated');
                    }
                });
            });
        });
    
        rateButton.addEventListener('click', function() {
            popUpContainer.style.display = 'block';
        });
    
        closePopup.addEventListener('click', function() {
            popUpContainer.style.display = 'none';
        });
    
        closePopupX.addEventListener('click', function() {
            popUpContainerX.style.display = 'none';
        });
    });
    
  
// end product detail js

document.addEventListener("DOMContentLoaded", function() {
    const showMoreBtn = document.querySelector('.show-more-btn');
    const moreDesc = document.querySelector('.more-desc');
    const lessDesc = document.querySelector('.less-desc');

    showMoreBtn.addEventListener("click", function() {
        if (moreDesc.style.display === 'none') {
            moreDesc.style.display = 'block';
            lessDesc.style.display = 'none';
            showMoreBtn.innerText = 'Sembunyikan';
        } else {
            moreDesc.style.display = 'none';
            lessDesc.style.display = 'block';
            showMoreBtn.innerText = 'Selengkapnya';
        }
    });
});