<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Menu PERMAINAN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="KALENDER.PHP">Cari Weton Kalender Jawa</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Selamat Datang di MINI GAME</h1>
        <p class="text-center">Pilih salah satu opsi di bawah untuk melanjutkan.</p>

        <div class="row mt-4">
            <div class="col-md-4">
                <a href="register.php" class="btn btn-success btn-block">Home</a>
            </div>
            <div class="col-md-4">
                <a href="TESBERAT.PHP" class="btn btn-primary btn-block">Cek Berat Badan Ideal</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="game-image.jpg" class="card-img-top" alt="Game Tembak Rubik">
                    <div class="card-body">
                        <h5 class="card-title">Game Tembak Rubik</h5>
                        <p class="card-text">Ayo coba game seru tembak Rubik!</p>
                        <a href="TEMBAKBOLA.PHP" class="btn btn-primary">Mainkan Game</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <a href="KALENDER.PHP" class="btn btn-warning btn-block">Cari Weton Kalender Jawa</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
