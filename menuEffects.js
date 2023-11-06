var navLinks = document.querySelectorAll('nav a');

for (var i = 0; i < navLinks.length; i++) {
    navLinks[i].addEventListener('mouseover', function(event) {
        event.target.style.textShadow = '2px 2px 4px #ffffff';
        event.target.style.transform = 'scale(1.2)';
    });

    navLinks[i].addEventListener('mouseout', function(event) {
        event.target.style.textShadow = '';
        event.target.style.transform = '';
    });
}
