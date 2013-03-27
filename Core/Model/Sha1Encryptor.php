<?php

namespace Core\Model;


class Sha1Encryptor implements Encryptor
{

    protected $salt;

    public function __construct($salt)
    {
        $this->salt = $salt;
    }

    public function hash($data)
    {
        return sha1(sha1($this->salt) . $data);
    }

}