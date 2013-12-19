<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <?php
        echo $this->Html->meta('icon');

                echo $this->Html->css(array(
'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css',
'bootstrap.min'
                                           )
                                     );
                echo $this->Html->script(array(
'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',
'jquery-ui-1.10.3.custom.min',
'bootstrap.min',
'autocomplete.js')
                                        );

        echo $this->fetch('meta');
        echo $this->fetch('script');
        echo $this->fetch('css');
        echo $this->fetch('js');
    ?>
</head>
<body>
    <div id="container">
        <div id="content">

            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
        <?php 
                echo $this->element('sql_dump'); 
        ?>
</body>
</html>
