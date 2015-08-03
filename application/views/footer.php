<?php
if (! defined ( 'BASEPATH' ))
  exit ( 'No direct script access allowed' );
?>
                <script>
                    $(function(){
                        var baseurl = "http://<?php echo my_base_url();?>";
                        $.ajax({
                            type:"POST",
                            url:baseurl+"/message/checkHeart",
                            error:function(e){
                                alert(e+"  ajax错误码是："+e.status);
                            },
                            success:function(data){
                                var jsonStr = eval('('+data+')');
                                if( jsonStr.length != 0 ){
                                    $("#new_message").text(jsonStr.length);
                                    $("#new_message_count_new").text(jsonStr.length+" new");
                                    var message_content = '';
                                    for (var i = 0; i < jsonStr.length; i++) {
                                        message_content += '<a href=\"#\" class=\"list-group-item\"><div class=\"list-group-status status-online\"></div><span class=\"contacts-title\">'+jsonStr[i].messageTitle+'</span><p>'+jsonStr[i].messageContent+'</p></a>';
                                    };
                                    $("#new_message_content").html(message_content);
                                }
                            }
                        });
                    });
                </script>
    </body>
</html>