


  <script type="text/javascript" src="/template/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="/template/js/popper.min.js"></script>
  <script type="text/javascript" src="/template/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/template/js/mdb.min.js"></script>
  <script src="/template/js/jquery.js"></script>
  <script src="/template/js/jquery.scrollUp.min.js"></script>
  <script src="/template/js/price-range.js"></script>
  <script src="/template/js/jquery.prettyPhoto.js"></script>
  <script src="/template/js/main.js"></script>
  <script src="/template/js/jquery.maskedinput.min.js"></script>
  <script src="/template/js/jquery.maskedinput.js"></script>
  <script >
    new WOW().init();
  </script>
  <script>
    $(".mask-phone").mask("+7 (999) 999-99-99");
  </script>
  <script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
    
    $('.carousel').carousel({
touch: true // default
})

</script>
</body>

</html>