<section id="contact" class="add-padding border-top-color2">

    <div class="container text-center">

      <div class="row">

        <div class="col-sm-6 col-md-5 text-right scrollimation fade-up d1">

          <h1 class="big-text">Contact Us</h1>

          <p class="lead">Software Engineer. Lawyer.<br>Experienced Manager. Entrepreneur.</p>

          <p>Sinatra, Ruby on Rails, JavaScript, Node.js, Express.js, Backbone.js, Handlebars.js, jQuery, AJAX, HTML5, CSS3, SASS, SQL, APIs, Git, GitHub/Bitbucket, WordPress, Heroku, Responsive/Mobile Development.

          <p>Please feel free to contact me with questions, comments or collaborations.</p>

          <p>For more information, <a href="" target="_blank">visit my blog.</a></p>

        </div>

        <!--=== Contact Form ===-->

        <form id="contact-form" class="col-sm-6 col-md-offset-1 scrollimation fade-left d3" action="contact.php" method="post" novalidate>

          <div class="form-group">
            <label class="control-label" for="contact-name">Name</label>
            <div class="controls">
            <input id="contact-name" name="contactName" placeholder="Your name" class="form-control requiredField" data-new-placeholder="Your name" type="text" data-error-empty="Please enter your name">
            <i class="fa fa-user"></i>
            </div>
          </div><!-- End name input -->

          <div class="form-group">
            <label class="control-label" for="contact-mail">Email</label>
            <div class=" controls">
            <input id="contact-mail" name="email" placeholder="Your email" class="form-control requiredField" data-new-placeholder="Your email" type="email" data-error-empty="Please enter your email" data-error-invalid="Invalid email address">
            <i class="fa fa-envelope"></i>
            </div>
          </div><!-- End email input -->

          <div class="form-group">
            <label class="control-label" for="contact-message">Message</label>
            <div class="controls">
              <textarea id="contact-message" name="comments"  placeholder="Your message" class="form-control requiredField" data-new-placeholder="Your message" rows="6" data-error-empty="Please enter your message"></textarea>
              <i class="fa fa-comment"></i>
            </div>
          </div><!-- End textarea -->

          <p><button name="submit" type="submit" class="btn btn-color2 btn-block" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Message Sent"><i class="fa fa-paper-plane"></i>Send Message</button></p>
          <input type="hidden" name="submitted" id="submitted" value="true" />

        </form><!-- End contact-form -->

      </div>

    </div>

  </section>

  <!-- ==============================================
  FOOTER
  =============================================== -->

  <footer id="main-footer" class="add-padding border-top-color2">

    <div class="container">

      <p class="text-center">&copy; 2018 - Chapal Roy & Mrittunjoy Devnath</p>

    </div>

  </footer>

