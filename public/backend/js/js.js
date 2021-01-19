$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
    $('.editcategory').click(function(){
        let id = $(this).data('id');
        $.ajax({
            type : 'get',
            url : 'category/'+id+'/edit',
            dataType : 'json',
            success:function($result){
                $('.name').val($result.name);
                $('.statuss').val($result.status);
            }
        });
        $('.updatecategory').click(function(){
            let name = $('.name').val();
            let statuss = $('.statuss').val();
            $.ajax({
                type : 'put',
                url : 'category/'+id,
                dataType : 'json',
                data : {
                    name : name,
                    statuss : statuss,
                    id : id,
                },
                success:function($result){
                    location.reload();
                }
            });
        });
    });
    $('.deletecategory').click(function(){
        let id = $(this).data('id');
        $('.delcategory').click(function(){
            $.ajax({
                type : 'delete',
                url : 'category/'+id,
                dataType : 'json',
                success:function($result){
                    location.reload();
                }
            });
        });
    });
    $('.editproducttype').click(function(){
        let id = $(this).data('id');
        $.ajax({
            type : 'get',
            url : 'producttype/'+id+'/edit',
            dataType : 'json',
            success:function($result){
                $('.name').val($result.producttype.name);
                $('.statuss').val($result.producttype.status);
                html = '';
                $.each($result.category,function($key,$value){
                    if($result.producttype.idcategory == $value['id']){
                        html += '<option value='+$value['id']+' selected>'
                            html += $value['name'];
                        html += '</option>';
                    }else{
                        html += '<option value='+$value['id']+' >'
                            html += $value['name'];
                        html += '</option>';
                    }
                });
                $('.idcategory').html(html);
            }
        });
        $('.updateproducttype').click(function(){
            let name = $('.name').val();
            let statuss = $('.statuss').val();
            let idcategory = $('.idcategory').val();
            $.ajax({
                type : 'put',
                url : 'producttype/'+id,
                dataType : 'json',
                data : {
                    name : name,
                    statuss : statuss,
                    idcategory : idcategory,
                    id : id
                },
                success:function($result){
                    console.log($result);
                    location.reload();
                }
            });
        });
    });
    $('.deleteproducttype').click(function(){
        let id = $(this).data('id');
        $('.delproducttype').click(function(){
            $.ajax({
                type : 'delete',
                url : 'producttype/'+id,
                dataType : 'json',
                success:function($result){
                    location.reload();
                }
            });
        });
    });
    $('.deleteproduct').click(function(){
        let id = $(this).data('id');
        console.log(id);
        $('.delproduct').click(function(){
            $.ajax({
                type : 'delete',
                url : 'product/'+id,
                dataType : 'json',
                success:function($result){
                    location.reload();
                }
            });
        });
    });
    $('.viewdonhang').click(function(){
        let url = $(this).attr('href');
        let id = $(this).data('id');
        $('.iddonhang').text(id);
        $.ajax({
            url : url,
            dataType : 'json',
            type : 'get',
            success:function($result){
                if($result){
                    $('#contentview').html($result);
                }
                
            }
        });
    });
    $('.editbanner').click(function(){
        let url = $(this).attr('href');
        $.ajax({
            url : url,
            type : 'get',
            dataType : 'json',
            success:function($result){
                $('#updatebannercheck').html($result);
            }
        });
    });
    $('.editblog').click(function(){
        let id = $(this).data('id');
        $.ajax({
            url : 'blog/'+id+'/edit',
            type : 'get',
            dataType : 'json',
            success:function($result){
                $('#updateblogcheck').html($result);
            }
        });
    });
    $('.deleteblog').click(function(){
        let id = $(this).data('id');
        $('.delblog').click(function(){
            $.ajax({
                type : 'delete',
                url : 'blog/'+id,
                dataType : 'json',
                success:function(data){
                    location.reload();
                }
            });
        });
    });
});