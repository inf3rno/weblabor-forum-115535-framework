<?php

namespace Application\Section\User;

use Application\Helper\Model\AbstractModel;

class Model extends AbstractModel
{

    public function update($password)
    {
        $this->application->store($password);
    }
}