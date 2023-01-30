<?php

class Encryption
{
    private $cipher;
    private $key;
    private $iv;
    /**
     * @param string $cipher The cipher algorithm to use. Default: AES-256-CBC
     * @param string $key The encryption key
     * @param string $iv The initialization vector
     */
    public function __construct(string $cipher = 'AES-256-CBC', string $key, string $iv)
    {
        $this->cipher = $cipher;
        $this->key = $key;
        $this->iv = $iv;
    }

    /**
     * Encrypts a plaintext string
     *
     * @param string $plaintext The plaintext to encrypt
     *
     * @return string The encrypted ciphertext
     */
    public function encrypt(string $plaintext): string
    {
        $ciphertext = openssl_encrypt(
            $plaintext,
            $this->cipher,
            $this->key,
            OPENSSL_RAW_DATA,
            $this->iv
        );
        return urlencode(base64_encode($ciphertext));
    }

    /**
     * Decrypts a ciphertext string
     *
     * @param string $ciphertext The ciphertext to decrypt
     *
     * @return string The decrypted plaintext
     */
    public function decrypt(string $ciphertext): string
    {
        $ciphertext = base64_decode(urldecode($ciphertext));
        return openssl_decrypt(
            $ciphertext,
            $this->cipher,
            $this->key,
            OPENSSL_RAW_DATA,
            $this->iv
        );
    }
}
