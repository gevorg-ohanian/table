$('document').ready(function(){

    $('body').on('click','.name',function(){
        var $td = $(this).parent();
        if($td.attr('data-name')!=='id') {
            $('<input>').attr({
                type: 'text',
                name: $td.attr('data-name'),
                value: $(this).text(),
                class: 'form-control input-sm edit',
            }).appendTo($(this).parent());
            $(this).css({'display':'none'});
        }
    });

    $('body').on('focusout','.edit',function(){
        var $id = $(this).closest('tr').attr('data-id');
        //var $name = $(this).parent().attr('data-name');
        //console.log($id);
        //var str = '{'+$id+'}';
        //console.log(str);
        $.ajax({
            url:"/"+$id,
            method:"put/patch",
            data:$(this).val()

        }).done(function(response){
            console.log(response);
        });
        //    .done(function(response){
        // console.log(response);
        //});

        $('<span>').text($(this).val()).attr({
            class:'name'
        }).appendTo($(this).parent());
        $(this).css({'display':'none'});
    });

});

