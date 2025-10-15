<?php

    date_default_timezone_set('Asia/Manila');

    /* SERVER INFORMATION  */
    define('SVR', 'localhost');
    define('USR', 'root');
    define('PWD', 'root');
    define('DBS', 'test');


    /* FILE PATH */
    // Detect protocol and build a BASE_URL for assets and links
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443);
    $proto = $isHttps ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';

    // Try to reliably find the application root folder (the folder that contains index.php)
    $docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? realpath($_SERVER['DOCUMENT_ROOT']) : false;
    $scriptFile = isset($_SERVER['SCRIPT_FILENAME']) ? realpath($_SERVER['SCRIPT_FILENAME']) : false;
    $appRoot = false;
    if ($docRoot && $scriptFile) {
        $dir = dirname($scriptFile);
        $maxIterations = 20; // safety
        $i = 0;
        while ($dir && $i < $maxIterations) {
            if (file_exists($dir . DIRECTORY_SEPARATOR . 'index.php')) {
                // ensure the directory is inside the document root
                $realDir = realpath($dir);
                if ($realDir !== false && strpos($realDir, $docRoot) === 0) {
                    $appRoot = $realDir;
                    break;
                }
            }
            $parent = dirname($dir);
            if ($parent === $dir) break;
            $dir = $parent;
            $i++;
        }
    }

    if ($appRoot) {
        // Convert filesystem path to URL path relative to document root
        $basePath = str_replace('\\', '/', substr($appRoot, strlen($docRoot)));
        $basePath = '/' . trim($basePath, '/');
        if ($basePath === '/') $basePath = '';
    } else {
        // Fallback: use script dirname (works if index.php is the front controller)
        $fallback = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '\/');
        if ($fallback === '' || $fallback === '.') $fallback = '';
        $basePath = $fallback;
    }

    define('BASE_URL', rtrim($proto . '://' . $host . $basePath, '/'));
    define('ASSET_URL', BASE_URL . '/assets');
    


    /* LGU_DAET CAMARINES NORTE*/
    define('TITLE', 'LGU-DAET | CAMARINES NORTE');
    define('', '');



    /* DEVELOPER SETUP */
    define('DEBUG_MODE', TRUE);

    
    // Use secure cookies only when running under HTTPS
    $secureFlag = $isHttps;
    session_set_cookie_params([
        'httponly' => true,
        'secure'   => $secureFlag,
        'samesite' => 'Lax',
    ]);

    session_start();
    

    

    


?>