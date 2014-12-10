$(function(){

    $('table.todos').on('keypress', 'input.text', function(e)
    {
        if (e.keyCode == 40 || e.keyCode == 13)
        {
            var $next = $(e.currentTarget).closest('tr').next().find('input.text');
            if ($next.length)
            {
                $next.focus();
            }
        }
        else if (e.keyCode == 38)
        {
            var $previous = $(e.currentTarget).closest('tr').prev().find('input.text');
            if ($previous.length)
            {
                $previous.focus();
            }
        }
    });

});