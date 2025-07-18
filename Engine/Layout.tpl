<!DOCTYPE html>
<html lang="en">
    <head>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/vendor/technomage-liloi/rune-framework/Frontside/Library/Jquery.min.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/vendor/technomage-liloi/rune-framework/Frontside/Library/Underscore.min.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/vendor/technomage-liloi/rune-api/Client/API.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/vendor/technomage-liloi/stylo/Source/Stylo.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/Engine/API/Requests.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/Engine/API/Maps/Requests.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/Engine/API/Puzzles/Requests.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/Engine/API/Puzzles/Testing.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/Engine/API/Levels/Requests.js'); ?></script>
        <script><?php echo file_get_contents(dirname(__DIR__) . '/Engine/API/Milestones/Requests.js'); ?></script>

        <style><?php echo file_get_contents(__DIR__ . '/Style.css'); ?></style>

        <title><?php echo $config['title']; ?></title>
    </head>
    <body>
        <div style="text-align: center;">
            <a href="javascript:void(0)" class="butn" onclick="Requests.Maps.show();">Map</a>
            <a href="javascript:void(0)" class="butn" onclick="Requests.Levels.getCollection();">Levels</a>
            <a href="javascript:void(0)" class="butn" onclick="Requests.Milestones.show();">Milestone</a>
            <a href="javascript:void(0)" class="butn" onclick="Requests.Puzzles.getCollection();">Puzzles</a>
        </div>
        <hr/>
        <div id="page" style="stylo">
            <script>Requests.Maps.show();</script>
        </div>
    </body>
</html>