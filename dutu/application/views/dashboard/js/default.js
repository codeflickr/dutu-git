$(function() {
    
    $.getJSON('dashboard/xhrGetListings', function(o) {
            $.each(o, function(key){
                $('#listInserts').append('<div><a class="del" rel = '+o[key].id +' href = "#">'+o[key].text+'</a></div>');
            });
            
            $('.del').live('click', function() {
                delItem = $(this);
                var id = $(this).attr('rel');
                $.post('dashboard/xhrDeleteListing', {'id' : id}, function(o) {
                    delItem.parent().remove();
                    alert(id);
                }, 'json');
                return false;
            });
        }, 'json');    
    
    $('#randomInsert').submit(function() {
        var url = $(this).attr('action');
        var data = $(this).serialize();        
       
        $.post(url, data, function(o) {
            $('#listInserts').append('<div>' + o +'</div>');
        }, 'json');
       
        return false;
    });
    
});