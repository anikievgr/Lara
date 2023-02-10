
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    @section('scrtipts')
        
   
      <script src="{{asset('style/pageAdmin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('style/pageAdmin/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('style/pageAdmin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/blockui/jquery.blockUI.min.js')}}"></script>
    <script src="{{asset('style/pageAdmin/assets/js/app.js')}}"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('style/pageAdmin/plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('style/pageAdmin/assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('style/pageAdmin/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('style/pageAdmin/plugins/counter/jquery.countTo.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
   
    @section('scriptAdd')
        
    @show
 @show
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>
</html>