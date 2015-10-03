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


    //$('a[data-href]').on('click',function(e){
    //    var $val = $(this).data('href');
    //    var $href = '/?sort_by=' + $val;
    //    $(this).attr('href',$href);
    //});

    $('#baseHead th').on('click', function () {
        var data = $(this).attr('data-href');

        var $td = $('#baseTable tr');
        var sort_array =[];
        var backward_array=[];
        var tds = $('.'+data);

        $.each(tds, function(key, value){

            sort_array[value.closest('tr').id] = $(value).find('.name').text();
            backward_array[$(value).find('.name').text()] = value.closest('tr').id;

        });

        sort_array.sort(function(a,b){
           if(a>b){
               return 1;
           }
            else if(a<b){
                return -1;
            }
            return 0;
        });

        $.each(sort_array, function (key,value) {
            $('#baseTable').append($('tr#'+backward_array[value]));
        });

    });

    //    var $tr = $('#baseTable tr');
    //    var limit = 1;
    //    var length = $tr.length;
    //    $.each($tr, function (index,value) {
    //    var _this = $(this);
    //   if(index<limit){
    //       _this.show().addClass('itemIndex');
    //   }
    //    else{
    //      _this.hide();
    //   }
    //    });
    //
    //$('#next').on('click', function () {
    //
    //    var $tr =  $('#baseTable .itemIndex');
    //    var $index = $tr.last().index();
    //
    //    $.each($('#baseTable tr'), function (index, value) {
    //        var _this = $(this);
    //        if(index <(limit+$index+1)&&index > $index){
    //            _this.show().addClass('itemIndex');
    //        }
    //        else{
    //            _this.hide();
    //        }
    //    });
    //});
    //$('#previous').on('click', function () {
    //
    //    var $tr =  $('#baseTable .itemIndex');
    //    var $index = $tr.last().index();
    //    $.each($('#baseTable tr'), function (index, value) {
    //
    //        var _this = $(this);
    //
    //        if(index<$index+1-limit&&index>$index-2*limit){
    //
    //            _this.show();
    //            _this.next().removeClass('itemIndex');
    //        }
    //        else{
    //
    //            _this.hide();
    //        }
    //    });
    //});

});

