/* Cursor glow: cahaya perunggu mengikuti kursor (pointer presisi saja). */
(function () {
    if (!window.matchMedia('(pointer:fine)').matches) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    var glow = document.getElementById('cursorGlow');
    if (!glow) return;

    var x = window.innerWidth / 2, y = window.innerHeight / 3;
    var tx = x, ty = y, shown = false;

    window.addEventListener('pointermove', function (e) {
        tx = e.clientX;
        ty = e.clientY;
        if (!shown) {
            shown = true;
            glow.classList.add('on');
        }
    }, { passive: true });

    document.documentElement.addEventListener('pointerleave', function () {
        glow.classList.remove('on');
        shown = false;
    });

    (function loop() {
        x += (tx - x) * 0.1;
        y += (ty - y) * 0.1;
        glow.style.transform = 'translate3d(' + x + 'px,' + y + 'px,0)';
        requestAnimationFrame(loop);
    })();
})();
