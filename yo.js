document.addEventListener('DOMContentLoaded', function() {
    const colorBoxes = document.querySelectorAll('.color-box');
    const changeColorButton = document.getElementById('changeColorButton');

    // Funzione per generare un colore casuale in formato esadecimale
    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Aggiungi un listener per il clic del pulsante per cambiare il colore
    changeColorButton.addEventListener('click', function() {
        // Itera su tutti i riquadri colorati e cambia il loro colore in uno casuale
        colorBoxes.forEach(function(box) {
            box.style.backgroundColor = getRandomColor();
        });
    });
});
