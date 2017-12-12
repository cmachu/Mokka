<?php
    $services = ['github','codepen','skype','facebook','instagram'];
?>
<ul class="socials">
    <?php
        foreach($services as $service):
            $serviceUrl = carbon_get_theme_option($service.'_url');
            if(empty($serviceUrl)){
                continue;
            }
    ?>
            <li><a href="<?php echo $serviceUrl; ?>" target="_blank"><i class="fa fa-<?php echo $service; ?>"></i></a></li>
    <?php
        endforeach;
    ?>
</ul>