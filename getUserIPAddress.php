<?php
  
// Function to get the user's IP address
function getUserIPAddress() {
    // Check if the IP address is present in the forwarded headers
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? null;

    // If not present in headers, use the remote address
    if (!$ip) {
        $ip = $_SERVER['REMOTE_ADDR'] ?? null;
    }

    // If multiple IP addresses are present in headers, use the first one
    if (strpos($ip, ',') !== false) {
        $ips = explode(',', $ip);
        $ip = trim($ips[0]);
    }

    return $ip;
}

// Get the user's IP address and output it
$userIPAddress = getUserIPAddress();
echo $userIPAddress;

?>
