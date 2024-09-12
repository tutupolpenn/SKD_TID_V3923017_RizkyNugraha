<?php
// Fungsi cipher untuk enkripsi dan dekripsi
function cipher($char, $key) {
    if (ctype_alpha($char)) {
        $nilai = ord(ctype_upper($char) ? 'A' : 'a');
        $ch = ord($char);
        $mod = fmod($ch + $key - $nilai, 26);
        return chr($mod + $nilai);
    } else {
        return $char;
    }
}

// Fungsi enkripsi
function enkripsi($input, $key) {
    $output = "";
    $chars = str_split($input);
    foreach ($chars as $char) {
        $output .= cipher($char, $key);
    }
    return $output;
}

// Fungsi dekripsi
function dekripsi($input, $key) {
    return enkripsi($input, 26 - $key);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encryption & Decryption - RIZKYNUGR.</title>
    <style>
        /* General Styles */
        body {
            background-color: #222; /* Dark background */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Elegant font */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #eee; /* Light text */
        }

        /* Container */
        .container {
            background-color: #333; /* Slightly lighter container */
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); /* Deeper shadow */
            text-align: center;
            width: 100%;
            max-width: 450px; /* Slightly wider */
        }

        /* Header */
        h1 {
            color: #ffd700; /* Gold color */
            font-size: 2.2em;
            margin-bottom: 25px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Subtle text shadow */
        }

        /* Input Fields */
        input[type="text"], input[type="number"], textarea {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ffd700; /* Gold border */
            border-radius: 10px;
            font-size: 1em;
            background-color: #444; /* Darker input background */
            color: #ffd700; /* Gold text */
        }

        /* Textarea */
        textarea {
            height: 120px;
            resize: vertical;
        }

        /* Buttons */
        .btn {
            background-color: #ffd700; /* Gold background */
            color: #222; /* Dark text */
            border: none;
            padding: 12px 24px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 10px;
            margin: 12px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Subtle text shadow */
        }

        .btn:hover {
            background-color: #ffcc00; /* Slightly lighter gold on hover */
        }

        /* Footer */
        .footer {
            margin-top: 30px;
            font-size: 0.95em;
            color: #aaa;
        }

        .footer span {
            color: #ffd700;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Enkripsi & Dekripsi</h1>
        <form action="" method="post">
            <input type="text" name="plain" placeholder="Enter your message" required />
            <input type="number" name="key" placeholder="Enter key (0-25)" required />
            <br />
            <button type="submit" name="enkripsi" class="btn">Enkripsi</button>
            <button type="submit" name="dekripsi" class="btn">Dekripsi</button>
            <br />
            <textarea readonly placeholder="Result">
                <?php
                if (isset($_POST["enkripsi"])) {
                    echo enkripsi($_POST["plain"], $_POST["key"]);
                } else if (isset($_POST["dekripsi"])) {
                    echo dekripsi($_POST["plain"], $_POST["key"]);
                }
                ?>
            </textarea>
        </form>
        <div class="footer">
            cek <span>khodam</span> menyusul
        </div>
    </div>
</body>
</html>