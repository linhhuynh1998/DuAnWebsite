$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $('.qty').blur(function(){
        let rowId = $(this).data('id');
        $.ajax({
            url : 'gio-hang/cap-nhat/'+rowId,
            type : 'post',
            dataType : 'json',
            data : {
                qty : $(this).val(),
            },
            success:function(data){
                if(data.error){
                    toastr.error(data.error,{timeOut:5000});
                }else{
                    toastr.success(data.success,{timeOut:5000});
                    location.reload();
                } 
            }
        });
    });
    $('.deletecart').click(function(){
        let rowId = $(this).data('id');
        $('.delcart').click(function(){
            $.ajax({
                type : 'get',
                url : 'gio-hang/xoa/'+rowId,
                dataType : 'json',
                success:function(data){
                    console.log(data);
                    toastr.success(data.success,{timeOut:5000});
                    location.reload();
                }
            });
        });
    });
    $('.sortby').change(function(){
        $('#form_submit').submit();
    });
    $('.deletewishlist').click(function(){
        let id = $(this).data('id');
        $('.delwishlist').click(function(){
            $.ajax({
                type : 'get',
                url : 'danh-muc-wishlist/'+id,
                dataType : 'json',
                success:function($result){
                    toastr.success($result.success,{timeOut:5000});
                    location.reload();
                }
            });
        });
    });
    $('.detail_render').click(function(){
        let idproduct = $(this).data('id');
        $.ajax({
            type : 'get',
            url : 'chi-tiet-san-pham/'+idproduct,
            dataType : 'json',
            success:function($result){
                console.log($result);
                $('#content_detail').html($result);
            }
        });
    });
});
