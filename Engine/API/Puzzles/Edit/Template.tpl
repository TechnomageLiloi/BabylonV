<link href="/API/Puzzles/Show/Style.css" rel="stylesheet" />
<div id="puzzles-edit" class="stylo">

    <a href="javascript:void(0)" class="butn" onclick="Requests.Puzzles.save('<?php echo $entity->getKey(); ?>');">Save</a>

    <table>
        <tr>
            <th>Name</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Unique ID</td>
            <td>
                <input name="id" type="text" value="<?php echo $entity->getId(); ?>" />
            </td>
        </tr>
        <tr>
            <td>Title</td>
            <td>
                <input name="title" type="text" value="<?php echo $entity->getTitle(); ?>" />
            </td>
        </tr>
        <tr>
            <td>Tags</td>
            <td>
                <input name="tags" type="text" value="<?php echo $entity->getTags(); ?>" />
            </td>
        </tr>
        <tr>
            <td>Program</td>
            <td>
                <textarea name="program"><?php echo $entity->getProgram(); ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <select name="status">
                    <?php foreach($statuses as $key => $value): ?>
                        <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Type</td>
            <td>
                <select name="type">
                    <?php foreach($types as $key => $value): ?>
                        <option value="<?php echo $key; ?>" <?php if($entity->getType() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Theory</td>
            <td>
                <textarea name="theory"><?php echo $entity->getTheory(); ?></textarea>
            </td>
        </tr>
    </table>
</div>