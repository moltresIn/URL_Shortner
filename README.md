# PHP URL Shortener

This is a simple URL shortener written in PHP. It does not require a database, as the original URL is encoded directly into the shortened URL itself. This project is ideal for lightweight applications where you want to quickly create and share shortened URLs without the overhead of database management.

## Features

- **No Database Required**: URLs are encoded within the URL itself, eliminating the need for database storage.
- **Simple Encoding/Decoding**: Uses Base64 encoding to shorten URLs.
- **Automatic Redirection**: Automatically redirects users to the original URL when they visit the shortened link.

## How It Works

1. **URL Encoding**: The original URL is Base64 encoded and made URL-safe by replacing certain characters.
2. **URL Decoding**: When a shortened URL is accessed, the script decodes the Base64 string to retrieve the original URL.
3. **Redirection**: The user is automatically redirected to the original URL.

## Installation

1. **Clone the Repository**:
    ```bash
    git clone https://github.com/yourusername/php-url-shortener.git
    cd php-url-shortener
    ```

2. **Deploy the Application**:
   - Upload the `index.php` file to your web server.
   - Ensure the server has PHP installed and configured.

3. **Access the Application**:
   - Open your web browser and navigate to the location where you deployed the application.
   - Enter a URL to shorten it.

## Usage

1. **Shorten a URL**:
   - Visit the web page where the application is hosted.
   - Enter the URL you wish to shorten in the form provided.
   - Submit the form to generate a shortened URL.

2. **Use the Shortened URL**:
   - Copy the shortened URL provided by the application.
   - Share it with others or use it in your web applications.

3. **Automatic Redirection**:
   - When someone visits the shortened URL, they will be automatically redirected to the original URL.

## Example

1. **Shorten a URL**:
   - Original URL: `https://www.example.com/some/long/path`
   - Shortened URL: `http://yourdomain.com/abc123`

2. **Access the Shortened URL**:
   - When a user visits `http://yourdomain.com/abc123`, they will be redirected to `https://www.example.com/some/long/path`.

## Requirements

- PHP 5.4 or higher
- A web server with PHP support (e.g., Apache, Nginx)

## License

This project is open-source and available under the MIT License. Feel free to use, modify, and distribute it as you see fit.

---

Enjoy your lightweight and database-free URL shortening service!
