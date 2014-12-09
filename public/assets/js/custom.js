$(document).ready(function(){

    $('#ajaxLoginSubmit').click(function(e){
        e.preventDefault();

         email       = $('#loginEmail').val();
         password    = $('#loginPassword').val();
         url         = $('form#ajaxLoginForm').attr('action');

        $.ajax({
            type:   'post',
            url:    url,
            data:   'email='+email+'&password='+password,
            success:function(data) {
                if(data.success == true) {
                    window.location='/';
                }
                else {
                    alert(data.errors);
                }
            }

        });


            });

    $('a#ajaxSearch').click(function(e){
        e.preventDefault();

         text = $('#ajaxSearchText').val();
         url  = $('a#ajaxSearch').attr('href');

        $.ajax({
            type:   'post',
            url:    url,
            data:   'text='+text,
            success:function(data){
                if (data.success == false) {
                    alert('Please enter a valid query!');
                }
                else {
                    window.location=url + '?text=' + data.text;
                }
            }
        });
    });

    $('#submit').click(function(e){
        e.preventDefault();

         email       = $('#email').val();
         comment     = $('#comment').val();
         commenter   = $('#commenter').val();
         url         = $('#ajaxformcomment').attr('action');

            $.ajax({
                type:   'post',
                url:    url,
                data:   'email='+email+'&comment='+comment+'&commenter='+commenter,
                success: function(data){
                    if (data.success == true) {
                        $('div#success').append('Your comment has been submitted!<a href=\"#\" class=\"close\">\&times;</a>');
                        $('div#success').attr('style', 'display:block');
                        $('ul#addComment').prepend('<li><article><header><div class="clearfix"><span class="right date">now</span><span class="left">'+ commenter +'</span></div></header><div><p>'+ comment +'</p></div><footer><hr></footer></article></li>');
                        $('#commenter').val('');
                        $('#email').val('');
                        $('#comment').val('');
                    } else {
                        $.each(data.errors, function(index, value){
                            $('div#warning').append('' + value + '<a href="\#\" class=\"close\">\&times;</a>');
                        });

                        $('div#warning').attr('style','display:block');
                        }

                }
            });

    });
});
