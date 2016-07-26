<!DOCTYE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $title; ?></title>
        <link type="text/css" rel="stylesheet"
              href="<?php echo ROOT_URL . 'styles/global.css';?>"/>
        <link type="text/css" rel="stylesheet"
              href="<?php echo ROOT_URL . 'styles/message_page.css';?>"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="<?php echo ROOT_URL . 'scripts/script.js';?>"></script>
    </head>
    
    <body>

        <div class="whole_page">
            
            <div id="header_section">
                <?php include (ROOT_DIR . "templates/elements/header.php");?>
            </div>

            
            <div id="main_section">
                    <?php include (ROOT_DIR . "templates/elements/user_window.php")?>
                    <?php echo $main_content; ?>
            </div>
            
        </div>
    </body>
</html>