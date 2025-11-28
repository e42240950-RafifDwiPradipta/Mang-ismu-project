import './bootstrap';

// 1. KODE UNTUK ADMIN PANEL (DARI BREEZE)
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();


// 2. KODE UNTUK SLIDER BARU
import Splide from '@splidejs/splide';
// !! PENTING: Import CSS dasar Splide agar tidak berantakan
import '@splidejs/splide/css/core';


// 3. KODE UNTUK POPUP & SLIDER
// Tunggu hingga semua HTML selesai dimuat
document.addEventListener('DOMContentLoaded', function() {
    
    // ======== KODE UNTUK POPUP ========
    const popupTriggers = document.querySelectorAll('.value-card');
    const popupCloses = document.querySelectorAll('.popup-close');
    const popupOverlays = document.querySelectorAll('.popup-overlay');

    function openPopup(popupId) {
        const popup = document.getElementById(popupId);
        if (popup) {
            popup.classList.add('active');
        }
    }

    function closePopup(popup) {
        if(popup) {
            popup.classList.remove('active');
        }
    }

    popupTriggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            const popupId = trigger.dataset.target;
            openPopup(popupId);
        });
    });

    popupCloses.forEach(button => {
        button.addEventListener('click', () => {
            const popup = button.closest('.popup-overlay');
            closePopup(popup);
        });
    });

    popupOverlays.forEach(overlay => {
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                closePopup(overlay);
            }
        });
    });
    // ======== AKHIR KODE POPUP ========



    // ======== KODE SLIDER (DENGAN PERBAIKAN 'mouseenter') ========
    
    // 1. Ambil elemen slider (lapisan belakang)
    const heroSliderElement = document.querySelector('.hero-slider-background');
    
    // 2. Ambil elemen teks (lapisan depan)
    const heroTextElement = document.querySelector('.hero-text-content');
    
    // 3. Cek apakah slidernya ada
    if (heroSliderElement) {
        
        // 4. Inisialisasi slider DAN simpan di variabel 'splide'
        const splide = new Splide(heroSliderElement, {
            type       : 'fade',
            rewind     : true,
            perPage    : 1,
            autoplay   : true,
            interval   : 4000,
            arrows     : false,
            pagination : false,
            pauseOnHover : true, // <-- INI YANG KITA MAU
        }).mount();

        // 5. Tambahkan "pendengar" manual ke Lapisan Depan (teks)
        if (heroTextElement) {
            
            // Saat mouse MASUK ke area teks
            heroTextElement.addEventListener('mouseenter', function() {
                splide.Components.Autoplay.pause(); // Paksa slider PAUSE
            });

            // Saat mouse KELUAR dari area teks
            heroTextElement.addEventListener('mouseleave', function() {
                splide.Components.Autoplay.play(); // Lanjutkan slider PLAY
            });
        }
    }
    // ======== AKHIR KODE SLIDER ========

});