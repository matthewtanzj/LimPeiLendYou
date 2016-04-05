function sendMessage(user) {
  var msgBox = document.getElementById("message-content");
  var content = msgBox.value;
  msgBox.value='';

  if (content == '') {
    return;
  } 

  var preContentStr = "<div class=\"media msg \"><a class=\"pull-left\" href=\"#\"><img class=\"media-object\" data-src=\"holder.js/64x64\" alt=\"64x64\" style=\"width: 32px; height: 32px;\" src=\"\"></a><div class=\"media-body\"><small class=\"pull-right time\"><i class=\"fa fa-clock-o\"></i>timestamp</small><h5 class=\"media-heading\"><?php echo $_GET['owner']?></h5><small class=\"col-lg-10\">";
  var postContentStr = "</small></div></div>"
  var toAppend = preContentStr + content + postContentStr;
  $("#msg-box").append(toAppend);


  updateScroll();
  msgBox.focus();
}


function updateScroll(){
    var element = document.getElementById("msg-box");
    element.scrollTop = element.scrollHeight;
}