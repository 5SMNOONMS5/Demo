<?php

namespace StephenChen\Demo;

class Demo
{
    private $show;

    public function __construct(Show $show)
    {
        $this->show = $show;
    }

    function echoDemo()
    {
        $value = $this->show->echoShow();
        return "demo_{$value}";
    }
}
