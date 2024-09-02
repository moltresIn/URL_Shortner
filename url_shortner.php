<?php

// Function to create a hash of the URL
function createShortCode($url)
{
    return substr(md5($url), 0, 6); // Use MD5 hash and take the first 6 characters
}

// Function to encode the URL into a shorter form
function encodeURL($url)
{
    return createShortCode($url);
}

// Function to decode the URL (in this case, we're assuming a simple hash-based system where decoding isn't possible)
function decodeURL($code)
{
    global $urls;
    return $urls[$code] ?? null;
}

// In-memory URL storage (For demonstration purposes, not persistent)
$urls = [];

// Check if a URL has been submitted for shortening
if (isset($_POST['url']) && filter_var($_POST['url'], FILTER_VALIDATE_URL)) {
    $originalURL = $_POST['url'];
    $shortCode = encodeURL($originalURL);
    $urls[$shortCode] = $originalURL;
    $shortenedURL = 'http://' . $_SERVER['HTTP_HOST'] . '/' . $shortCode;
    echo "<div class='alert alert-success mt-4' id='shortenResult'>
            Shortened URL: <a href='$shortenedURL' target='_blank' class='iron-url'>$shortenedURL</a>
          </div>";
    echo "<script>document.getElementById('shortenResult').classList.add('glow');</script>";
    exit();
}

// Check if the request is for a shortened URL
if (isset($_SERVER['PATH_INFO'])) {
    $code = ltrim($_SERVER['PATH_INFO'], '/');
    $originalURL = decodeURL($code);

    // Redirect to the original URL if found
    if ($originalURL) {
        header("Location: $originalURL");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Invalid URL!</div>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iron Man Themed URL Shortener</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a1a;
            color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #2a2a2a;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.5);
            text-align: center;
        }

        h1 {
            color: #d4af37;
            font-size: 32px;
            margin-bottom: 20px;
        }

        .form-control {
            background-color: #333;
            color: #fff;
            border: none;
            box-shadow: inset 0 0 5px rgba(255, 0, 0, 0.5);
        }

        .btn-iron {
            background-color: #d4af37;
            color: #1a1a1a;
            border: none;
            padding: 10px 30px;
            border-radius: 50px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-iron:hover {
            background-color: #b8860b;
            transform: scale(1.05);
        }

        .alert-success {
            background-color: #d4af37;
            color: #1a1a1a;
            border: none;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 1s ease-in-out, transform 0.5s ease-in-out;
        }

        .alert-danger {
            background-color: #ff0000;
            color: #fff;
            border: none;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
        }

        .glow {
            opacity: 1;
            transform: translateY(-20px);
            box-shadow: 0 0 20px #ff0000, 0 0 30px #ff0000;
        }

        .iron-url {
            color: #ff0000;
            font-weight: bold;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .iron-url:hover {
            color: #d4af37;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Iron Man URL Shortener</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="url">Enter URL to shorten:</label>
                <input type="url" name="url" id="url" class="form-control" placeholder="https://example.com" required>
            </div>
            <button type="submit" class="btn btn-iron">Shorten URL</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>