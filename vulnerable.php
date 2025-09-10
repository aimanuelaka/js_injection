<?php
// Fichier PHP vulnérable étendu pour SAST

// 1️⃣ Injection SQL
if (isset($_GET['user'])) {
    $user = $_GET['user'];
    $query = "SELECT * FROM users WHERE username = '$user'";
    echo "Query: " . $query;
}

// 2️⃣ XSS
if (isset($_GET['name'])) {
    echo "Hello " . $_GET['name'];
}

// 3️⃣ Eval dangereux
if (isset($_GET['cmd'])) {
    eval($_GET['cmd']);
}

// 4️⃣ Faible mot de passe
$password = $_GET['password'] ?? '';
if ($password == '123456') {
    echo "Admin access granted!";
} else {
    echo "Access denied.";
}

// 5️⃣ File Inclusion vulnérable
if (isset($_GET['page'])) {
    include($_GET['page'] . ".php"); // Inclusion de fichier vulnérable
}

// 6️⃣ Command Injection via shell_exec
if (isset($_GET['ping'])) {
    $host = $_GET['ping'];
    echo shell_exec("ping -c 1 " . $host); // Command injection
}

// 7️⃣ Déserialization non sécurisée
if (isset($_GET['data'])) {
    $object = unserialize($_GET['data']); // vulnérable
    print_r($object);
}
?>
