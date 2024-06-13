document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    const resultsContainer = document.getElementById('resultsContainer');

    searchButton.addEventListener('click', function(event) {
        event.preventDefault();

        const query = searchInput.value.trim();

        if (query) {
            searchCrypto(query);
        } else {
            displayError('Please enter at least one cryptocurrency symbol.');
        }
    });

    function searchCrypto(query) {
        const symbols = query.split(',').map(sym => sym.trim());
        const validSymbols = [];
        const invalidSymbols = [];


        resultsContainer.innerHTML = '';


        symbols.forEach(symbol => {
            const apiUrl = `https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest?symbol=${symbol.toUpperCase()}`;

            fetch(apiUrl, {
                headers: {
                    'X-CMC_PRO_API_KEY': '27ab17d1-215f-49e5-9ca4-afd48810c149'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Network response was not ok: ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                if (data && data.data && data.data[symbol.toUpperCase()]) {
                    validSymbols.push(symbol.toUpperCase());
                    displayResults(data.data[symbol.toUpperCase()]);
                } else {
                    invalidSymbols.push(symbol.toUpperCase());
                }
            })
            .catch(error => {
                displayError(`Error fetching data for ${symbol.toUpperCase()}: ${error.message}`);
            });
        });

        
        if (invalidSymbols.length > 0) {
            displayError(`No results found for ${invalidSymbols.join(', ')}.`);
        }
    }

    function displayResults(data) {
        const volumeChange = parseFloat(data.quote.USD.volume_change_24h).toFixed(2);
        const volumeChangeSymbol = volumeChange >= 0 ? '+' : '-';
        const volumeChangeColor = volumeChange >= 0 ? 'green' : 'red';

        const price = parseFloat(data.quote.USD.price).toFixed(2);

        const resultHtml = `
            <div class="crypto-card">
                <div class="crypto-details">
                    <h3>${data.name} (${data.symbol})</h3>
                    <p><span style="color: ${volumeChangeColor};">${volumeChangeSymbol}${Math.abs(volumeChange)} ${data.symbol}</span></p>
                </div>
                <div class="crypto-stats">
                    <p>Price: $${price}</p>
                    <p>Rank: ${data.cmc_rank}</p>
                </div>
            </div>
        `;

        resultsContainer.insertAdjacentHTML('beforeend', resultHtml);
    }

    function displayError(message) {
        resultsContainer.innerHTML = `<p class="error-message">${message}</p>`;
    }
});
