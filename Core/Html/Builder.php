<?php

namespace Core\Html;

interface Builder
{
    public function contentType();

    public function docType();

    public function simpleElement($tag, $attributes = null);

    public function complexElement($tag, $attributes = null, $content = null);
}