<script type="text/javascript">
$(document).ready(function() {

/*============================================
Page Preloader
==============================================*/

$(window).load(function(){
  $('#page-loader').fadeOut(500,function(){
    loadGmap();
  });

})

/*============================================
Header
==============================================*/

$('#home').height($(window).height()+50);

$.backstretch('assets/images/header-bg.jpg');

$(window).scroll( function() {
  var st = $(this).scrollTop(),
    wh = $(window).height(),
    sf = 1.2 - st/(10*wh);

  $('.backstretch img').css({
    'transform' : 'scale('+sf+')',
    '-webkit-transform' : 'scale('+sf+')'
  });

  $('#home .container').css({ 'opacity' : (1.4 - st/400) });

  if($(window).scrollTop() > ($(window).height()+50)){
    $('.backstretch').hide();
  }else{
    $('.backstretch').show();
  }

});

var st = $(this).scrollTop(),
  wh = $(window).height(),
  sf = 1.2 - st/(10*wh);

$('.backstretch img').css({
  'transform' : 'scale('+sf+')',
  '-webkit-transform' : 'scale('+sf+')'
});

$('#home .container').css({ 'opacity' : (1.4 - st/400) });


/*============================================
Navigation Functions
==============================================*/
if ($(window).scrollTop()< ($(window).height()-50)){
  $('#main-nav').removeClass('scrolled');
}
else{
  $('#main-nav').addClass('scrolled');
}

$(window).scroll(function(){
  if ($(window).scrollTop()< ($(window).height()-50)){
    $('#main-nav').removeClass('scrolled');
  }
  else{
    $('#main-nav').addClass('scrolled');
  }
});

/*============================================
ScrollTo Links
==============================================*/
$('a.scrollto').click(function(e){
  $('html,body').scrollTo(this.hash, this.hash, {gap:{y:-70}});
  e.preventDefault();

  if ($('.navbar-collapse').hasClass('in')){
    $('.navbar-collapse').removeClass('in').addClass('collapse');
  }
});

/*============================================
Skills
==============================================*/
$('.skills-item').each(function(){
  var perc = $(this).find('.percent').data('percent');

  $(this).data('height',perc);
})

$('.touch .skills-item').each(function(){
  $(this).css({'height':$(this).data('height')+'%'});
})

$('.touch .skills-bars').css({'opacity':1});

/*============================================
Project thumbs - Masonry
==============================================*/
$(window).load(function(){

  $('#projects-container').css({visibility:'visible'});

  $('#projects-container').masonry({
    itemSelector: '.project-item:not(.filtered)',
    //columnWidth:370,
    isFitWidth: true,
    isResizable: true,
    isAnimated: !Modernizr.csstransitions,
    gutterWidth: 25
  });

  scrollSpyRefresh();
  waypointsRefresh();

});

/*============================================
Filter Projects
==============================================*/
$('#filter-works a').click(function(e){
  e.preventDefault();

  if($('#project-preview').hasClass('open')){
    closeProject();
  }

  $('#filter-works li').removeClass('active');
  $(this).parent('li').addClass('active');

  var category = $(this).attr('data-filter');

  $('.project-item').each(function(){
    if($(this).is(category)){
      $(this).removeClass('filtered');
    }
    else{
      $(this).addClass('filtered');
    }

    $('#projects-container').masonry('reload');
  });

  scrollSpyRefresh();
  waypointsRefresh();
});

/*============================================
Project Preview
==============================================*/
$('.project-item').click(function(e){
  e.preventDefault();

  var elem = $(this),
    title = elem.find('.project-title').text(),
    descr = elem.find('.project-description').html(),
    slidesHtml = '<ul class="slides">',
    elemDataCont = elem.find('.project-description');

    slides = elem.find('.project-description').data('images').split(',');

  for (var i = 0; i < slides.length; ++i) {
    slidesHtml = slidesHtml + '<li><img src='+slides[i]+' alt=""></li>';
  }

  slidesHtml = slidesHtml + '</ul>';

  $('#project-title').text(title);
  $('#project-content').html(descr);
  $('#project-slider').html(slidesHtml);

  openProject();

});

function openProject(){

  $('#project-preview').addClass('open');
  $('.masonry-wrapper').animate({'opacity':0},300);

  setTimeout(function(){
    $('#project-preview').slideDown();
    $('.masonry-wrapper').slideUp();

    $('html,body').scrollTo(0,'#filter-works',
      {
        gap:{y:-20},
        animation:{
          duration:400
        }
    });

    $('#project-slider').flexslider({
      prevText: '<i class="fa fa-angle-left"></i>',
      nextText: '<i class="fa fa-angle-right"></i>',
      animation: 'slide',
      slideshowSpeed: 3000,
      useCSS: true,
      controlNav: true,
      pauseOnAction: false,
      pauseOnHover: true,
      smoothHeight: false,
      start: function(){
        $(window).trigger('resize');
        $('#project-preview').animate({'opacity':1},300);
      }
    });

  },300);

}

function closeProject(){

  $('#project-preview').removeClass('open');
  $('#project-preview').animate({'opacity':0},300);

  setTimeout(function(){
    $('.masonry-wrapper').slideDown();
    $('#project-preview').slideUp();

    $('#project-slider').flexslider('destroy');
    $('.masonry-wrapper').animate({'opacity':1},300);


  },300);

  setTimeout(function(){
    $('#projects-container').masonry('reload');
  },500)
}

$('.close-preview').click(function(){
  closeProject();
})

/*============================================
Twitter
==============================================*/
var tweetsLength = $('#twitter-slider').data('tweets-length'),
  widgetID = $('#twitter-slider').data('widget-id');

twitterFetcher.fetch(widgetID, 'twitter-slider', tweetsLength, true, false, true, '', false, handleTweets);

function handleTweets(tweets){

  var x = tweets.length,
    n = 0,
    tweetsHtml = '<ul class="slides">';

  while(n < x) {
    tweetsHtml += '<li>' + tweets[n] + '</li>';
    n++;
  }

  tweetsHtml += '</ul>';
  $('#twitter-slider').html(tweetsHtml);

  $('.twitter_reply_icon').html("<i class='fa fa-reply'></i>");
  $('.twitter_retweet_icon').html("<i class='fa fa-retweet'></i>");
  $('.twitter_fav_icon').html("<i class='fa fa-star'></i>");

  $('#twitter-slider').flexslider({
    prevText: '<i class="fa fa-angle-left"></i>',
    nextText: '<i class="fa fa-angle-right"></i>',
    slideshowSpeed: 5000,
    useCSS: true,
    controlNav: false,
    pauseOnAction: false,
    pauseOnHover: true,
    smoothHeight: false
  });
}
/*============================================
Contact Map
==============================================*/
function loadGmap(){

if($('#gmap').length){

  var map;
  var mapstyles = [ { "stylers": [ { "saturation": -100 } ] } ];

  var infoWindow = new google.maps.InfoWindow;

  var pointLatLng = new google.maps.LatLng(mapPoint.lat, mapPoint.lng);

  var mapOptions = {
    zoom: mapPoint.zoom,
    center: pointLatLng,
    zoomControl : true,
    panControl : false,
    streetViewControl : false,
    mapTypeControl: false,
    overviewMapControl: false,
    scrollwheel: false,
    styles: mapstyles
  }

  map = new google.maps.Map(document.getElementById("gmap"), mapOptions);

  var marker = new google.maps.Marker({
    position: pointLatLng,
    map: map,
    title:mapPoint.linkText,
    icon: mapPoint.icon
  });

  var mapLink = 'https://www.google.com/maps/preview?ll='+mapPoint.lat+','+mapPoint.lng+'&z=14&q='+mapPoint.mapAddress;

  var html = '<div class="infowin">'
      + mapPoint.infoText
      + '<a href="'+mapLink+'" target="_blank">'+mapPoint.linkText+'</a>'
      + '</div>';

  google.maps.event.addListener(marker, 'mouseover', function() {
    infoWindow.setContent(html);
    infoWindow.open(map, marker);
  });

  google.maps.event.addListener(marker, 'click', function() {
    window.open(mapLink,'_blank');
  });

}
}
/*============================================
Waypoints Animations
==============================================*/
$('#skills').waypoint(function(){

  $('.skills-item').each(function(){
    $(this).css({'height':$(this).data('height')+'%'});
  })

  $('.skills-bars').css({'opacity':1});

},{offset:'40%'});

$('.scrollimation').waypoint(function(){
  $(this).addClass('in');
},{offset:'90%'});

/*============================================
Resize Functions
==============================================*/
var thumbSize = $('.project-item').width();

$(window).resize(function(){
  $('#home').height($(window).height()+50);

  if($('.project-item').width() != thumbSize){

    $('#projects-container').masonry('reload');
    thumbSize = $('.project-item').width();
  }

  scrollSpyRefresh();
  waypointsRefresh();
});

/*============================================
Refresh scrollSpy function
==============================================*/
function scrollSpyRefresh(){
  setTimeout(function(){
    $('body').scrollspy('refresh');
  },1000);
}

/*============================================
Refresh waypoints function
==============================================*/
function waypointsRefresh(){
  setTimeout(function(){
    $.waypoints('refresh');
  },1000);
}
});

