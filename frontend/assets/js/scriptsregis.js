document.addEventListener("DOMContentLoaded", () => {
    const image = document.getElementById("logoutbkos");
    let angle = 0;

    function floatEffect() {
        angle += 0.05; // Kecepatan gerakan
        const yOffset = Math.sin(angle) * 10; // Amplitudo gerakan
        image.style.transform = `translateY(${yOffset}px)`;
        requestAnimationFrame(floatEffect);
    }

    floatEffect();
});