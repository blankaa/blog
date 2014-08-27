<?php

namespace Overblijfplaats\Blog\Controller;

class fileloader extends \Overblijfplaats\Blog\Page
{
    public function action_img()
    {
        $file = BASEPATH_BLOG . '/web/' . $this->request->get('img');

        //DETERMINE TYPE
        $image = basename($file);
        $ext = array_pop(explode ('.', $file));
        $allowed['gif'] = 'image/gif';
        $allowed['png'] = 'image/png';
        $allowed['jpg'] = 'image/jpeg';
        $allowed['jpeg'] = 'image/jpeg';

        if(file_exists($file) && !empty($ext) && isset($allowed[strtolower($ext)])) {
            $type = $allowed[strToLower($ext)];
        } else {
            $file = $fallback;
            $type = 'image/gif';
        }

        header("Content-Type: {$type}");
        @readfile($file);
        exit();
    }
}
