function backButton(){
    getotheropt('/includes/themes/others/popups/chatMedia.php')
}

function mediaChatSms(){
    getotheropt('/includes/themes/others/popups/chatMedia.php')
}
function notLogedMenuPT(){
    getotheropt('/includes/themes/others/mainmenu/notlogedmebu.php')
}

function getEnterCoupons(){
    document.getElementById("others-content").style.display = "block";
    getotheropt('/includes/themes/others/popups/getcoupons.php')
}

function getFreeCoins(){
    document.getElementById("others-content").style.display = "block";
    getotheropt('/includes/themes/others/popups/getfreecoins.php')
}

function logedMainMenu(){
    document.getElementById("others-content").style.display = "block";
    getotheropt('/includes/themes/others/mainmenu/headermenu.php')
}

function sendTipsOPT(){
    getotheropt('/includes/themes/others/popups/sendtips.php')
}

function registerPromotionOPT(){
    getotheropt('/includes/themes/others/popups/register-promotion.php')
}

function loginOPT(){
    getotheropt('/includes/themes/others/popups/login.php')
}

function forgotpasswordOPT(){
    getotheropt('/includes/themes/others/popups/lforgot-password.php')
}


function registerOPT(){
    getotheropt('/includes/themes/others/popups/register.php')
}


function closeOtherOpt(){
    document.getElementById("others-content").style.display = "none";
    getotheropt('/includes/themes/others/blank.php')
}

function closeOtherOptChild(){
    document.getElementById("others-content-child").style.display = "none";
    getotheroptchild('/includes/themes/others/blank.php')
}

function getotheropt(_url){
    document.getElementById("others-content").style.display = "block";
    $.ajax({
        url : _url,
        type : 'post',
        success: function(data) {
         $('#others-content').html(data);
        }
    });
}
function getotheroptchild(_url){
    document.getElementById("others-content-child").style.display = "block";
    $.ajax({
        url : _url,
        type : 'post',
        success: function(data) {
         $('#others-content-child').html(data);
        }
    });
}




$(document).ready(function() {
			setInterval(function () {
				$('#getAllMessagesFooter').load('/includes/functions/alert.php?opt=allSms')
			}, 3000);
});


$(document).ready(function() {
			setInterval(function () {
				$('#onlineuserslider').load('/includes/themes/others/userslider/display.php')
			}, 10000);
});







function deleteMessagesChat() {
  var x = document.getElementById("messageChatcheckBox");
  if (x.style.display === "none") {
    x.style.display = "block";
      $('#messageChatcheckBox').html('<style> .aaaizoo{display:block!important;} </style>');
  } else {
    x.style.display = "none";
      $('#messageChatcheckBox').html('<style> .aaaizoo{display:none!important;} </style>');
  }
}



function loginform(){
        $.ajax({
            type:'POST',
            url:'/includes/functions/enter/login.php',
            data:$('#loginformBox').serialize(),
            success:function(response){
                $('#others-content-child').html(response);
            }
        });
        return false;
}
function registerform(){
        $.ajax({
            type:'POST',
            url:'/includes/functions/enter/register.php',
            data:$('#registerformBox').serialize(),
            success:function(response){
                $('#others-content-child').html(response);
            }
        });
        return false;
}





function refreshcoins(){
    $.ajax({
        url : '/includes/themes/others/coins.php?usercoins',
        type : 'post',
        success: function(data) {
         $('#coins').html(data);
        }
    });
}
