        const stars = document.querySelectorAll('.star');
        const submitRatingBtn = document.getElementById('submitRating');
        const popUpContainer = document.getElementById('popup-container');
        const popUpContainerX = document.getElementById('popup-containerX');
        const ratingStars = document.querySelectorAll('.give-rating .star');
        const closePopupX = document.getElementById('closePopupX');
        const rateButton = document.getElementById('rateButton');
        const closePopup = document.getElementById('closePopup');

        // product katalog
        $(document).ready(function() {
            $('.card-clicked').on('click', function() {
            const cardId = $(this).data('card-id');
            const newUrl = `/catalog/detail/${cardId}`;
    
        
            window.location.href = newUrl;
            });
        });
        // end product katalog

        // product detail
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
            
            document.addEventListener("DOMContentLoaded", function () {
                const showMoreBtns = document.querySelectorAll(".show-more-btn");
                const showLessBtns = document.querySelectorAll(".show-less-btn");
                const lessDescs = document.querySelectorAll(".less-desc");
                const moreDescs = document.querySelectorAll(".more-desc");
        
                showMoreBtns.forEach((btn, index) => {
                    btn.addEventListener("click", function () {
                        lessDescs[index].style.display = "none";
                        moreDescs[index].style.display = "block";
                    });
                });
        
                showLessBtns.forEach((btn, index) => {
                    btn.addEventListener("click", function () {
                        moreDescs[index].style.display = "none";
                        lessDescs[index].style.display = "block";
                    });
                });
            });        

        window.addEventListener('popstate', function() {
            if (history.state && history.state.clearSuccess) {
                sessionStorage.removeItem('success');
            }
        });

        // end product detail js