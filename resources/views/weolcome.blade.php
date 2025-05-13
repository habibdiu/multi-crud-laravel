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
    <div class="h-screen flex items-center justify-center bg-base-100">
        <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-800 via-white-100 to-red-800 animate-bounce">
            🎉 Welcome To The Multi CRUD 🎉
        </h1>
    </div>

    
    <div id="confetti" class="absolute inset-0 pointer-events-none z-50 hidden"></div>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
      document.body.addEventListener("click", () => {
          const confettiContainer = document.getElementById("confetti");
          confettiContainer.classList.remove("hidden");

          
          for (let i = 0; i <1000; i++) {
              const dot = document.createElement("div");
              dot.className = "w-2 h-2 rounded-full absolute animate-pop";
              dot.style.left = Math.random() * 100 + "vw";
              dot.style.top = Math.random() * 100 + "vh";
              dot.style.backgroundColor = getRandomColor();
              confettiContainer.appendChild(dot);
          }

          
          document.body.classList.add("fade-out");
          setTimeout(() => {
              window.location.href = "/slider";
          }, 400);
        });

        function getRandomColor() {
            const colors = ["#ffffff", "#0ea5e9"];
            return colors[Math.floor(Math.random() * colors.length)];
        }
      });
    </script>

    <style>
    @keyframes pop {
        0% { transform: scale(1) translateY(0); opacity: 1; }
        50% { transform: scale(2) translateY(-30px); opacity: 0.6; }
        100% { transform: scale(4) translateY(-60px); opacity: 0; }
    }

    @keyframes confetti-move {
        0% { transform: scale(1) translateY(0) translateX(0); opacity: 1; }
        100% { transform: scale(4) translateY(100px) translateX(100px); opacity: 0; }
    }

    .animate-pop {
        animation: pop 0.7s ease-out forwards, confetti-move 1s ease-out forwards;
    }

    .fade-out {
        transition: opacity 0.5s ease;
        opacity: 0;
    }
    </style>
</body>
</html>
