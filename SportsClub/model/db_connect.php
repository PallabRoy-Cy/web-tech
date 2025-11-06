<?php
function env_value($key, $default = null) {
    static $env = null;
    if ($env === null) {
        $env = [];
        $envFile = __DIR__ . '/../.env';
        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                $line = trim($line);
                if ($line === '' || $line[0] === '#') { continue; }
                $parts = explode('=', $line, 2);
                if (count($parts) === 2) {
                    $k = trim($parts[0]);
                    $v = trim($parts[1]);
                    $v = trim($v, "\"' ");
                    $env[$k] = $v;
                }
            }
        }
    }
    if (array_key_exists($key, $env)) { return $env[$key]; }
    $val = getenv($key);
    return $val !== false ? $val : $default;
}

function db_conn()
{
    $servername = env_value('DB_HOST', 'localhost');
    $username   = env_value('DB_USER', 'root');
    $password   = env_value('DB_PASS', '');
    $dbname     = env_value('DB_NAME', 'student');

    try {
        $dsn = 'mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8mb4';
        $conn = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    } catch (PDOException $e) {
        http_response_code(500);
        die('Database connection error');
    }
    return $conn;
}
?>
