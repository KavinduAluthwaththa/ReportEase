$(document).ready(function() {
    // Initialize dropdown
    $('.dropdown-toggle').dropdown();
    
    // Handle dropdown item clicks
    $('.dropdown-item').click(function(e) {
        e.preventDefault();
        var action = $(this).attr('value');
        var form = $(this).closest('form');
        
        // Create hidden input for the action
        var hiddenInput = $('<input>').attr({
            type: 'hidden',
            name: 'action',
            value: action
        });
        
        // Remove any existing action input
        form.find('input[name="action"]').remove();
        
        // Add the new action input and submit
        form.append(hiddenInput);
        form.submit();
    });
});
