<div id="modules-levels-collection">
    <link href="/API/Levels/Collection/Style.css" rel="stylesheet" />

    <div style="text-align: center;">
        <a class="butn" href="javascript:void(0)" onclick="Requests.Puzzles.create();">Create puzzle</a>
    </div>

    <?php if($collection->count()): ?>
        <hr/>
        <table>
            <tr>
                <th>Unique ID</th>
                <th>Title</th>
                <th>Tags</th>
                <th>Status</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
            <?php foreach($collection as $entity): ?>
                <tr style="font-weight: bold;" class="levels">
                    <td>
                        <?php echo $entity->getId(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getTitle(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getTags(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getStatusTitle(); ?>
                    </td>
                    <td>
                        <?php echo $entity->getTypeTitle(); ?>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="butn" onclick="Requests.Puzzles.show('<?php echo $entity->getKey(); ?>');">Test</a>
                        <a href="javascript:void(0)" class="butn" onclick="Requests.Puzzles.edit('<?php echo $entity->getKey(); ?>');">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>