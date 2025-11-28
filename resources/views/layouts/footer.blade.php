<footer class="site-footer">
    <div class="container">
        
        {{-- BAGIAN ATAS: PARTNER PENGIRIMAN --}}
        <div class="footer-top">
            <h3 class="footer-section-title">Tersedia Di</h3>
            <div class="partner-logos">
                {{-- Logo GrabFood (Update Link Gambar PNG) --}}
                <a href="https://food.grab.com/id/id/restaurant/cilok-mang-ismu-dabasah-delivery/6-C651AZBJRYJHTT?" target="_blank" class="partner-box" title="Pesan via GrabFood">
                    <img src="{{ asset('assets/images/food.png') }}" alt="GrabFood">
                </a>
            </div>
        </div>

        <div class="footer-divider"></div>

        {{-- BAGIAN TENGAH: INFORMASI UTAMA --}}
        <div class="footer-main">
            {{-- Kolom 1: Brand --}}
            <div class="footer-col brand-col">
                {{-- Logo Mang Ismu --}}
                <img src="{{ asset('assets/images/Logo menu.svg') }}" alt="Mang Ismu Logo" class="footer-logo">
                <p class="footer-desc">
                    Jagonya Kuliner Bondowoso.<br>
                    Menyajikan cita rasa otentik yang bikin kangen dengan bahan terbaik.
                </p>
            </div>

            {{-- Kolom 2: Jam Operasional --}}
            <div class="footer-col">
                <h4><i class="far fa-clock"></i> Jam Operasional</h4>
                <ul>
                    <li>Setiap Hari</li>
                    <li class="highlight-text">10:00 - 22:00 WIB</li>
                </ul>
            </div>

            {{-- Kolom 3: Kontak & Alamat --}}
            <div class="footer-col">
                <h4><i class="fas fa-headset"></i> Hubungi Kami</h4>
                <ul>
                    <li><a href="https://wa.me/6285732651979">+62 857-3265-1979</a></li>
                    <li>Bondowoso, Jawa Timur</li>
                </ul>
                <a href="https://wa.me/6285732651979" class="btn-footer-wa">Hubungi WA</a>
            </div>
        </div>

        {{-- BAGIAN BAWAH: COPYRIGHT --}}
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} <strong>Mang Ismu</strong>. All Rights Reserved.</p>
        </div>
    </div>
</footer>