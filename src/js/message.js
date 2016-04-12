function sendMessage(user) {
  var msgContent = document.getElementById("message-content");
  var content = msgContent.value;
  msgContent.value='';

  if (content == '') {
    return;
  } 

  var preContentStr = "<div class=\"media msg \"><a class=\"pull-left\" href=\"#\"><img class=\"media-object\" data-src=\"holder.js/64x64\" alt=\"64x64\" style=\"width: 32px; height: 32px;\" src=\"\"></a><div class=\"media-body\"><small class=\"pull-right time\"><i class=\"fa fa-clock-o\"></i>timestamp</small><h5 class=\"media-heading\"><?php echo $_GET['owner']?></h5><small class=\"col-lg-10\">";
  var postContentStr = "</small></div></div>"
  var toAppend = preContentStr + content + postContentStr;
  $("#msg-box").append(toAppend);


  updateScroll();
  msgContent.focus();
}


function updateScroll(){
    var element = document.getElementById("msg-box");
    element.scrollTop = element.scrollHeight;
}

// $('#send-message-button').click(function()
// {
//     $.ajax({
//         type:'POST',
//         data:
//         {

//         },
//         success: function(msg)
//         {
//             alert('Email Sent');
//         } 
//     });
// });