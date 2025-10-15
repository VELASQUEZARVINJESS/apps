<?php
// Debug helper — prints BASE_URL, ASSET_URL and server paths
require_once __DIR__ . '/app/core/config.php';
header('Content-Type: text/plain; charset=utf-8');

echo "BASE_URL: " . (defined('BASE_URL') ? BASE_URL : '<not-defined>') . "\n";
echo "ASSET_URL: " . (defined('ASSET_URL') ? ASSET_URL : '<not-defined>') . "\n";

echo "\n-- Server vars --\n";
echo "DOCUMENT_ROOT: " . ($_SERVER['DOCUMENT_ROOT'] ?? '<none>') . "\n";
echo "SCRIPT_NAME: " . ($_SERVER['SCRIPT_NAME'] ?? '<none>') . "\n";
echo "SCRIPT_FILENAME: " . ($_SERVER['SCRIPT_FILENAME'] ?? '<none>') . "\n";
echo "HTTP_HOST: " . ($_SERVER['HTTP_HOST'] ?? '<none>') . "\n";
echo "HTTPS: " . ($_SERVER['HTTPS'] ?? '<none>') . "\n";

// Filesystem checks
$assetFs = realpath(__DIR__ . '/assets');
if ($assetFs) {
    echo "\nAssets folder exists at filesystem path: " . $assetFs . "\n";
    $testCss = $assetFs . DIRECTORY_SEPARATOR . 'dist' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'adminlte.min.css';
    echo "adminlte.min.css exists: " . (file_exists($testCss) ? 'yes' : 'no') . "\n";
} else {
    echo "\nAssets folder not found at expected location: " . __DIR__ . '/assets' . "\n";
}

echo "\n-- End debug --\n";
