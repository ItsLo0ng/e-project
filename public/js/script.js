// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Ticker footer
function updateTicker() {
    const date = new Date().toLocaleString('vi-VN');
    let location = 'Không xác định';
    navigator.geolocation.getCurrentPosition(pos => {
        location = `Vĩ độ: ${pos.coords.latitude}, Kinh độ: ${pos.coords.longitude}`;
    });
    document.getElementById('ticker').innerHTML = `Thời gian: ${date} | Vị trí: ${location}`;
}
updateTicker();
setInterval(updateTicker, 1000);

// Filter gallery
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const filter = btn.dataset.filter;
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.style.display = (filter === 'all' || item.dataset.category === filter) ? 'block' : 'none';
        });
    });
});

// Modal detail
const detailModal = document.getElementById('detailModal');
if (detailModal) {
    detailModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;
        document.getElementById('modalTitle').textContent = button.dataset.title;
        document.getElementById('modalImage').src = button.dataset.image;
        document.getElementById('modalDescription').textContent = button.dataset.description;
        document.getElementById('modalHistory').textContent = button.dataset.history;
    });
}