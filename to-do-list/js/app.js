$(document).ready(function(){
    $('.remove-to-do').click(function(){ //if the attibut id is clicked
        const id = $(this).attr('id');
        
        $.post("app/remove.php",{  //we send the user on the page remove.php which is going to delete the tasks selected
            id: id
        },
        (data) => {
            if(data) {
                $(this).parent().hide(600);
            }
        }
        );
    });
    $(".check-box").click(function(e){ //if checkbox is checked
        const id =  $(this).attr('data-todo-id');
        
        $.post('app/check.php', //we apply the function in check.php
            {
                id: id 
            },
            (data) => {
                if(data != 'error'){
                    const h2= $(this).next();
                    if(data === '1'){
                        h2.removeClass('checked');
                    }else {
                        h2.addClass('checked');
                    }
                }
            }
        );
    });
});

function toggleSidebar(){
    document.getElementById("side-bar").classList.toggle('active');
};

$("#slide").click( function() {
    $(".icon").toggleClass("close");
});

function redirect() {
    window.location = "signup.php";
}
function redirect2() {
    window.location = "login.php";
}
function redirect3() {
    window.location = "index.php";
}
function redirect4() {
    window.location = "profile.php";
}
function redirect5() {
    window.location = "premium.php";
}
function redirect6() {
    window.location = "logout.php";
}
function redirect7() {
    window.location = "landing.php";
}



function list1(){
    window.location = "index.php";
}
function list2(){
    window.location = "list2.php";
}
function list3(){
    window.location = "list3.php";
}