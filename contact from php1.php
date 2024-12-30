<!DOCTYPE html>
<html>
<head>
    <title>Kontak Kami</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">
    <link rel="apple-touch-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #080d1b;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 69%;
            margin: 60px auto;
            height: 500px;
            padding: 17px;
            border-radius: 5px;
            background-color: #2a2a2a;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #eee;
            text-transform: uppercase;
        }

        .container label {
            display: block;
            margin-bottom: 5px;
            color: #eee;
            font-size: 14px;
            font-weight: bold;
        }

        .container input[type="text"],
        .container input[type="email"],
        .container textarea {
            width: 100%;
            padding: 18px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            color: black;
            background-color: #f7f7f7;
        }

        .container textarea {
            height: 100px;
        }

        .container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            font-size: 14px;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hubungi Kami</h2>
        <form>
            <label for="name">Username Akun:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Pesan:</label>
            <textarea id="message" name="message" required></textarea>
            <br><br><br><br>
            <button type="button" onclick="sendWhatsAppMessage()">Kirim Pesan</button>
        </form>
    </div>

    <script>
        function sendWhatsAppMessage() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var message = document.getElementById('message').value;

            // Format pesan dengan parameter yang sesuai
            var formattedMessage = encodeURIComponent("Username Akun: " + name + "%0AEmail: " + email + "%0APesan: " + message);

            // URL WhatsApp dengan pesan yang sudah terisi
            var whatsappUrl = "https://wa.me/085811111237?text=" + formattedMessage;

            // Buka link WhatsApp di tab baru
            window.open(whatsappUrl);
        }
    </script>
</body>
</html>
