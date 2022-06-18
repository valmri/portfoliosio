<?php

namespace exception;

class AcquisInvalide extends \Exception
{

    public function __construct(string $message)
    {
        parent::__construct($message);
    }

}