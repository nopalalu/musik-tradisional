/* Cursor glow: cahaya perunggu dua lapis mengikuti kursor (pointer presisi saja). */
(function () {
    if (!window.matchMedia('(pointer:fine)').matches) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    var glow = document.getElementById('cursorGlow');
    var core = document.getElementById('cursorCore');
    if (!glow || !core) return;

    var gx = window.innerWidth / 2, gy = window.innerHeight / 3;
    var cx = gx, cy = gy;
    var tx = gx, ty = gy, shown = false;

    window.addEventListener('pointermove', function (e) {
        tx = e.clientX;
        ty = e.clientY;
        if (!shown) {
            shown = true;
            glow.classList.add('on');
            core.classList.add('on');
        }
    }, { passive: true });

    document.documentElement.addEventListener('pointerleave', function () {
        glow.classList.remove('on');
        core.classList.remove('on');
        shown = false;
    });

    (function loop() {
        gx += (tx - gx) * 0.08;
        gy += (ty - gy) * 0.08;
        cx += (tx - cx) * 0.22;
        cy += (ty - cy) * 0.22;
        glow.style.transform = 'translate3d(' + gx + 'px,' + gy + 'px,0)';
        core.style.transform = 'translate3d(' + cx + 'px,' + cy + 'px,0)';
        requestAnimationFrame(loop);
    })();
})();
