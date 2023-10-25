/* custom-script.js */

(function($) {
    // Wait for the document to be fully loaded
    $(document).ready(function() {
        // Add a click event handler to a specific element
        $('#custom-button').click(function() {
            alert('You clicked the custom button!');
        });
    });
})(jQuery);