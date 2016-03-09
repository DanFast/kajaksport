
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/myjs.js"></script>

<script src="js/bootstrap-datepicker.js"></script>

<!-- Smooth Scrolling -->
<script>
    $(function() {
        $('a[href*=#]:not([href=#]):not(.carousel-control)').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && 	location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({scrollTop: target.offset().top}, 1000);
                    return false;
                }
            }
        });
    });
</script>

<!-- Hide Dropdown Menu -->
<script>
    $('.navbar-collapse a:not(.dropdown-toggle)').click(function(){
        if($(window).width() < 768 )
            $('.navbar-collapse').collapse('hide');
    });
</script>

<!-- DatePicker -->
<script>
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('#dpd1').datepicker({
        format:'dd.mm.yyyy',
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        if (ev.date.valueOf() >= checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate());
            checkout.setValue(newDate);
        }
        checkin.hide();

    }).data('datepicker');
    var checkout = $('#dpd2').datepicker({
        format:'dd.mm.yyyy',
        onRender: function(date) {
            return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        checkout.hide();
    }).data('datepicker');

</script>
