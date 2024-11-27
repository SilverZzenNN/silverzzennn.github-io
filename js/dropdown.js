function toggleDropdown(gridId, arrowId) {
            const thumbnailGrid = document.getElementById(gridId);
            const arrow = document.getElementById(arrowId);
            thumbnailGrid.classList.toggle('show');
            arrow.classList.toggle('active');
        }