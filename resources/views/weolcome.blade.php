<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome</title>
    @vite('resources/css/app.css')
</head>
<body>
          {{-- Animation --}}
      <div class="h-screen flex items-center justify-center bg-base-100">
        <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 animate-bounce">
          🎉 Welcome To The Multi CRUD 🎉
        </h1>
      </div>


     
      <!-- Confetti container -->
      <div id="confetti" class="absolute inset-0 pointer-events-none z-50 hidden"></div>

      <script>
      document.addEventListener("DOMContentLoaded", () => {
        document.body.addEventListener("click", () => {
          const confettiContainer = document.getElementById("confetti");
          confettiContainer.classList.remove("hidden");

          // Create confetti
          for (let i = 0; i < 100; i++) {
            const dot = document.createElement("div");
            dot.className = "w-2 h-2 rounded-full absolute animate-pop";
            dot.style.left = Math.random() * 100 + "vw"; // Random position horizontally
            dot.style.top = Math.random() * 100 + "vh"; // Random position vertically
            dot.style.backgroundColor = getRandomColor();
            confettiContainer.appendChild(dot);
          }

          // Fade out page after delay
          document.body.classList.add("fade-out");
          setTimeout(() => {
            window.location.href = "/slider"; // Change this to your desired route
          }, 1000);
        });

        function getRandomColor() {
          const colors = ["#ffffff", "#3b82f6"]; // white and blue
          return colors[Math.floor(Math.random() * colors.length)];
        }
      });
      </script>

      <style>
      @keyframes pop {
        0% { 
          transform: scale(1) translateY(0); 
          opacity: 1; 
        }
        50% { 
          transform: scale(2) translateY(-30px); 
          opacity: 0.6; 
        }
        100% { 
          transform: scale(4) translateY(-60px); 
          opacity: 0; 
        }
      }

      @keyframes confetti-move {
        0% {
          transform: scale(1) translateY(0) translateX(0); 
          opacity: 1;
        }
        100% {
          transform: scale(4) translateY(150px) translateX(150px); /* Moving away from the center */
          opacity: 0; 
        }
      }

      .animate-pop {
        animation: pop 1.5s ease-out forwards, confetti-move 2s ease-out forwards; /* Both pop and move effects */
      }

      .fade-out {
        transition: opacity 1s ease;
        opacity: 0;
      }
      </style>
</body>
</html>