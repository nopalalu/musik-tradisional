<form action="<?php echo e(route('search')); ?>" method="GET" id="searchForm">

    <div class="search-box-wrapper">

        <div class="search-box">

            
            <input type="text" name="q" id="searchInput"
                placeholder="Cari alat musik..."
                value="<?php echo e(request('q')); ?>"
                autocomplete="off">

            
            <select    ect name="kategori" id="kategoriInput" class="kategori-select">
                <option value="">Semua</option>
                <option value="Petik">Petik</option>
                <option value="Pukul">Pukul</option>
                <option value="Tiup">Tiup</option>
                <option value="Gesek">Gesek</option>
                <option value="Goyang">Goyang</option>
                <option value="Getar">Getar</option>
            </select>

            <button type="submit">Cari</button>

        </div>

        
        <div id="liveSearchResult" class="live-search-dropdown"></div>

    </div>

</form><?php /**PATH C:\laragon\www\musik-tradisional\resources\views/components/search-box.blade.php ENDPATH**/ ?>