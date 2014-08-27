<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/css/admin.css">
        <title>Admin</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="content">
                <!-- Here is where we include a subtemplate -->
                <?php include($this->pixie->assets_dirs[$this->namespace] . 'views/' . $subview . '.php');?>
            </div>
            <div id="footer"></div>
        </div>
        <script src="/js/jquery2.1.1.js"></script>
    </body>
</html>