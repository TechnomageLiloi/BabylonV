<div id="<?php echo $entity->getID(); ?>" class="testing-card">
    <?php echo $entity->parseQuestion(); ?>
    <hr/>
    <a href="javascript:void(0)" class="butn" onclick="Requests.Puzzles.getCollection();">Done</a>
    <a href="javascript:void(0)" class="butn" onclick="Requests.Puzzles.getCollection();">Not done</a>
</div>