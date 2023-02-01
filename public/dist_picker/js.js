$(document).ready(function() {

    $('#datepicker').Zebra_DatePicker();

    $('#datepicker-range-start').Zebra_DatePicker({
       
        pair: $('#datepicker-range-end')
    });

    $('#datepicker-range-end').Zebra_DatePicker({
       
    });

    $('#datepicker-formats').Zebra_DatePicker({
        format: 'M d, Y'
    });

   
    $('#datepicker-on-change').Zebra_DatePicker({
        onChange: function(view, elements) {
            if (view === 'days') {
                elements.each(function() {
                    if ($(this).data('date').match(/\-24$/))
                        $(this).css({
                            background: '#C40000',
                            color:      '#FFF'
                        });
                });
            }
        }
    });

});