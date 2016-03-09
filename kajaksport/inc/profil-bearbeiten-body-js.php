
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/myjs.js"></script>

<!-- Hide Dropdown Menu -->
<script>
    $('.navbar-collapse a:not(.dropdown-toggle)').click(function(){
        if($(window).width() < 768 )
            $('.navbar-collapse').collapse('hide');
    });
</script>

<script>
$('#accordion1').collapse({
toggle: false
}).on('show',function (e) {
$(e.target).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("icon-chevron-up");
}).on('hide', function (e) {
$(e.target).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("icon-chevron-down");
});
</script>