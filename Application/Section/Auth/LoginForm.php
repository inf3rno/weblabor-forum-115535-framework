<?php

namespace Application\Section\Auth;


use Application\Helper\View\Document;
use Application\Helper\View\Form;
use Core\View\AbstractSkeleton;

class LoginForm extends AbstractSkeleton
{

    public function render()
    {
        $doc = new Document(array(
            'title' => 'Bejelentkezés',
            'content' => new Form(array(
                'action' => '/login.php',
                'header' => 'Azonosító űrlap',
                'description' => 'Bejelentkezés',
                'message' => (isset($this->params['message']) ? $this->params['message'] : null)
            ))
        ));
        $doc->render();
    }
}