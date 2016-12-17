<!DOCTYPE html>
<html>
<footer class="site-footer">
          <div class="text-center">
              2016 &copy; Kindergarten by Nobi.vn.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
 <!-- js placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery.js"></script>
   <script src="../../js/owl.carousel.js" ></script>
    <script src="../../js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../../js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <!--DateTime Picker-->
    <script src="../../js/moment.js"></script>
    <script src="../../js/bootstrap-datetimepicker.min.js"></script>
    <script src="../../js/bootstrap-datetimepicker.js"></script>
    <script src="../../js/bootstrap-datepicker.js"></script>

  <script class="include" type="text/javascript" src="../../js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../js/jquery.scrollTo.min.js"></script>
    <script src="../../js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../../js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="../../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    
    <script src="../../js/jquery.customSelect.min.js" ></script>
    <script src="../../assets/chart-master/Chart.js"></script>
    <script src="../../js/respond.min.js" ></script>
    <script type="text/javascript" language="javascript" src="../../assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../../assets/data-tables/DT_bootstrap.js"></script>
    

   
    <!--dynamic table initialization -->
    <script src="../../js/dynamic_table_init.js"></script>

    <!--right slidebar-->
    <script src="../../js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="../../js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="../../js/sparkline-chart.js"></script>
    <script src="../../js/easy-pie-chart.js"></script>
    <script src="../../js/count.js"></script>    <!-- ... -->
  
 
  
  
  <script>

          //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
              autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      $(window).on("resize",function(){
          var owl = $("#owl-demo").data("owlCarousel");
          owl.reinit();
      });
      
    
   $(function() {
    $("body").delegate("#datetimepicker1", "focusin", function(){
        $(this).datetimepicker(
        {
          format: 'DD-MM-YYYY'
        });       
        });
    });
    $(function() {
    $("body").delegate("#datetimepicker2", "focusin", function(){
        $(this).datetimepicker(
        {
          format: 'DD-MM-YYYY' 
        });       
        });
    });

    var img = new Image();
    img.src = '../../img/avatar-mini.jpg';
    img.onload = function(){

      var ctx = document.getElementById('pie').getContext('2d');
        
        var chart = Chart(ctx,{
         type: 'pie',
         data: [1,2,4],
    options: {
       responsive: false
    }
          
    } )
      };


      
  </script>
    

 

</html>