<html>
    <head>
        <link href="public/css/default.css" rel="stylesheet" type="text/css"/>
        <script type ="text/javascript" src="<?php echo APPLICATION_PATH; ?>public/js/jquery.js"></script>            
        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                
                // construct absolute path to js resource
                $js = APPLICATION_PATH . VIEW_PATH . $js;
                echo "<script type ='text/javascript' src='" . $js . "'></script>";
            }
        }
        ?>
    </head>
    <body>
        <h2>Dashboard logged in only .... </h2>
        <?php if (Session::get('loggedIn') == true): ?>
            <a href="<?php echo APPLICATION_PATH; ?>dashboard/logout">Logout</a>
        <?php else: ?>
            <a href="<?php echo APPLICATION_PATH; ?>index">Login</a>
        <?php endif; ?>
        <form id ="randomInsert" action="<?php echo APPLICATION_PATH; ?>dashboard/xhrInsert" method ="POST">
            <label>Name:</label>
            <input type="text" name="text" value="" /><br>
            <input type="submit" value="Submit" name="submit" />
        </form>
        <br>
        <div id="listInserts">
            
        </div>
    </body>
</html>
