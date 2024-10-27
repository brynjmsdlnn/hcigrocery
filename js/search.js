document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    const searchContainer = document.querySelector('.search-results-container');
    let debounceTimer;

    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        const query = this.value.trim();
        
        // Hide results if search is empty
        if (query === '') {
            searchContainer.style.display = 'none';
            return;
        }

        // Debounce search to avoid too many requests
        debounceTimer = setTimeout(() => performSearch(query), 300);
    });

    async function performSearch(query) {
        try {
            const response = await fetch(`/hci/api/search_products.php?q=${encodeURIComponent(query)}`);
            console.log("Response status:", response.status);
            
            const responseText = await response.text();
            console.log("Raw response:", responseText);
            
            let data;
            try {
                data = JSON.parse(responseText);
            } catch (e) {
                console.error("Failed to parse JSON:", e);
                displayError('Invalid response from server');
                return;
            }
            
            if (data.status === 'success') {
                displayResults(data.data);
            } else {
                console.error("Error details:", data);
                displayError(data.message || 'An error occurred while searching');
            }
        } catch (error) {
            console.error("Search error:", error);
            displayError('An error occurred while searching: ' + error.message);
        }
    }

    function displayResults(results) {
        searchResults.innerHTML = '';
        searchContainer.style.display = 'block';

        if (results.length === 0) {
            searchResults.innerHTML = '<div class="no-results">No products found</div>';
            return;
        }

        results.forEach(product => {
            const productElement = document.createElement('div');
            productElement.className = 'search-result-item';
            productElement.innerHTML = `
                <div class="d-flex align-items-center p-2 border-bottom">
                    <img src="${product.image_url || 'placeholder.jpg'}" 
                         alt="${product.name}" 
                         class="search-result-image me-3">
                    <div>
                        <h6 class="mb-0">${product.name}</h6>
                        <small class="text-muted">${product.category_name}</small>
                        <div class="price">$${parseFloat(product.price).toFixed(2)}</div>
                    </div>
                </div>
            `;
            
            productElement.addEventListener('click', () => {
                window.location.href = `/product.php?id=${product.id}`;
            });
            
            searchResults.appendChild(productElement);
        });
    }

    function displayError(message) {
        console.error("Displaying error:", message);
        searchResults.innerHTML = `
            <div class="search-error">
                <i class="fas fa-exclamation-circle"></i>
                ${message}
            </div>
        `;
        searchContainer.style.display = 'block';
    }

    // Close search results when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.search-container')) {
            searchContainer.style.display = 'none';
        }
    });
});