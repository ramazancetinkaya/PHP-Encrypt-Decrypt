# Encryption Decryption
An example of a class that encrypts and decrypts data using the OpenSSL library in PHP.

This class uses the OpenSSL library to perform encryption and decryption operations. The class takes three parameters in its constructor: the encryption algorithm to use, the encryption key and the initialization vector (IV). It has two methods **encrypt** and **decrypt**.

The **encrypt** method takes a plaintext string as a parameter and uses the **openssl_encrypt** function to encrypt it using the cipher, key and IV specified in the constructor. The encrypted data is then encoded using base64 and the encoded data is urlencoded before returning.

The **decrypt** method takes an encoded ciphertext string as a parameter, first it urldecodes the data and then decodes it using base64, it then uses the **openssl_decrypt** function to decrypt it using the cipher, key and IV specified in the constructor.

## Here's an example of how you might use this class:
```php
$key = 'your_secret_key';
$iv = 'your_secret_iv';
$encryption = new Encryption('AES-256-CBC', $key, $iv);
$ciphertext = $encryption->encrypt('secret message');
$plaintext = $encryption->decrypt($ciphertext);
```

This creates an instance of the class and encrypts the message "secret message" using AES-256-CBC algorithm, the key and IV provided.
