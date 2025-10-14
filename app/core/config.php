<?php

    date_default_timezone_set('Asia/Manila');

    /* SERVER INFORMATION  */
    define('SVR', 'localhost');
    define('USR', 'root');
    define('PWD', 'root');
    define('DBS', 't2est');


    /* FILE PATH */
    


    


    /* LGU_DAET CAMARINES NORTE*/
    define('TITLE', 'LGU-DAET | CAMARINES NORTE');
    define('', '');



    /* DEVELOPER SETUP */
    define('DEBUG_MODE', TRUE);

    session_set_cookie_params([
    'httponly' => true,
    'secure'   => true,
    'samesite' => 'Lax',
    ]);

    session_start();
    

    

    


?>