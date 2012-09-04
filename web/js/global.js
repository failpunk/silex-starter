/* 
 * Global javascript file
 */


$(function() {
   
  $('#login').bind('click', function() {
    ST.login();
  });
   
});


var ST = {
       
  'login': function() {
    FB.login(function(response) {
      if (response.authResponse) {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
          console.log('Good to see you, ' + response.name + '.');
        });
      } else {
        console.log('User cancelled login or did not fully authorize.');
      }
    });
  }
       
};


/* 
 * Facebook Auth Code
 */
window.fbAsyncInit = function() {
  FB.init({
    appId      : 'YOUR_APP_ID', // App ID
    //channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

  FB.Event.subscribe('auth.statusChange', function(response) {
    console.log(response);
      
    if(response.session){
          
    } else {
        
    }
  });
};

// Load the SDK Asynchronously
(function(d){
  var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
  if (d.getElementById(id)) {
    return;
  }
  js = d.createElement('script');
  js.id = id;
  js.async = true;
  js.src = "//connect.facebook.net/en_US/all.js";
  ref.parentNode.insertBefore(js, ref);
}(document));