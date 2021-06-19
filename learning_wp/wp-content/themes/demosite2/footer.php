<footer>
    <div id="footer">

        <?php get_template_part('footer-widget'); ?>

        <div id="copyright">
            <p>Copyright: &copy RakibOFC, All Rights Reserved</p>
        </div>
    </div>
</footer>
</div>

<!--Call Latest jQuery and all other Scripts-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var s = $("#menuUp");
        var pos = s.position();
        $(window).scroll(function() {
            var windowpos = $(window).scrollTop();
            if (windowpos >= pos.top) {
                s.addClass("stick");
            } else {
                s.removeClass("stick");
            }
        });
    });
</script>
</body>

</html>