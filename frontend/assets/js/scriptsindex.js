document.addEventListener("DOMContentLoaded", () => {
    const imageElement = document.getElementById("images"); // Ambil elemen gambar
    let angle = 0; // Untuk efek melayang
    let currentIndex = 0; // Index gambar saat ini

    // Daftar gambar
    const images = [
        "assets/images/kosan.jpg",
        "assets/images/kosan1.jpg",
        "assets/images/kosan2.jpg"
    ];

    // Fungsi untuk membuat gambar melayang
    function floatEffect() {
        angle += 0.05; // Kecepatan gerakan
        const yOffset = Math.sin(angle) * 10; // Amplitudo gerakan
        imageElement.style.transform = `translateY(${yOffset}px)`; // Efek melayang
        requestAnimationFrame(floatEffect);
    }

    // Fungsi untuk mengganti gambar
    function changeImage() {
        currentIndex = (currentIndex + 1) % images.length; // Pergantian index
        imageElement.src = images[currentIndex]; // Ganti gambar
    }

    // Jalankan efek melayang
    floatEffect();

    // Jalankan pergantian gambar setiap 3 detik
    setInterval(changeImage, 3000);
});


   