<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Space Shooter</title>
  <style>
    body {
      margin: 0;
      overflow: hidden;
      background: linear-gradient(to bottom, #000428, #004e92);
      font-family: Arial, sans-serif;
      color: white;
    }
    canvas {
      display: block;
      margin: 0 auto;
    }
    .menu {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      height: 100vh;
      background: black;
      color: white;
    }
    .menu button {
      padding: 10px 20px;
      font-size: 20px;
      cursor: pointer;
      border: none;
      background: red;
      color: white;
      margin: 10px;
      border-radius: 5px;
    }
    .score {
      position: absolute;
      top: 10px;
      left: 10px;
      font-size: 20px;
    }
    .game-over {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      background: rgba(0, 0, 0, 0.8);
      padding: 20px;
      border-radius: 10px;
    }
    .game-over h1 {
      margin: 0 0 10px;
    }
    .game-over button {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      border: none;
      background: red;
      color: white;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="menu" id="menu">
    <h1>Welcome to Space Shooter</h1>
    <button onclick="startGame()">Start Game</button>
  </div>
  <div class="score">Score: <span id="score">0</span></div>
  <div class="game-over" id="gameOver">
    <h1>Game Over</h1>
    <p>Your Score: <span id="finalScore">0</span></p>
    <button onclick="restartGame()">Play Again</button>
  </div>
  <canvas id="gameCanvas"></canvas>

  <script>
    const canvas = document.getElementById('gameCanvas');
    const ctx = canvas.getContext('2d');
    const menu = document.getElementById('menu');

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    let score = 0;
    let gameRunning = false;
    const player = {
      x: canvas.width / 2,
      y: canvas.height - 50,
      width: 40,
      height: 20,
      color: 'blue',
    };

    const bullets = [];
    const enemies = [];

    function createEnemy() {
      const size = Math.random() * 30 + 20;
      enemies.push({
        x: Math.random() * (canvas.width - size),
        y: -size,
        width: size,
        height: size,
        color: 'red',
        speed: Math.random() * 2 + 1,
      });
    }

    function drawPlayer() {
      ctx.fillStyle = player.color;
      ctx.fillRect(player.x, player.y, player.width, player.height);
    }

    function drawBullets() {
      bullets.forEach((bullet, index) => {
        ctx.fillStyle = 'yellow';
        ctx.fillRect(bullet.x, bullet.y, bullet.width, bullet.height);
        bullet.y -= bullet.speed;

        if (bullet.y + bullet.height < 0) {
          bullets.splice(index, 1);
        }
      });
    }

    function drawEnemies() {
      enemies.forEach((enemy, index) => {
        ctx.fillStyle = enemy.color;
        ctx.fillRect(enemy.x, enemy.y, enemy.width, enemy.height);
        enemy.y += enemy.speed;

        if (enemy.y > canvas.height) {
          endGame();
        }
      });
    }

    function detectCollisions() {
      bullets.forEach((bullet, bulletIndex) => {
        enemies.forEach((enemy, enemyIndex) => {
          if (
            bullet.x < enemy.x + enemy.width &&
            bullet.x + bullet.width > enemy.x &&
            bullet.y < enemy.y + enemy.height &&
            bullet.y + bullet.height > enemy.y
          ) {
            bullets.splice(bulletIndex, 1);
            enemies.splice(enemyIndex, 1);
            score++;
            document.getElementById('score').textContent = score;
          }
        });
      });
    }

    function endGame() {
      gameRunning = false;
      document.getElementById('finalScore').textContent = score;
      document.getElementById('gameOver').style.display = 'block';
      clearInterval(enemyInterval);
    }

    function restartGame() {
      score = 0;
      document.getElementById('score').textContent = score;
      document.getElementById('gameOver').style.display = 'none';
      bullets.length = 0;
      enemies.length = 0;
      startGame();
    }

    window.addEventListener('keydown', (e) => {
      if (e.code === 'Space' && gameRunning) {
        bullets.push({
          x: player.x + player.width / 2 - 2.5,
          y: player.y,
          width: 5,
          height: 10,
          speed: 7,
        });
      }
    });

    canvas.addEventListener('mousemove', (e) => {
      const rect = canvas.getBoundingClientRect();
      player.x = e.clientX - rect.left - player.width / 2;
    });

    let enemyInterval;

    function gameLoop() {
      if (!gameRunning) return;
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      drawPlayer();
      drawBullets();
      drawEnemies();
      detectCollisions();
      requestAnimationFrame(gameLoop);
    }

    function startGame() {
      menu.style.display = 'none';
      gameRunning = true;
      enemyInterval = setInterval(createEnemy, 1000);
      gameLoop();
    }
  </script>
</body>
</html>


