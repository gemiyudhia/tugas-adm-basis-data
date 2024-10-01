<?php

use Config\Services;

function encryptUrl($id)
{
    return base64_encode(Services::encrypter()->encrypt($id));
}

function decryptUrl($encryptedId)
{
    return Services::encrypter()->decrypt(base64_decode($encryptedId));
}