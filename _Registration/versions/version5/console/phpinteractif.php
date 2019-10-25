# HASHING PASSWORD
$ php -a
Interactive mode enabled

php > echo md5('123456');
e10adc3949ba59abbe56e057f20f883e
php >

# SALTED HASH (CRYPT)

$password = "secret";
$salt = random_bytes(16);
$password_hash = crypt($password, $salt);

# PASSWORD_HASH()

php > echo password_hash('123456', PASSWORD_DEFAULT);
$2y$10$IWf2AxG50UNcIu0zSBCFne3w1DgBlhyoPWTVIpl6D6sUFIZmcKoqa
php > echo password_hash('123456', PASSWORD_DEFAULT);
$2y$10$EAdGdX79Ht/g8lMmRMG9QecSB7sdKgqZDBJGxWvrCWWnPE41Dcfze
php >



