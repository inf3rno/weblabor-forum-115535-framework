<?php

namespace Application\Helper\View;


use Core\Html\Html4Builder;
use Core\View\AbstractSkeleton;

class Form extends AbstractSkeleton
{
    public function render()
    {
        $el = new Html4Builder();
        $html = $el->form(
            array('action' => $this->params['action'], 'method' => 'post', 'enctype' => 'application/x-www-form-urlencoded; charset=utf-8'),
            $el->table(
                $el->thead(
                    $el->tr(
                        $el->td($this->params['header'])
                    )
                ),
                $el->tbody(
                    $el->tr(
                        $el->td(
                            $el->label(array('for' => 'password'), 'Jelszó')
                        ),
                        $el->td(
                            $el->input(array('type' => 'password', 'name' => 'password', 'value' => ''))
                        )
                    ),
                    $el->tr(
                        $el->td(
                            array('colspan' => 2),
                            $el->button($this->params['description'])
                        )
                    )
                )
            )
        );
        if (isset($this->params['message']))
            $html .= $this->params['message'];
        return $html;
    }
}