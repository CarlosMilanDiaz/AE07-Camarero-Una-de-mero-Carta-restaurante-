// Smooth scrolling for navigation links with # fragments
document.querySelectorAll('nav ul li a[href*="#"]').forEach(link => {
    link.addEventListener('click', function (e) {
        const targetId = this.getAttribute('href').split('#')[1];
        if (targetId) {
            e.preventDefault();
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
});

// Add hover effect to menu items
document.querySelectorAll('.plato').forEach(plato => {
    plato.addEventListener('mouseenter', () => {
        plato.style.transform = 'scale(1.05)';
        plato.style.transition = 'transform 0.3s ease';
    });
    plato.addEventListener('mouseleave', () => {
        plato.style.transform = 'scale(1)';
    });
});