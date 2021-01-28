<? php 


?>


<!-- FOOTER -->
    <div id="footer">
        <p>&copy; E-Voting 2021. &nbsp;Developed by <a class="app-developer" href="">Paul Eshun </a>&nbsp;</p>
    </div>
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->
    <script src="../admin/assets/js/jquery-2.0.3.min.js"></script>
     <script src="../admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../admin/assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="../admin/assets/plugins/flot/jquery.flot.js"></script>
    <script src="../admin/assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../admin/assets/plugins/flot/jquery.flot.time.js"></script>
     <script  src="../admin/assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="../admin/assets/js/for_index.js"></script>
   
    <script src="../admin/assets/plugins/jquery-steps-master/lib/jquery.cookie-1.3.1.js"></script>
    <script src="../admin/assets/plugins/jquery-steps-master/build/jquery.steps.js"></script>   
    <script src="../admin/assets/js/WizardInit.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!--    add on-page loading script effect-->
     <script>
        var preloader = document.getElementById('loader');
        function displayLoader(){
            preloader.style.display = 'none';
        }
        setTimeout(function(){
            $('.loading').fadeToggle();
        }, 1000);
    </script>
    

    
</body>
 <!-- END BODY -->
</html>