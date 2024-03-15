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

    // Funzione per cambiare il colore dei riquadri
    function changeColor() {
        // Itera su tutti i riquadri colorati e cambia il loro colore in uno casuale
        colorBoxes.forEach(function(box) {
            box.style.backgroundColor = getRandomColor();
        });
    }

    // Aggiungi un listener per l'evento click per il bottone
    changeColorButton.addEventListener('click', changeColor);

    // Aggiungi un listener per l'evento touchstart per il bottone
    changeColorButton.addEventListener('touchstart', changeColor);
});
