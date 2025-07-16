Requests.Puzzles = {
    getCollection: function ()
    {
        API.request('Puzzles.Collection', {
            'debug': false
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key_puzzle)
    {
        API.request('Puzzles.Show', {
            'key_puzzle': key_puzzle
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    edit: function (key_puzzle)
    {
        API.request('Puzzles.Edit', {
            'key_puzzle': key_puzzle
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_puzzle)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#puzzles-edit');

        API.request('Puzzles.Save', {
            'key_puzzle': key_puzzle,
            'title': jq_block.find('[name="title"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'theory': jq_block.find('[name="theory"]').val()
        }, function (data) {
            Requests.Puzzles.getCollection();
        }, function () {

        });
    },

    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Puzzles.Create', {
            'debug': false
        }, function (data) {
            Requests.Puzzles.getCollection();
        }, function () {

        });
    }
}