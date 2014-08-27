<?php

namespace Overblijfplaats;

class Blog
{

    /**
     * Pixie Dependency Container
     * @var \PHPixie\Pixie
     */
    public $pixie;

    public function __construct($pixie) {
        define('BASEPATH_' . strtoupper(basename(str_replace('.php', '', __FILE__))), dirname(dirname(__DIR__)));

        $this->pixie = $pixie;
    }

    public function loadModel($model)
    {
        $class = __CLASS__ . '\Model\\' . ucfirst($model);

        return new $class($this->pixie);
    }

    public function loadForm($formClass)
    {
        $class = __CLASS__ . '\Model\\' . ucfirst($formClass);

        return new $class($this->pixie);
    }

    public function loadTableView($tableViewClass)
    {
        $class = __CLASS__ . '\Model\\' . ucfirst($tableViewClass);

        return new $class($this->pixie);
    }
}
