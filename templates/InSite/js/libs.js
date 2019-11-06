$(document).ready(function() {
$("#notify").hide();
$("#mnotify").hide();

 $('#sidenav_mobile_close').click(function() {
  $('#sidenav_mobile').removeClass('active');
 });
 $('#sidenav_mobile_toggle').click(function() {
  $('#sidenav_mobile').toggleClass('active');
 });

/* $("#rcauthbtn").on("click", function(){
  if($('#rcname').length && $('#rcname').val().length && $('#rcpassword').length && $('#rcpassword').val().length){
   var aname = $("#rcname").val();
   var apassword = $("#rcpassword").val();
   $.ajax({
   	method: "POST",
   	url: "/engine/module/ajax/login.php",
   	data: "name=" + aname + "&password=" + apassword,
   	success: iauth
   });
   function iauth(data){
  if(data == 'ok'){
   Cookies.set('rc_user', aname, { expires: 7 });
   location.href=window.location.pathname;
  }
 }
  }else{
  	$("#notify").show(100);
    $("#notify").html("Заполните поля!");
     setTimeout(function(){
     $("#notify").hide(100);
    }, 1500);
  }
 });
 $("#mrcauthbtn").on("click", function(){
  if($('#mrcname').length && $('#mrcname').val().length && $('#mrcpassword').length && $('#mrcpassword').val().length){
   var mname = $("#mrcname").val();
   var mpassword = $("#mrcpassword").val();
   $.ajax({
   	method: "POST",
   	url: "/engine/module/ajax/login.php",
   	data: "name=" + mname + "&password=" + mpassword,
   	success: miauth
   });
   function miauth(data){
  if(data == 'ok'){
   Cookies.set('rc_user', mname, { expires: 7 });
   location.href=window.location.pathname;
  }
 }
  }else{
  	$("#mnotify").show(100);
    $("#mnotify").html("Заполните поля!");
     setTimeout(function(){
     $("#mnotify").hide(100);
    }, 1500);
  }
 });
*/
 $("#logout").on("click", function(){
  Cookies.remove('rc_user');
  location.href=window.location.pathname;
 });
 $("#mlogout").on("click", function(){
  Cookies.remove('rc_user');
  location.href=window.location.pathname;
 });
 });