<?php

namespace Core\Model;

interface Encryptor
{

    public function hash($data);
}