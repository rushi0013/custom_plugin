$(document).ready(function(){
	$('[name="category"]').change(function(e){
	    e.preventDefault();
	    $this = $(this);
	    $.ajax({
            url:ajaxurl,
            data:{
              action:"get_category",
              id:$this.val(),
            },
            type:"post",
            dataType:"json",
            success:function(json){
              if(json['error']){
                $(".error_pop .modal-body p").html(json['error']);
                $(".error_pop_btn")[0].click();
              }
              html = '';
              if(json['data']){
                $.each(json['data'],function(i,j){
                  if($category_id == j['id']){
                    html += '<option value="'+j['id']+'" selected="selected">'+j['name']+'</option>';
                  }else{
                    html += '<option value="'+j['id']+'">'+j['name']+'</option>';
                  }
                })
              } 
              $('[name="sub_category"]').html(html);
              $('[name="sub_category"]').trigger("change");
            }
        })
    });
    $('[name="category"]').trigger("change");
})