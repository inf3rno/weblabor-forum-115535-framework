<?php

namespace Application\Section\Auth;


class Controller implements \Core\Controller\Controller
{
    public function login()
    {
        $this->loginForm();
    }

    public function logout()
    {

    }

    protected function loginForm($message = null)
    {
        $form = new LoginForm(array(
            'message' => $message
        ));
        $form->render();
    }
}