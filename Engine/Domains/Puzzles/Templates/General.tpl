<div class="stylo">

    <?php $theory = 'theory-' . $entity->getID(); ?>

    <a href="javascript:void(0)" class="butn" onclick="$('#<?php echo $theory; ?>').toggle();">Surrender</a>

    <div id="<?php echo $theory; ?>" style="display: none;">
        <?php echo $entity->parseTheory(); ?>
    </div>

    <?php echo $render; ?>
</div>