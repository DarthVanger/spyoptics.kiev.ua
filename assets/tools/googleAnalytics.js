// Google's script to track pages with Google Analytics
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  // UA-33871645-5 for real statistics
  //ga('create', 'UA-33871645-5', 'spyoptics.kiev.ua');

   //UA-33871645-6 for sandbox
  ga('create', 'UA-33871645-6', 'spyoptics.kiev.ua');

  //for testing on localhost
  //ga('create', 'UA-33871645-6', {
  //  'cookieDomain': 'none'  
  //  });

  ga('send', 'pageview');
