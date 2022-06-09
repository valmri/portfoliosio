<?php

namespace exception;

class PageInvalide extends \Exception
{

    public function __construct(string $message)
    {
        parent::__construct($message);
    }

}