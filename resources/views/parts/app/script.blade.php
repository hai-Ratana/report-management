<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Script to Activate the Carousel -->

    <!-- jQuery -->
    <script type="text/javascript">
    $(window).on('hashchange',function(){
        window.location.hash.replace('#','');

      });

        $(document).on('click','.myreport .pagination a', function(e){

          $('li').removeClass('active');
          $(this).parent('li').addClass('active');
          e.preventDefault();



          var myurl = $(this).attr('href');
          var page_a =$(this).attr('href').split('page_a=')[1];
          getProducts(page_a);

        });
        function getProducts(page){
          $.ajax({
            url: 'ajax/report?page_a=' + page,
            type:'GET',
            success:function(data){
              location.hash = page;
              $('.list').html(data);
            }
          })
        };
        $(document).on('click','.myproject .pagination a', function(e){

          $('li').removeClass('active');
          $(this).parent('li').addClass('active');
          e.preventDefault();



          var myurl = $(this).attr('href');
          var page_b =$(this).attr('href').split('page_b=')[1];
          getB(page_b);

        });
        function getB(page){
          $.ajax({
            url: 'ajax/report?page_b=' + page,
            type:'GET',
            success:function(data){
              location.hash = page;
              $('.list').html(data);
            }
          })
        };






    </script>
