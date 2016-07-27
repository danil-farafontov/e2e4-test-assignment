<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link type="text/css" rel="stylesheet"
              href="<?php echo ROOT_URL . 'styles/global.css';?>"/>
        <link type="text/css" rel="stylesheet"
              href="<?php echo ROOT_URL . 'styles/message_page.css';?>"/>
        <script src="<?php echo ROOT_URL . 'scripts/whole_page.js';?>"></script>
    </head>
    
    <body>

        <div class="whole_page">
            
            <div id="header_section">
                <?php include (ROOT_DIR . "templates/elements/header.php");?>
            </div>

            
            <div id="main_section">
                    <?php echo $main_content; ?>
            </div>
            
            <div id="sidebar">
                <?php include (ROOT_DIR . "templates/elements/user_window.php")?>
                <?php include (ROOT_DIR . "templates/elements/edit_message.php")?>
                <?php include (ROOT_DIR . "templates/elements/delete_message.php")?>
            </div>
            
        </div>
    </body>
</html>