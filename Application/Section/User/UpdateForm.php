<?php

namespace Application\Section\User;


use Application\Helper\View\Document;
use Application\Helper\View\Form;
use Core\Html\Html4Builder;
use Core\View\AbstractSkeleton;
use Core\View\MultiRenderer;

class UpdateForm extends AbstractSkeleton
{
    public function render()
    {
        $el = new Html4Builder();
        $page = new Document(array(
            'title' => 'Profil oldal',
            'content' => new MultiRenderer(array(
                $el->a(array('href' => '/logout.php'), 'kijelentkezés'),
                new Form(array(
                    'action' => '/profile.php',
                    'header' => 'Jelszó módosító űrlap',
                    'description' => 'Módosítás',
                    'message' => (isset($this->params['message']) ? $this->params['message'] : null)
                ))
            ))
        ));
        $page->render();
    }
}