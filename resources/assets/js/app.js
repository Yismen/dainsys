/**
 * Search thru every date field and apply the datepicker function
 * @param  {$} $ jquery Object
 */
(function($) {
  $(document).ready(function() {

    $.fn.dataTable.ext.errMode = 'none';
    
    $('.main-spinner').hide();

		$.each($('select,input,textarea'), function(index, val) {
      var el = $(val);
      var elType = $(el).prop('localName');
      var inputType = $(el).prop('type');

      /**
       * Apply datepicker plugin to all the input with the type of date in the app
       */
      if(inputType == 'date') {
        el.datepicker({
          format: 'yyyy-mm-dd',
          todayHighlight: true,
          todayBtn: true,
        });
      }

      /**
       * Apply select2 plugin to all the selects in the app
       */
      if(elType == 'select') {
        el.select2({
          theme: "bootstrap",
          allowClear: true,
          placeholder: 'Select an option',
          dropdownAutoWidth: 'true',
        });
      }

      /**
       * Apply iCheck plugin to all the inputs in the app.
       * The plugin will only pick checkboxes and radios
       */
      if(elType == 'input') {
        el.iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue'
        });
      }

      /**
       * Apply summernote plugin to all the textareas in the app
       */
      if(elType == 'textarea') {
        el.summernote();
      }
            
    });

	});
})(jQuery);