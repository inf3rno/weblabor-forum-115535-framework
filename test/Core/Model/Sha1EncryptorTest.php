<?php

class Sha1EncryptorTest extends PHPUnit_Framework_TestCase
{
    public function testSameHashBySameString()
    {
        $this->assertHashEquals('teszt', 'teszt');
    }

    public function testDifferentHashByDifferentString()
    {
        $this->assertHashNotEquals('teszt', 'teszt2');
    }

    protected function assertHashEquals($s1, $s2)
    {
        $this->assertEquals($this->hash($s1), $this->hash($s2));
    }

    protected function assertHashNotEquals($s1, $s2)
    {
        $this->assertNotEquals($this->hash($s1), $this->hash($s2));
    }

    protected function hash($s)
    {
        $encryptor = new \Core\Model\Sha1Encryptor('salt');
        return $encryptor->hash($s);
    }
}