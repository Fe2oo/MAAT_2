
    document.getElementById('navToggle').addEventListener('click', function() {
        const navlinks = document.getElementById('navlinks');
        if (navlinks.style.display === 'block') {
            navlinks.style.display = 'none';
        } else {
            navlinks.style.display = 'block';
        }
    });
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollToTopBtn.style.display = 'block';
        } else {
            scrollToTopBtn.style.display = 'none';
        }
    });

    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        const slides = document.getElementsByClassName('slide');
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = 'none';
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }
        slides[slideIndex - 1].style.display = 'block';
        setTimeout(showSlides, 3000); 
    }
