<?php
$shared_secret = "obhs123";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo "Method not allowed.";
    exit;
}

$provided_secret = $_POST['secret'] ?? '';
$email = $_POST['email'] ?? '';

if ($provided_secret !== $shared_secret) {
    http_response_code(403);
    echo "Forbidden";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "Invalid email format.";
    exit;
}

$entry = "{$email}   Cleartext-Password := "*"
";
$file = "/etc/freeradius/3.0/mods-config/files/authorize";

file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);

// Reload FreeRADIUS
exec("service freeradius reload");

echo "User added.";
?>
