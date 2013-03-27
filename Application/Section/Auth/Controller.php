<?php

namespace Application\Section\Auth;


use Application\Container;
use Application\Helper\View\Redirect;
use Core\Controller\BasicValidator;
use Core\Controller\InputException;
use Core\Controller\MethodException;
use Core\Controller\Validator;
use Core\IO\IOException;
use Core\IO\ParserException;

class Controller implements \Core\Controller\Controller
{
    protected $model;
    protected $validator;

    public function __construct(Container $application)
    {
        $this->model = new Model($application);
        $this->validator = new BasicValidator();
    }

    public function login()
    {
        try {
            $this->validator->method('post');
            $this->model->login($this->validator->input('password', 'string'));
            $this->redirect('/profile.php');
        } catch (MethodException $e) {
            $this->loginForm();
        } catch (InputException $e) {
            $this->loginForm('Hibás jelszó formátum.');
        } catch (LoginException $e) {
            $this->loginForm('Nem sikerült bejelentkezni a jelszóval, próbálja újra.');
        } catch (IOException $e) {
            $this->loginForm('Nem sikerült kapcsolatot létesíteni az adatbázissal, dolgozunk a kapcsolat helyreállításán.');
        } catch (ParserException $e) {
            $this->loginForm('Sajnos tönkrement az adatbázisunk, dolgozunk a helyreállításán.');
        }
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

    protected function authModel()
    {
        $model = new Model($this->application);
        return $model;
    }

    protected function redirect($url)
    {
        $redirect = new Redirect(array('url' => $url));
        $redirect->render();
    }

}