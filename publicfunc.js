var url;
var ajaxFlag = 0;
function GetHtmlName()
{
    var a = location.href.split('/');
    a = a[4].split('.');
    return a[0];
}

function RedirctPHP(url)
{
    return "/SecureDevelopment/php/" + url + ".php";
}

function NoNUll(result)
{
    if (result && typeof(result) != "undefined") return true;
}

function GetFlag()
{
    data = $("input#Flag").serialize() + "&url=" + RedirctPHP(GetHtmlName());
    if (ajaxFlag == 0)
    {
        ajaxFlag = 1;
        $.ajax
        ({
            //几个参数需要注意一下
            type: "POST",//方法类型
            dataType: "html",//预期服务器返回的数据类型
            url: "/SecureDevelopment/php/publicfunc.php",//url
            data: data,
            success: function (result)
            {
                flag = Number(result);
                if (flag === 1)
                {
					$(".Challenge").css("visibility","hidden");
					$(".Success").css("visibility","visible");
                }
            },
            error : function(xhr)
            {
                console.log("错误信息："+xhr.statusText);
            },
            complete: function()
            {
                ajaxFlag = 0;
            },
        });
    }	
}

function GetPHP(id)
{
    url = RedirctPHP(GetHtmlName());
    if (ajaxFlag == 0)
    {
        ajaxFlag = 1;
        $.ajax
        ({
            type: "GET",
            dataType: "html",
            url: url,
            data: id,
            success: function(result)
            {
                if (NoNUll(result)) $('#Notice2').html(result);
            },
            error : function(xhr)
            {
                console.log("错误信息："+xhr.statusText);
            },
            complete: function()
            {
                ajaxFlag = 0;
            },
        });
    }
}

$('#FormSubmit').submit
(
    function (event)
    {
        event.preventDefault();
        var form = $(this);
        url = RedirctPHP(GetHtmlName());
        if (ajaxFlag == 0)
        {
            ajaxFlag = 1;
            $.ajax
            ({
            //几个参数需要注意一下
                type: "POST",//方法类型
                dataType: "html",//预期服务器返回的数据类型
                url: url ,//url
                data: $("#FormSubmit").serialize(),
                success: function (result)
                {
                    if (NoNUll(result)) $('#Notice').html(result);
                },
                error : function(xhr)
                {
                    console.log("错误信息："+xhr.statusText);
                },
                complete: function()
                {
                    ajaxFlag = 0;
                },
            });
        }
    }
);

function PostID()
{
    id = window.location.search.split('?')[1];
    GetPHP(id);
}

function Delete(id)
{
    $("input#id")[0].value = Number(id);
    $('#FormSubmit').submit();
}

$("#Upload").click
(
    function()
    {
        if (ajaxFlag == 0)
        {
            ajaxFlag = 1;
            url = RedirctPHP(GetHtmlName());
            var formData = new FormData($('#UploadForm')[0]);
            $.ajax
            ({
                type: 'post',
                url: url,
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function (result)
                {
                    if (NoNUll(result)) $('#Notice').html(result);
                },
                error : function(xhr)
                {
                    console.log("错误信息："+xhr.statusText);
                },
                complete: function()
                {
                    ajaxFlag = 0;
                },
            });
        }    
    }
);