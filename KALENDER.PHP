<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender Jawa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #29b653;
            font-weight: bold;
        }
        td {
            cursor: pointer;
        }
        td:hover {
            background-color: #29b653;
        }
        .selected {
            background-color: #ffeeba;
        }
        input[type="date"] {
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border: 1px solid #29b653;
            border-radius: 4px;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #5c51c2;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kalender Jawa</h1>
        <p>Masukkan tanggal untuk melihat kalender Jawa:</p>
        <input type="date" id="dateInput" />
        <div class="result" id="result">
            Pilih tanggal untuk melihat hasil.
        </div>
        <table id="calendar">
            <thead>
                <tr>
                    <th>Minggu</th>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jumat</th>
                    <th>Sabtu</th>
                </tr>
            </thead>
            <tbody id="calendarBody">
                <!-- Calendar dates will be generated here -->
            </tbody>
        </table>
    </div>

    <script>
        const WETON = ["Legi", "Pahing", "Pon", "Wage", "Kliwon"];
        const PASARAN_OFFSET = 4; // Offset pasaran Jawa mulai dari 1 Januari 1900
        
        function getWeton(date) {
            const startDate = new Date("1900-01-03");
            const daysSinceStart = Math.floor((date - startDate) / (1000 * 60 * 60 * 24));
            return WETON[(daysSinceStart + PASARAN_OFFSET) % 5];
        }

        function generateCalendar(year, month) {
            const calendarBody = document.getElementById("calendarBody");
            calendarBody.innerHTML = "";

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            let date = 1;
            for (let i = 0; i < 6; i++) {
                const row = document.createElement("tr");

                for (let j = 0; j < 7; j++) {
                    const cell = document.createElement("td");
                    if (i === 0 && j < firstDay) {
                        cell.innerHTML = "";
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        const currentDate = new Date(year, month, date);
                        cell.textContent = date;
                        cell.dataset.date = currentDate.toISOString().split("T")[0];
                        cell.addEventListener("click", function () {
                            document.querySelectorAll(".selected").forEach(el => el.classList.remove("selected"));
                            this.classList.add("selected");
                            const weton = getWeton(currentDate);
                            document.getElementById("result").innerHTML = `
                                <p><strong>Tanggal Masehi:</strong> ${currentDate.toLocaleDateString("id-ID", { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}</p>
                                <p><strong>Pasaran Jawa:</strong> ${weton}</p>
                            `;
                        });
                        date++;
                    }
                    row.appendChild(cell);
                }

                calendarBody.appendChild(row);

                if (date > daysInMonth) {
                    break;
                }
            }
        }

        document.getElementById("dateInput").addEventListener("change", function () {
            const inputDate = new Date(this.value);
            if (isNaN(inputDate)) {
                document.getElementById("result").innerText = "Tanggal tidak valid.";
                return;
            }

            const weton = getWeton(inputDate);
            document.getElementById("result").innerHTML = `
                <p><strong>Tanggal Masehi:</strong> ${inputDate.toLocaleDateString("id-ID", { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}</p>
                <p><strong>Pasaran Jawa:</strong> ${weton}</p>
            `;
            generateCalendar(inputDate.getFullYear(), inputDate.getMonth());
        });

        const today = new Date();
        generateCalendar(today.getFullYear(), today.getMonth());
    </script>
</body>
</html>
