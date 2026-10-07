/* Ruang Bunyi: bilah perunggu yang bisa dimainkan (Web Audio API, tanpa file audio).
   Nada disintesis ala metalofon: partial inharmonic + decay eksponensial. */
document.addEventListener('DOMContentLoaded', function () {
    var pads = document.querySelectorAll('.gamelan-pad');
    if (!pads.length) return;

    var ctx = null, master = null;

    function ensureCtx() {
        if (!ctx) {
            var AC = window.AudioContext || window.webkitAudioContext;
            if (!AC) return false;
            ctx = new AC();
            master = ctx.createGain();
            master.gain.value = 0.5;
            master.connect(ctx.destination);
        }
        if (ctx.state === 'suspended') ctx.resume();
        return true;
    }

    /* satu pukulan: partial 1 / 2.76 / 5.40 / 8.93, makin tinggi makin cepat hilang */
    function strike(freq) {
        if (!ensureCtx()) return;
        var t = ctx.currentTime + 0.01;
        var partials = [
            { r: 1.00, g: 0.85, tau: 2.6 },
            { r: 2.76, g: 0.30, tau: 1.2 },
            { r: 5.40, g: 0.13, tau: 0.55 },
            { r: 8.93, g: 0.05, tau: 0.28 }
        ];
        partials.forEach(function (p) {
            var o = ctx.createOscillator();
            o.type = 'sine';
            o.frequency.value = freq * p.r;
            var gn = ctx.createGain();
            gn.gain.setValueAtTime(0.0001, t);
            gn.gain.exponentialRampToValueAtTime(p.g, t + 0.004);
            gn.gain.exponentialRampToValueAtTime(0.0001, t + p.tau);
            o.connect(gn);
            gn.connect(master);
            o.start(t);
            o.stop(t + p.tau + 0.1);
        });
    }

    pads.forEach(function (pad) {
        pad.addEventListener('pointerdown', function () {
            strike(parseFloat(pad.dataset.freq));

            var ripple = document.createElement('span');
            ripple.className = 'pad-ripple';
            pad.appendChild(ripple);
            setTimeout(function () { ripple.remove(); }, 700);

            pad.classList.add('struck');
            setTimeout(function () { pad.classList.remove('struck'); }, 320);
        });
    });
});
