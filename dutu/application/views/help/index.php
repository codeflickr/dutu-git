<html>
    <head>
    </head>
    <body>
        <h1>This the help page</h1>
        <ul>
            <li><a href="<?php echo APPLICATION_PATH; ?>">Index</a></li>
            <li><a href="<?php echo APPLICATION_PATH; ?>login">Login</a></li>
            <li><a href="<?php echo APPLICATION_PATH; ?>error">Error</a></li>
            <?php
            echo $this->form;
            ?>
        </ul>
    </body>
</html>
