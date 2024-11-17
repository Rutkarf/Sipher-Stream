document.addEventListener('DOMContentLoaded', function() {
    loadFavorites();

    const toast = new bootstrap.Toast(document.getElementById('favoriteToast'));

    function loadFavorites() {
        fetch('/api/favorites')
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('favorites-container');
                container.innerHTML = '';
                data.forEach(favorite => {
                    const element = createFavoriteElement(favorite);
                    container.appendChild(element);
                });
            })
            .catch(error => console.error('Error:', error));
    }

    function createFavoriteElement(favorite) {
        const div = document.createElement('div');
        div.className = 'favorite-item';
        div.innerHTML = `
            <img src="https://image.tmdb.org/t/p/w92${favorite.poster_path}" alt="${favorite.title || favorite.name}">
            <span>${favorite.title || favorite.name}</span>
            <button class="btn btn-sm btn-danger remove-favorite" data-id="${favorite.id}" data-type="${favorite.media_type}">Supprimer</button>
        `;
        div.querySelector('img').addEventListener('click', () => showDetails(favorite));
        div.querySelector('.remove-favorite').addEventListener('click', (e) => removeFavorite(e.target.dataset.id, e.target.dataset.type));
        return div;
    }

    function showDetails(favorite) {
        fetch(`/api/details?id=${favorite.id}&type=${favorite.media_type}`)
            .then(response => response.json())
            .then(data => {
                displayToast(data);
            })
            .catch(error => console.error('Error:', error));
    }

    function displayToast(data) {
        const toastTitle = document.getElementById('toastTitle');
        const toastBody = document.getElementById('toastBody');

        toastTitle.textContent = data.title || data.name;
        
        let content = `
            <img src="https://image.tmdb.org/t/p/w200${data.poster_path}" alt="${data.title || data.name}" style="float: left; margin-right: 10px;">
            <p><strong>Note :</strong> ${data.vote_average}/10</p>
            <p><strong>Date de sortie :</strong> ${data.release_date || data.first_air_date}</p>
            <p><strong>Résumé :</strong> ${data.overview}</p>
        `;

        if (data.similar && data.similar.results.length > 0) {
            content += '<p><strong>Suggestions similaires :</strong></p><ul>';
            data.similar.results.slice(0, 3).forEach(item => {
                content += `<li>${item.title || item.name}</li>`;
            });
            content += '</ul>';
        }

        toastBody.innerHTML = content;
        toast.show();
    }

    function removeFavorite(id, type) {
        fetch(`/api/favorites/remove`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id, type }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadFavorites();
            } else {
                alert('Erreur lors de la suppression du favori');
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
