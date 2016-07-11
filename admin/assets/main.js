       $(document).ready(function () {

           $('#nav-icon3').click(function () {
               $('.side-nav').toggleClass('sidenav_left')
               $('.admin_panel').toggle();
           });

           $(".side-nav li").click(function () {
               $('.side-nav').removeClass('sidenav_left');
               $("#nav-icon3").removeClass('open');
               $('.admin_panel').hide();
           });
           
            $(".admin_panel").click(function () {
               $('.side-nav').removeClass('sidenav_left');
               $("#nav-icon3").removeClass('open');
               $('.admin_panel').hide();
           });

           $('#nav-icon3').click(function () {
               $(this).toggleClass('open');
           });

           $('select').material_select();
           $('.datepicker').pickadate({
               selectMonths: true, // Creates a dropdown to control month
               selectYears: 15 // Creates a dropdown of 15 years to control year
           });
       });
