<?php

namespace Overblijfplaats\Blog;

class Page extends \PHPixie\Controller {

    protected $view;

    public function before()
    {
        // CUSTOMIZE BY @ERIC
        $namespaceLabel = $this->getNamespaceLabel();

        // custom
        $this->pixie->assets_dirs[$namespaceLabel] = dirname(dirname(dirname(dirname(__FILE__)))) . '/assets/';


        // CUSTOMIZE BY @ERIC auto find a subview within controller as folder and action as file name.
        $controller = $this->request->param('controller');
        $action     = $this->request->param('action');

        // CUSTOMIZE BY @ERIC templates folder load main template.
        if ($namespaceLabel === 'admin') {
            $this->view = $this->pixie->view('Templates/admin');
        } else {
            $this->view = $this->pixie->view('Templates/main');
        }

        // CUSTOMIZE BY @ERIC templates folder load main template.
        $this->view = $this->pixie->view('Templates/' . $namespaceLabel);
        $this->view->namespace = $namespaceLabel;

        $this->view->subview = ucfirst($controller) . '/' . $action;
    }

    protected function getNamespaceLabel()
    {
        $namespace = strtolower(
            stripslashes(
                str_replace('Overblijfplaats', '', $this->request->route->defaults['namespace'])
            )
        );

        return $namespace;
    }

    public function after()
    {
        $this->response->body = $this->view->render();
    }
}
