var magnifying_area = document.getElementById("product-image"); // Utiliza el ID "product-image"
var magnifying_img = document.getElementById("zoomImage"); // Utiliza el ID "zoomImage"

magnifying_area.addEventListener("mousemove", function(event) {
    clientX = event.clientX - magnifying_area.offsetLeft;
    clientY = event.clientY - magnifying_area.offsetTop;

    var mWidth = magnifying_area.offsetWidth;
    var mHeight = magnifying_area.offsetHeight;
    clientX = (clientX / mWidth) * 100;
    clientY = (clientY / mHeight) * 100;

    magnifying_img.style.transform = 'translate(-'+clientX+'%, -'+clientY+'%) scale(1.1)';
});

magnifying_area.addEventListener("mouseleave", function() {
    magnifying_img.style.transform = 'translate(-50%, -50%) scale(1)';
});
