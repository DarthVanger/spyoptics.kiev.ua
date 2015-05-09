<!-- footer/minimal view
 -	 Minimal footer, containing closing </body> and </html> tags, and the scripts.
-->

<!-- social buttons initialization -->
<script type="text/javascript">
  var SOCIAL_BUTTONS_LOAD_DELAY = 500;
  var SOCIAL_BUTTONS_LOAD_INTERVAL= 100;
  var ONE_SOCIAL_BUTTON_LOAD_TIME = 500;

/* Set a lot of timeouts in an effort to make process of social buttons loading not so laggy */
  document.addEventListener("DOMContentLoaded", function(event) {
      var viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
      if (viewportWidth >= 1280) {
          setTimeout(function() {
             loadScript('<?=TOOLS?>socialAPI/vk.js', function() {
                 setTimeout(function() {
                     loadScript('<?=TOOLS?>socialAPI/vk_share.js', function() {
                         setTimeout(function() {
                             loadScript('<?=TOOLS?>socialAPI/google.js', function() {
                                 setTimeout(function() {
                                    /* VK like */
                                    VK.init({apiId: 4806597, onlyWidgets: true});
                                    VK.Widgets.Like("vk_like", {
                                        type: "mini",
                                        pageUrl: 'http://spyoptics.kiev.ua',
                                        pageTitle: 'Очки Spyoptic',
                                        pageDescription: 'Интернет магазин стильных очков компании Spyoptic',
                                        pageImage: '<?=IMG?>vk-share-post-img.jpg'
                                    });
                                    setTimeout(function() {
                                        /* VK share */
                                        document.getElementById("vk_share").innerHTML = (VK.Share.button(false, {
                                            type: "round_nocount",
                                            text: "Поделиться",
                                            url: 'http://spyoptics.kiev.ua',
                                            title: 'Очки Spyoptic',
                                            description: 'Интернет магазин стильных очков компании Spyoptic',
                                            image: "<?=IMG?>vk-share-post-img.jpg",
                                            noparse: "true"
                                        }));
                                     }, ONE_SOCIAL_BUTTON_LOAD_TIME);
                                    setTimeout(function() {
                                        /* Facebook Like button */
                                          window.fbAsyncInit = function() {
                                            FB.init({
                                              appId      : '1418072338493352',
                                              xfbml      : true,
                                              version    : 'v2.2'
                                            });
                                          };
                                     }, ONE_SOCIAL_BUTTON_LOAD_TIME * 2);

                                    setTimeout(function() {
                                          (function(d, s, id){
                                             var js, fjs = d.getElementsByTagName(s)[0];
                                             if (d.getElementById(id)) {return;}
                                             js = d.createElement(s); js.id = id;
                                             js.src = "<?=TOOLS?>socialAPI/fb.js";
                                             fjs.parentNode.insertBefore(js, fjs);
                                           }(document, 'script', 'facebook-jssdk'));
                                     }, 500);
                                 }, ONE_SOCIAL_BUTTON_LOAD_TIME * 3);
                             });
                         }, SOCIAL_BUTTONS_LOAD_INTERVAL);
                     });
                 }, SOCIAL_BUTTONS_LOAD_INTERVAL);
             });
          }, SOCIAL_BUTTONS_LOAD_DELAY);
      } // end if
  }); // end 'on dom loaded' listener

    /**
     * Dynamically load script.
     * Copied from stackoverflow: http://stackoverflow.com/questions/950087/include-a-javascript-file-in-another-javascript-file
     */
    function loadScript(url, callback)
    {
        // Adding the script tag to the head as suggested before
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = url;

        // Then bind the event to the callback function.
        // There are several events for cross browser compatibility.
        script.onreadystatechange = callback;
        script.onload = callback;

        // Fire the loading
        head.appendChild(script);
    }
</script>

</body>
</html>
