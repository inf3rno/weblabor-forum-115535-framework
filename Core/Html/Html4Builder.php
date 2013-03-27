<?php

namespace Core\Html;

class Html4Builder implements Builder
{
    protected $simpleElements = array('input', 'br');
    protected $docType = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">';
    protected $contentType = 'text/html';

    public function __call($element, array $params)
    {
        array_unshift($params, $element);
        $type = array_search($element, $this->simpleElements) ? 'simpleElement' : 'complexElement';
        return call_user_func_array(array($this, $type), $params);
    }

    public function contentType()
    {
        return $this->contentType;
    }

    public function docType()
    {
        return $this->docType;
    }

    public function simpleElement($tag, $attributes = null)
    {
        return '<' . $tag . (is_array($attributes) ? $this->attributes($attributes) : '') . '>';
    }

    public function complexElement($tag, $attributes = null, $content = null)
    {
        $params = func_get_args();
        array_shift($params);
        if (is_array($attributes))
            array_shift($params);
        return '<' . $tag . (is_array($attributes) ? $this->attributes($attributes) : '') . '>' . implode('', $params) . '</' . $tag . '>';
    }

    protected function attributes(array $attributes)
    {
        $html = '';
        foreach ($attributes as $attribute => $value)
            $html .= ' ' . $attribute . '="' . $value . '"';
        return $html;
    }

}