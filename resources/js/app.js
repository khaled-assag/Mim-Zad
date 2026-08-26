import './bootstrap';

import Alpine from 'alpinejs';

document.addEventListener('alpine:init', () => {
    Alpine.data('mzCountdown', (endsAtIso) => ({
        d: '00',
        h: '00',
        m: '00',
        s: '00',
        finished: false,
        timer: null,
        init() {
            this.tick();
            this.timer = setInterval(() => this.tick(), 1000);
        },
        destroy() {
            if (this.timer) {
                clearInterval(this.timer);
            }
        },
        tick() {
            const end = new Date(endsAtIso).getTime();
            const diff = Math.max(0, Math.floor((end - Date.now()) / 1000));
            this.finished = diff === 0;
            this.d = String(Math.floor(diff / 86400)).padStart(2, '0');
            this.h = String(Math.floor((diff % 86400) / 3600)).padStart(2, '0');
            this.m = String(Math.floor((diff % 3600) / 60)).padStart(2, '0');
            this.s = String(diff % 60).padStart(2, '0');
        },
    }));

    Alpine.data('mzMobileMenu', () => ({
        open: false,
        toggle() {
            this.open = !this.open;
        },
        close() {
            this.open = false;
        },
    }));
});

window.Alpine = Alpine;

Alpine.start();
