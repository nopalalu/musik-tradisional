<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Musik Nusantara</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* ================= GLOBAL ================= */

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: #e2e8f0;
            padding-top: 80px;
            background:
                radial-gradient(circle at 20% 20%, #1e3a8a 0%, #0f172a 45%, #020617 100%);
            overflow-x: hidden;
            opacity: 0;
            animation: fadeBody 0.4s ease forwards;
            font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
        }

        @keyframes fadeBody {
            to {
                opacity: 1;
            }
        }

        /* Floating glow */
        body::before {
            content: "";
            position: fixed;
            width: 900px;
            height: 900px;
            background: radial-gradient(circle, rgba(34, 197, 94, 0.18), transparent 60%);
            top: -250px;
            left: -250px;
            animation: floatGlow 14s infinite alternate ease-in-out;
            z-index: 0;
            pointer-events: none;
        }

        @keyframes floatGlow {
            from {
                transform: translate(0, 0);
            }

            to {
                transform: translate(180px, 150px);
            }
        }

        /* Batik corner decoration */
        body::after {
            content: "";
            position: fixed;
            top: -180px;
            right: -180px;
            width: 800px;
            height: 800px;

            background: url('/assets/img/batik.jpg') no-repeat center;
            background-size: cover;

            opacity: 0.08;
            transform: rotate(25deg);

            filter: blur(2px);

            -webkit-mask-image: radial-gradient(circle, black 60%, transparent 85%);
            mask-image: radial-gradient(circle, black 60%, transparent 85%);

            pointer-events: none;
            z-index: 0;
            animation: floatBatik 20s infinite alternate ease-in-out;
        }

        @keyframes floatBatik {
            from {
                transform: rotate(25deg) translate(0, 0);
            }

            to {
                transform: rotate(28deg) translate(-40px, 30px);
            }
        }

        h1,
        h2,
        h3 {
            font-weight: 700;
        }

        .main-wrapper {
            position: relative;
            z-index: 2;
            padding-bottom: 100px;
            opacity: 0;
            animation: fadePage 0.5s ease-out forwards;
        }

        @keyframes fadePage {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ================= NAVBAR ================= */

        .navbar {
            height: 80px;
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 20px;
        }

        .nav-link {
            color: #cbd5e1 !important;
        }

        .nav-link:hover {
            color: white !important;
        }

        /* ================= HERO ================= */

        .hero {
            text-align: center;
            padding: 80px 20px 60px;
            animation: fadeHero 1s ease forwards;
            opacity: 0;
        }

        @keyframes fadeHero {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-title {
            font-size: 60px;
            letter-spacing: -1px;
            text-shadow: 0 20px 50px rgba(34, 197, 94, 0.15);
            min-height: 75px;
        }

        .hero-subtitle {
            margin-top: 20px;
            font-size: 18px;
            color: #94a3b8;
        }

        /* ================= SEARCH ================= */

        .search-wrapper {
            margin-top: 40px;
            display: flex;
            justify-content: center;
        }

        .search-box {
            display: flex;
            gap: 12px;
            background: rgba(15, 23, 42, 0.8);
            padding: 15px;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }

        .search-box input,
        .search-box select {
            background: #0f172a;
            border: 1px solid #334155;
            color: white;
            border-radius: 12px;
            padding: 10px 14px;
        }

        .search-box button {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
            color: white;
            transition: 0.2s;
        }

        .search-box button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(34, 197, 94, 0.3);
        }

        /* ================= CARD ================= */

        .card-custom {
            background: rgba(30, 41, 59, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            transition: 0.3s ease;
            padding: 20px;
        }

        .card-custom:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        }

        /* ================= MAP ================= */

        .map-section {
            margin-top: 120px;
            text-align: center;
        }

        .map-section h2 {
            margin-bottom: 40px;
        }

        .map-svg {
            max-width: 1100px;
            margin: auto;
            display: block;
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .map-svg path {
            fill: #22c55e;
            transition: 0.3s;
            cursor: pointer;
        }

        .map-svg path:hover {
            fill: #3b82f6;
            filter: drop-shadow(0 0 12px rgba(59, 130, 246, 0.6));
        }

        /* ================= TOOLTIP ================= */

        #tooltip {
            position: fixed;
            background: rgba(15, 23, 42, 0.95);
            color: white;
            padding: 6px 12px;
            border-radius: 10px;
            font-size: 14px;
            pointer-events: none;
            opacity: 0;
            transition: 0.2s ease;
            z-index: 9999;
        }

        /* ================= TABLE ================= */

        .table {
            background: rgba(30, 41, 59, 0.7);
            color: white;
        }

        .table thead {
            background: rgba(51, 65, 85, 0.7);
        }

        /* scroll */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* ================= FOOTER ================= */

        footer {
            margin-top: 120px;
            text-align: center;
            color: #64748b;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark px-4 fixed-top">
        <a class="navbar-brand" href="/">Musik Nusantara</a>
        <div class="ms-auto">
            <a href="/" class="nav-link d-inline">Home</a>
            <a href="/search" class="nav-link d-inline">Cari</a>
        </div>
    </nav>

    <div class="main-wrapper">
        @yield('content')
    </div>

    <footer>
        © {{ date('Y') }} Musik Nusantara — Edukasi Interaktif Budaya Indonesia
    </footer>

    <script src="{{ asset('assets/js/tooltip.js') }}"></script>
    <script src="{{ asset('assets/js/quiz.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const reveals = document.querySelectorAll(".reveal");

            function revealOnScroll() {
                const triggerBottom = window.innerHeight * 0.85;

                reveals.forEach(el => {
                    const boxTop = el.getBoundingClientRect().top;

                    if (boxTop < triggerBottom) {
                        el.classList.add("active");
                    }
                });
            }

            window.addEventListener("scroll", revealOnScroll);
            revealOnScroll();
        });
    </script>

</body>

</html>
