$(document).ready(function()
{
    $('.confirme').click(function(e)
    {
        if (!confirm('Are you sure you wish to delete this title?')) {
            e.preventDefault();
        }
    });
    
    $('#IMDB').click(function(e)
    {
        $.getJSON( "http://www.omdbapi.com/", { t: $('#title').val(), plot: 'full' } )
        .done(function( data )
        {
            if (data.Response != "False")
            {
                var date = new Date(Date.parse(data.Released));
                
                $('#description').html(data.Plot);
                $('#director').val(data.Director);
                $('#duration').val(data.Runtime.substring(0, data.Runtime.indexOf(' ')));
                $('#release').val(date.getFullYear() + '-' + date.getMonth() + '-' + date.getDay());
                
                var rating = 'PG';
                
                
                
                console.log(date);
                console.log(data);
            }
            else alert('Movie with that title not found!');
        });
    });
});