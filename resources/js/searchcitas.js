document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const doctorId = document.getElementById('doctor_id').value;
    const citasContainer = document.getElementById('citas-container');

    searchInput.addEventListener('input', function() {
        const searchText = searchInput.value;

        fetch(`/citas_doc/search?search=${encodeURIComponent(searchText)}&doctor_id=${doctorId}`)
            .then(response => response.text())
            .then(html => {
                const newDoc = new DOMParser().parseFromString(html, 'text/html');
                
                const newCitasContainer = newDoc.getElementById('citas-container');
                if (newCitasContainer) {
                    citasContainer.innerHTML = newCitasContainer.innerHTML;
                }
            })
            .catch(error => console.error('Error:', error));
    });
});
