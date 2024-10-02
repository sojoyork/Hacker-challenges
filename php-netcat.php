<?php
$host = '127.0.0.1';
$port = 12345;

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if (!$sock) {
    die("Could not create socket: " . socket_strerror(socket_last_error()) . "\n");
}

if (!socket_bind($sock, $host, $port)) {
    die("Could not bind to socket: " . socket_strerror(socket_last_error()) . "\n");
}

if (!socket_listen($sock, 5)) {
    die("Could not set up socket listener: " . socket_strerror(socket_last_error()) . "\n");
}

echo "Server started on $host:$port\n";

do {
    $client = socket_accept($sock);
    if ($client === false) {
        echo "Could not accept incoming connection: " . socket_strerror(socket_last_error()) . "\n";
        continue;
    }

    echo "Client connected\n";

    $output = "  _________                      __ __________.__              \n";
    $output .= " /   _____/_  _  __ ____   _____/  |\\______   \\__| ____  ____  \n";
    $output .= " \\_____  \\\\ \\/ \\/ // __ \\_/ __ \\   __\\       _/  |/ ___\\/ __ \\ \n";
    $output .= " /        \\\\     /\\  ___/\\  ___/|  | |    |   \\  \\  \\__\\  ___/ \n";
    $output .= "/_______  / \\/\\_/  \\___  >\\___  >__| |____|_  /__|\\___  >___  >\n";
    $output .= "        \\/             \\/     \\/            \\/        \\/    \\/ \n";
    $output .= "\ncreds: admin, pass123\ncreds:\nand here is flag!\nflag{hacktoberfest2024}";

    if (socket_write($client, $output, strlen($output)) === false) {
        echo "Failed to write to client: " . socket_strerror(socket_last_error()) . "\n";
    } else {
        echo "Data sent to client\n";
    }

    socket_close($client);
    echo "Client disconnected\n";
} while (true);

socket_close($sock);
?>
