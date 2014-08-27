<?php

namespace Overblijfplaats\Blog\Model;

class Blog extends \Overblijfplaats\PhpixieDbal\Model
{
    public $table = 'blog';

    public function test()
    {
        $result = $this->fetchAll(
            'SELECT * FROM ' . $this->table
        );

        return $result;
    }
}