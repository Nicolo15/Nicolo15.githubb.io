// Dichiarazione delle variabili globali per gestire le immagini
let currentIndex = 0;
let images = [];
// Funzione per mostrare un'immagine nella sovrapposizione
function showImage(src, title, artist) {
    const overlay = document.getElementById('overlay');
    const overlayImage = document.getElementById('overlay-image');
    const overlayTitle = document.getElementById('overlay-title');
    const overlayDescription = document.getElementById('overlay-description');
    const loader = document.getElementById('loader');

    overlay.style.display = 'flex';
    loader.style.display = 'block';
    overlayImage.style.display = 'none';
    overlayTitle.textContent = title;
    overlayDescription.textContent = `Artist: ${artist}`;

    const img = new Image();
    img.src = src;
    img.onload = () => {
        loader.style.display = 'none';
        overlayImage.src = src;
        overlayImage.style.display = 'block';
    };
    img.onerror = () => {
        loader.style.display = 'none';
        alert('Error loading image.');
        overlay.style.display = 'none';
    };

    // Aggiunge l'immagine, il titolo e l'artista all'array corrispondente
    images.push(src);
}

// Funzione per nascondere l'immagine nella sovrapposizione
function hideImage() {
    const overlay = document.getElementById('overlay');
    overlay.style.display = 'none';
}

// Funzione per cambiare l'immagine nella sovrapposizione
function changeImage(direction) {
    const overlayImage = document.getElementById('overlay-image');
    const overlayTitle = document.getElementById('overlay-title');
    const overlayDescription = document.getElementById('overlay-description');

    // Incrementa o decrementa l'indice corrente in base alla direzione
    currentIndex += direction;

    // Controlla i limiti
    if (currentIndex < 0) {
        currentIndex = images.length - 1;
    } else if (currentIndex >= images.length) {
        currentIndex = 0;
    }

    // Aggiorna la sovrapposizione con la nuova immagine e le informazioni
    overlayImage.src = images[currentIndex];
}
