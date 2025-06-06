<?php
$expected_secret = 'obhs123';

if ($_GET['secret'] !== $expected_secret) {
    http_response_code(403);
    echo "Invalid secret";
    exit;
}

$email = $_GET['email'] ?? '';
if (!$email) {
    http_response_code(400);
    echo "Missing email";
    exit;
}

// Save email to a flat file (you could later extend this to Redis, SQLite, etc.)
file_put_contents(__DIR__ . "/authorized_emails.txt", strtolower(trim($email)) . "\n", FILE_APPEND);

echo "OK";
