$('form.ajax').on('submit', function(){
    var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        data = {}
        
        
    that.find('[name]').each(function(index, valu){
        
        if($(this).attr('checked') == 'checked'){
            console.log($(this).val())
        }
        
        var that = $(this),
                    name = that.attr('name'),
                    value = that.val()
            
           data[name] = value;

    })
    
    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function(response){
            $('#name_data').html(response);
            console.log(response)
        }
    })

    return false;
})

