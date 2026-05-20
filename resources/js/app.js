import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    // --- Ambil SEMUA elemen di satu tempat ---
    const nav = document.getElementById("navbar");

    // Elemen Menu Mobile
    const menuButton = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");
    const iconMenu = document.getElementById("icon-menu");
    const iconX = document.getElementById("icon-x");
    // Ambil semua link untuk menutup menu saat diklik
    const navLinks = document.querySelectorAll(".nav-link");

    // Elemen Menu User (Desktop) - (Akan null jika user adalah 'guest')
    const userMenuButton = document.getElementById("user-menu-button");
    const userMenu = document.getElementById("user-menu");

    // --- Logika 1: Efek Scroll Navbar ---
    if (nav) {
        const handleScroll = () => {
            // Logika scroll Anda sudah benar (menggunakan 20px atau 50px)
            if (window.scrollY > 50) {
                nav.classList.add("shadow-md", "bg-white");
                nav.classList.remove("bg-white/95", "backdrop-blur-sm");
            } else {
                nav.classList.remove("shadow-md", "bg-white");
                nav.classList.add("bg-white/95", "backdrop-blur-sm");
            }
        };
        window.addEventListener("scroll", handleScroll);
        handleScroll(); // Jalankan sekali saat load
    }

    // --- Logika 2: Menu Mobile (Tombol Burger) ---
    // Pastikan semua elemennya ada sebelum menambahkan listener
    if (menuButton && mobileMenu && iconMenu && iconX) {
        menuButton.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
            iconMenu.classList.toggle("hidden");
            iconX.classList.toggle("hidden");
        });
    }

    // --- Logika 3: Tutup Menu Mobile & Smooth Scroll (PERBAIKAN) ---
    navLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            // Tambahkan parameter 'e'
            const href = this.getAttribute("href");

            // PERBAIKAN: Hanya jalankan logika ini jika link adalah #hash
            if (href && href.startsWith("#")) {
                // 1. Hentikan aksi default link agar tidak "melompat"
                e.preventDefault();

                // 2. Lakukan smooth scroll
                try {
                    const element = document.querySelector(href);
                    if (element) {
                        element.scrollIntoView({
                            behavior: "smooth",
                        });
                    }
                } catch (error) {
                    // Ini untuk menghindari error jika link # ada tapi elemennya tidak ada
                    console.warn("Elemen smooth scroll tidak ditemukan:", href);
                }

                // 3. Tutup menu mobile (jika sedang terbuka)
                if (mobileMenu && !mobileMenu.classList.contains("hidden")) {
                    mobileMenu.classList.add("hidden");
                    iconMenu.classList.remove("hidden");
                    iconX.classList.add("hidden");
                }
            }
            // Jika ini link normal (seperti /login), biarkan browser membukanya
        });
    });

    // --- Logika 4: Menu Dropdown User (Desktop) ---
    // Logika ini hanya akan berjalan jika user 'auth' (elemennya ada)
    if (userMenuButton && userMenu) {
        userMenuButton.addEventListener("click", function () {
            userMenu.classList.toggle("hidden");
        });

        // Tutup saat klik di luar area menu
        document.addEventListener("click", function (event) {
            // Pastikan elemen ada sebelum memanggil contains
            if (
                userMenuButton &&
                userMenu &&
                !userMenuButton.contains(event.target) &&
                !userMenu.contains(event.target)
            ) {
                userMenu.classList.add("hidden");
            }
        });
    }
});
