<?php

namespace Application\Section\User;


use Application\Container;
use Application\Helper\Controller\AbstractController;
use Application\PermissionException;
use Core\Controller\InputException;
use Core\Controller\MethodException;
use Core\IO\IOException;
use Core\IO\ParserException;

class Controller extends AbstractController
{
    protected $model;

    public function __construct(Container $application)
    {
        parent::__construct($application);
        $this->model = new Model($application);
    }

    public function profile()
    {
        try {
            $this->application->permission();
            $this->validator->method('post');
            $this->model->update($this->validator->input('password', 'string'));
            $this->updateForm('Sikeres jelszó csere.');
        } catch (MethodException $e) {
            $this->updateForm();
        } catch (InputException $e) {
            $this->updateForm('Hibás jelszó formátum.');
        } catch (IOException $e) {
            $this->updateForm('Nem sikerült kapcsolatot létesíteni az adatbázissal, dolgozunk a kapcsolat helyreállításán.');
        } catch (ParserException $e) {
            $this->updateForm('Nem sikerült titkosítani a jelszót, próbálja újra.');
        } catch (PermissionException $e) {
            $this->redirect('/');
        }
    }

    protected function updateForm($message = null)
    {
        $view = new UpdateForm(array('message' => $message));
        $view->render();
    }

}