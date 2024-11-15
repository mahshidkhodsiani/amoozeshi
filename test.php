<?php
function generateReferralCode() {
    $prefix = 'rch'; // Static prefix

    // Generate random parts with letters and numbers
    $part1 = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 4);
    $part2 = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 4);

    // Combine all parts with hyphens
    $referralCode = $prefix . '-' . $part1 . '-' . $part2;

    return $referralCode;
}

// Usage
echo generateReferralCode();
