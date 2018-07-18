
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="js/bootstrap.js"></script>
  <script type="text/javascript">
      $(window).on('scroll', function() {
          if ($(window).scrollTop()) {
              $('nav').addStye('black');
          } else {
              $('nav').removeClass('black');
          }
      })
  </script>
</body>

</html>