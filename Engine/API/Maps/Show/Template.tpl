<link href="/API/Maps/Show/Style.css" rel="stylesheet" />
<div id="application-diary-show" class="stylo">
    <div class="controls">
        <a class="butn" href="javascript:void(0)" onclick="Requests.Maps.show('<?php echo $entity->getKey(); ?>');">Show</a>
        <a class="butn" href="javascript:void(0)" onclick="Requests.Maps.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
    </div>
    <hr/>
    <div class="data">
        <?php echo $entity->getData(); ?><br/>
    </div>
    <?php echo $entity->parse(); ?>
    <hr/>
</div>