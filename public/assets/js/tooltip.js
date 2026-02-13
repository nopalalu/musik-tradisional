const tooltip = document.getElementById('tooltip');
const isDesktop = window.matchMedia('(hover: hover)').matches;

document.querySelectorAll('.map-svg path').forEach(path => {

    if (isDesktop && tooltip) {

        path.addEventListener('mouseenter', () => {
            tooltip.textContent = path.dataset.nama || '';
            tooltip.style.opacity = 1;
            tooltip.style.transform = "translateY(-5px)";
        });

        path.addEventListener('mousemove', (e) => {
            const offset = 15;

            // pakai pageX biar stabil saat scroll
            tooltip.style.left = (e.pageX + offset) + 'px';
            tooltip.style.top  = (e.pageY + offset) + 'px';
        });

        path.addEventListener('mouseleave', () => {
            tooltip.style.opacity = 0;
        });
    }

    path.addEventListener('click', () => {
        const link = path.dataset.link;
        if (link) window.location.href = link;
    });
});
