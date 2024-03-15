<div class="wrap">
<h1> alecaddd plugin </h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
    <?php
        settings_fields('alecaddd_options_group');
        do_settings_sections('alecaddd_plugin');
        submit_button();
        ?>
</form>
</div>