$(document).ready(function() {
$('#contact-form').submit(function() {

  var buttonCopy = $('#contact-form button').html(),
    errorMessage = $('#contact-form button').data('error-message'),
    sendingMessage = $('#contact-form button').data('sending-message'),
    okMessage = $('#contact-form button').data('ok-message'),
    hasError = false;

  $('#contact-form .error-message').remove();

  $('.requiredField').each(function() {
    if($.trim($(this).val()) == '') {
      var errorText = $(this).data('error-empty');
      $(this).parent().append('<span class="error-message" style="display:none;">'+errorText+'.</span>').find('.error-message').fadeIn('fast');
      $(this).addClass('inputError');
      hasError = true;
    } else if($(this).is("input[type='email']") || $(this).attr('name')==='email') {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      if(!emailReg.test($.trim($(this).val()))) {
        var invalidEmail = $(this).data('error-invalid');
        $(this).parent().append('<span class="error-message" style="display:none;">'+invalidEmail+'.</span>').find('.error-message').fadeIn('fast');
        $(this).addClass('inputError');
        hasError = true;
      }
    }
  });

  if(hasError) {
    $('#contact-form button').html('<i class="fa fa-times"></i>'+errorMessage);
    setTimeout(function(){
      $('#contact-form button').html(buttonCopy);
    },2000);
  }
  else {
    $('#contact-form button').html('<i class="fa fa-spinner fa-spin"></i>'+sendingMessage);

    var formInput = $(this).serialize();
    $.post($(this).attr('action'),formInput, function(data){
      $('#contact-form button').html('<i class="fa fa-check"></i>'+okMessage);

      $('#contact-form')[0].reset();

      setTimeout(function(){
        $('#contact-form button').html(buttonCopy);
      },2000);

    });
  }

  return false;
});
});
</script>
