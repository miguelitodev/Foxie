<?php

# ATENÇÃO MIGUEL <--------------------

# Em vez de mudar o login, mude GABRIEL para MIGUEL.
define("PC", "GABRIEL");

# DB conf
if (PC == 'GABRIEL') {
    define('DB_USER', 'tux');
    define('DB_PASS', '@MySQL2001');
} else {
    define('DB_USER', 'root');
    define('DB_PASS', '');
}

define('DB_NAME', 'db_etec');
define('DB_SGDB', 'mysql');
define('DB_HOST', 'localhost');
