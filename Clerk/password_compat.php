<?php
if (!function_exists('password_hash')) {
    /**
     * @param string $password
     * @param int $algo
     * @param array $options
     * @return string|false
     */
    function password_hash($password, $algo, array $options = array()) {
        if (!function_exists('crypt')) {
            trigger_error("Crypt must be loaded for password_hash to function", E_USER_WARNING);
            return null;
        }
        if (!is_string($password)) {
            trigger_error("password_hash(): Password must be a string", E_USER_WARNING);
            return null;
        }
        if (!is_int($algo)) {
            trigger_error("password_hash() expects parameter 2 to be long, " . gettype($algo) . " given", E_USER_WARNING);
            return null;
        }
        switch ($algo) {
            case PASSWORD_BCRYPT:
                // Note that this is a C constant, but not exposed to PHP
                $cost = 10;
                if (isset($options['cost'])) {
                    $cost = $options['cost'];
                    if ($cost < 4 || $cost > 31) {
                        trigger_error(sprintf("password_hash(): Invalid bcrypt cost parameter specified: %d", $cost), E_USER_WARNING);
                        return null;
                    }
                }
                // The length of salt to generate
                $raw_salt_len = 16;
                // The length required in the final serialization
                $required_salt_len = 22;
                $hash_format = sprintf("$2y$%02d$", $cost);
                break;
            default:
                trigger_error(sprintf("password_hash(): Unknown password hashing algorithm: %s", $algo), E_USER_WARNING);
                return null;
        }
        $salt_req_encoding = false;
        if (isset($options['salt'])) {
            switch (gettype($options['salt'])) {
                case 'NULL':
                    break;
                case 'boolean':
                    break;
                case 'integer':
                    $salt_len = $options['salt'];
                    if ($salt_len < 16) {
                        trigger_error(sprintf("password_hash(): Invalid salt length parameter specified: %d", $salt_len), E_USER_WARNING);
                        return null;
                    }
                    break;
                case 'string':
                    $salt = $options['salt'];
                    if (strlen($salt) < $required_salt_len) {
                        trigger_error(sprintf("password_hash(): Provided salt is too short: %d expecting %d", strlen($salt), $required_salt_len), E_USER_WARNING);
                        return null;
                    } elseif (0 !== strpos($salt, $hash_format)) {
                        $salt_req_encoding = true;
                        $salt_len = strlen($salt);
                        if ($salt_len < $required_salt_len) {
                            trigger_error(sprintf("password_hash(): Provided salt is too short: %d expecting %d", strlen($salt), $required_salt_len), E_USER_WARNING);
                            return null;
                        }
                    } else {
                        $salt_len = 0;
                    }
                    break;
                default:
                    trigger_error("password_hash(): Non-string salt parameter supplied", E_USER_WARNING);
                    return null;
            }
        } else {
            $salt_len = 0;
        }
        if ($salt_len == 0 || $salt_req_encoding) {
            $buffer = '';
            $buffer_valid = false;
            if (function_exists('mcrypt_create_iv') && !defined('PHALANGER')) {
                $buffer = mcrypt_create_iv($raw_salt_len, MCRYPT_DEV_URANDOM);
                if ($buffer) {
                    $buffer_valid = true;
                }
            }
            if (!$buffer_valid && function_exists('openssl_random_pseudo_bytes')) {
                $strong = false;
                $buffer = openssl_random_pseudo_bytes($raw_salt_len, $strong);
                if ($buffer && $strong) {
                    $buffer_valid = true;
                }
            }
            if (!$buffer_valid && @is_readable('/dev/urandom')) {
                $file = fopen('/dev/urandom', 'r');
                $read = 0;
                $local_buffer = '';
                while ($read < $raw_salt_len) {
                    $local_buffer .= fread($file, $raw_salt_len - $read);
                    $read = strlen($local_buffer);
                }
                fclose($file);
                if ($read >= $raw_salt_len) {
                    $buffer_valid = true;
                    $buffer = str_pad($local_buffer, $raw_salt_len, "\0");
                }
            }
            if (!$buffer_valid || strlen($buffer) < $raw_salt_len) {
                $bl = strlen($buffer);
                for ($i = 0; $i < $raw_salt_len; $i++) {
                    if ($i < $bl) {
                        $buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
                    } else {
                        $buffer .= chr(mt_rand(0, 255));
                    }
                }
            }
            $salt = $buffer;
            $salt_len = strlen($salt);
        }
        if ($salt_req_encoding) {
            // encode string with the Base64 variant used by crypt
            $base64_digits =
                'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
            $bcrypt64 =
                './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $base64_string = base64_encode($salt);
            $maxlen = strlen($base64_string);
            $actual_salt = '';
            for ($i = 0; $i < $maxlen; $i++) {
                $actual_salt .= $bcrypt64[strpos($base64_digits, $base64_string[$i])];
            }
            $salt = $actual_salt;
        }
        $salt = substr_replace(
            str_pad($salt, $required_salt_len, "\0"),
            $hash_format,
            0,
            strlen($hash_format)
        );
        $hash = crypt($password, $salt);
        if (!is_string($hash) || strlen($hash) <= 13) {
            return false;
        }
        return $hash;
    }

    /**
     * @param string $password
     * @param string $hash
     * @return bool
     */
    function password_verify($password, $hash) {
        if (!function_exists('crypt')) {
            trigger_error("Crypt must be loaded for password_verify to function", E_USER_WARNING);
            return false;
        }
        $ret = crypt($password, $hash);
        if (!is_string($ret) || strlen($ret) != strlen($hash) || strlen($ret) <= 13) {
            return false;
        }
        $status = 0;
        for ($i = 0; $i < strlen($ret); $i++) {
            $status |= (ord($ret[$i]) ^ ord($hash[$i]));
        }
        return $status === 0;
    }
}
