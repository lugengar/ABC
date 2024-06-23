let click = false;
document.querySelectorAll(".inscribirse").forEach(element => {
    element.addEventListener('click', function(event) {
        event.preventDefault();
        if(click == false){
        click = true;
        // Create confetti
        createConfetti();
        
        // Clean up confetti after 5 seconds
        setTimeout(cleanUpConfetti, 4000);


        function createConfetti() {
        const confettiColors = ['#ff4136', '#0074d9', '#2ecc40', '#ffdc00', '#ff1493']; // Colors: red, blue, green, yellow, pink
        const confettiElements = 40; // Number of confetti particles
        const container = document.createElement('div');
        container.classList.add('confetti-container');
        
        for (let i = 0; i < confettiElements; i++) {
            const confetti = document.createElement('div');
            confetti.classList.add('confetti');
            confetti.style.left = `${Math.random() * 100}%`;
            confetti.style.animationDelay = `${Math.random() * 2}s`;
            confetti.style.animationDuration = `${Math.random() * 3 + 1.5}s`;
            
            // Random rotation angle
            const randomRotation = Math.random() * 360;
            confetti.style.transform = `rotate(${randomRotation}deg)`;
            
            // Random color
            const randomColor = confettiColors[Math.floor(Math.random() * confettiColors.length)];
            confetti.style.backgroundColor = randomColor;
            
            container.appendChild(confetti);
        }
        
        document.body.appendChild(container);
        }

        function cleanUpConfetti() {
        const confettiContainer = document.querySelector('.confetti-container');
        if (confettiContainer) {
            confettiContainer.remove();
        
            click = false;
        }
        }
    }
    });
});