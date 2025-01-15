<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Berat Badan Ideal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tes Berat Badan Ideal</h1>
        <label for="weight">Berat Badan (kg):</label>
        <input type="number" id="weight" placeholder="Masukkan berat badan" required>

        <label for="height">Tinggi Badan (cm):</label>
        <input type="number" id="height" placeholder="Masukkan tinggi badan" required>

        <button onclick="calculateIdealWeight()">Cek Berat Badan Ideal</button>

        <div class="result" id="result"></div>
    </div>

    <script>
        function calculateIdealWeight() {
            let weight = parseFloat(document.getElementById('weight').value);
            let height = parseFloat(document.getElementById('height').value);

            if (isNaN(weight) || isNaN(height)) {
                document.getElementById('result').innerText = "Mohon masukkan data yang valid.";
                return;
            }

            height = height / 100; // Konversi cm ke meter

            // Rumus BMI
            let bmi = weight / (height * height);

            let resultText = "";

            if (bmi < 18.5) {
                resultText = "Berat badan Anda kurang ideal (Kurus).";
            } else if (bmi >= 18.5 && bmi < 24.9) {
                resultText = "Berat badan Anda ideal.";
            } else if (bmi >= 25 && bmi < 29.9) {
                resultText = "Berat badan Anda berlebih (Gemuk).";
            } else {
                resultText = "Berat badan Anda sangat berlebih (Obesitas).";
            }

            document.getElementById('result').innerText = resultText;
        }
    </script>
</body>
</html>
