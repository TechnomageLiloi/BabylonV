<link href="/API/Milestones/Show/Style.css" rel="stylesheet" />
<div id="application-diary-show" class="stylo">
    <div class="controls">
        <a class="butn" href="javascript:void(0)" onclick="Requests.Milestones.show('<?php echo $entity->getKey(); ?>');">Show</a>
        <a class="butn" href="javascript:void(0)" onclick="Requests.Milestones.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
        &diams;
        <a class="butn" href="javascript:void(0)" onclick="Requests.Milestones.create();">Create new milestone</a>
    </div>
    <br/>
    <div class="data">
        [<?php echo $entity->getID(); ?>] <?php echo $entity->getData(); ?>
    </div>
    <hr/>
    <?php echo $entity->parse(); ?>
    <hr/>
</div>