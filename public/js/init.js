(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('#sidenav-overlay').css('opacity: 0');
    $('select').material_select();
    $('input#text').characterCounter();
    var ss= new Date();
      $('.datepicker').pickadate({
          selectMonths: true,
          selectYears: true,
          yearRange: [50],// Creates a dropdown to control month
          format: 'yyyy-mm-dd',
          today: 'Today',
          clear: 'Clear',
          close: 'Ok',
          min: [1960,1,1],
          max: new Date(),
          closeOnSelect: false // Close upon selecting a date,
      });
      $('.timepicker').pickatime({
          default: 'now', // Set default time: 'now', '1:30AM', '16:30'
          fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
          twelvehour: false, // Use AM/PM or 24-hour format
          donetext: 'OK', // text for done-button
          cleartext: 'Clear', // text for clear-button
          canceltext: 'Cancel', // Text for cancel-button
          autoclose: false, // automatic close timepicker
          ampmclickable: true, // make AM PM clickable
          aftershow: function(){} //Function for after opening timepicker
      });

  });

    $('a[href*=#]').click(function(event){
        if ($.attr(this, 'href').localeCompare("#")!==0){
            $('html, body').animate({
                scrollTop: $( $.attr(this, 'href') ).offset().top
            }, 500);
            event.preventDefault();
        }
    });// end of document ready

    $('.dropdown-button').dropdown({
            inDuration: 300,
            outDuration: 225,
            constrainWidth: false, // Does not change width of dropdown to that of the activator
            hover: false, // Activate on hover
            gutter: 0, // Spacing from edge
            belowOrigin: true, // Displays dropdown below the button
            alignment: 'right', // Displays dropdown with edge aligned to the left of button
            stopPropagation: false // Stops event propagation
        }
    );
    var slider=$('.slider');
    slider.slider({
        height: 150,
        indicators: false
    });
    slider.slider('pause');

})(jQuery); // end of jQuery name space