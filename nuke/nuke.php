<?php
// nuke.php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Simulate heavy resource usage
    for ($i = 0; $i < 1000000; $i++) {
        echo str_repeat("This is a nuke test. ", 100);
      // monitor.php
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
