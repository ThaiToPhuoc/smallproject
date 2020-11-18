window.sessionStorage;
if(sessionStorage.getItem("username"))
{
    var username = sessionStorage.getItem("username");
    $('#username').text(username);
    $.ajax({
        url: 'php/user.php',
        type: 'post',
        dataType: 'json',
        data: {
            username: username
        },
        success: function(result){
            $.each (result, function (key, item){
                $('#avatar').attr('src','images/'+item['avatar']);
                $('#email').html('Email: ' + item['email']);
                if(item['admin'] == 1)
                {
                    $('#username').html(username + '</br>(admin)');
                    $('#permission').attr('href','admin_manage.html');
                }
                else
                {
                    $('#username').html(username);
                    $('#permission').attr('href','edit.html');
                }
            });
        }
    });
}

else
{
    alert('Bạn phải đăng nhập trước!');
    window.location.assign('index.html');
}