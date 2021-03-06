$('document').ready(function(){

    $('body').on('click','.name',function(){
        var $td = $(this).parent();
        if($td.attr('data-name')!=='id') {
            $('<input>').attr({
                type: 'text',
                name: $td.attr('data-name'),
                value: $(this).text(),
                class: 'form-control input-sm edit',
            }).appendTo($(this).parent()).focus();
            $(this).css({'display':'none'});
        }
    });

    $('body').on('focusout','.edit',function(){
        var $id = $(this).closest('tr').attr('data-id');
        var $name = $(this).parent().attr('data-name');

        $.ajax({
            url:"/asd/"+$id,
            method:"PUT",
            data:{
                value:$(this).val(),
                name:$name
            }
        });

        $('<span>').text($(this).val()).attr({
            class:'name'
        }).appendTo($(this).parent());
        $(this).hide();
    });

    $('.delete').on('click',function(e){

        var $parent = $(this).closest('tr');
        var $input = $parent.find('input');
        $('.danger').removeClass('danger');
        $('.error').remove();

        if($input.prop('checked')){
            $parent.remove();
        }

        else{
            $('<span>').text('check the row').attr({
                'class':'error'
            }).appendTo($(this).parent());
            $parent.addClass('danger');
            }
    });


    var modalShow = function(modal,overlay)
    {
        $(overlay).fadeIn(600,function(){
            $(modal).show().animate({
                top:'50%',
                opacity:'1',
                height:'200px'
            },1000);

        });
    }

    var modalClose = function (modal,overlay)
    {
        $(modal).animate({
            top:'0',
            opacity:'0',
            height:'0'
        },1000, function () {
            $(modal).hide();
            $(overlay).fadeOut(600);
        });
    }

    $('.editor').on('click', function () {

        var _this = $(this);
        var $id = $(this).data('id');

        $.ajax({
            url:'/modal',
            method:'GET'
        }).done(function (response) {

            $('body').append(response);
            var $modal = '#custom-modal';
            var $overlay = '#overlay';
            $($modal).find('.sender').attr('data-id',$id);
            modalShow($modal,$overlay);
        });
    });


        $('body').on('click', '#close-modal',function () {
            var $modal = '#custom-modal';
            var $overlay = '#overlay';
            modalClose($modal,$overlay);
        });


    $('a[data-href]').on('click',function(e){
        var $val = $(this).data('href');
        var $href = '/?sort_by=' + $val;
        $(this).attr('href',$href);
    });

});

