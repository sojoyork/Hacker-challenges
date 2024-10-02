<?php
// nuke.php

// Check if the server is under heavy load and display the flag if it is
if (file_exists('nuke_trigger.txt')) {
    echo "|--------------------------------------|<br>";
    echo "| flag{nuclearb0mbHacktoberfest}       |<br>";
    echo "|--------------------------------------|<br>";
    unlink('nuke_trigger.txt'); // Remove the trigger to avoid repeat flags
    exit(); // Stop further execution
}

// Simulate heavy resource usage for the main page
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Check the server load
    $load = sys_getloadavg()[0]; // Get the average load for the last minute
    if ($load > 5) { // Adjust threshold as needed
        file_put_contents('nuke_trigger.txt', '1'); // Create trigger file
    }
    
    // Simulate heavy resource usage
    for ($i = 0; $i < 1000000; $i++) {
        echo str_repeat("This is a nuke test. ", 100);
    }
}

// Background monitoring script
$pid = pcntl_fork(); // Fork a new process
if ($pid == -1) {
    die("Could not fork process.");
} elseif ($pid) {
    // Parent process, can do other tasks if needed
    exit(); // Terminate the parent process
} else {
    // Child process for monitoring
    while (true) {
        $load = sys_getloadavg()[0]; // Get the average load for the last minute
        if ($load > 5) { // Adjust threshold as needed
            file_put_contents('nuke_trigger.txt', '1');
            break; // Exit after triggering the flag
        }
        sleep(5); // Check every 5 seconds
    }
}
?>
