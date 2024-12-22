<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top-up Game Otomatis</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h1>Top-up Game Otomatis</h1>

<form action="process_topup.php" method="POST">
    <label for="game_id">Game ID:</label>
    <input type="text" id="game_id" name="game_id" required><br>

    <label for="amount">Jumlah Top-up:</label>
    <input type="number" id="amount" name="amount" required><br>

    <label for="phone">Nomor Telepon:</label>
    <input type="text" id="phone" name="phone" required><br>

    <input type="submit" value="Top-up">
</form>

</body>
</html>
