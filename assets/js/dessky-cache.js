jQuery(document).ready(
    function($) {

        $('.edit-dessky-cache-action', '#misc-publishing-actions').click(
            function(e) {
                $(this)
                    .next(':hidden')
                    .slideDown('fast')
                    .end()
                    .hide();

                e.preventDefault();
            }
        );

        $('.save-dessky-cache-action', '#misc-publishing-actions').click(
            function(e) {
                $(this)
                    .parent()
                    .slideUp('fast')
                    .prev(':hidden')
                    .show();

                $('#output-dessky-cache-action').text(
                    $('#dessky_cache_action').children('option:selected').text()
                );

                e.preventDefault();
            }
        );

        $('.cancel-dessky-cache-action', '#misc-publishing-actions').click(
            function(e) {
                $(this)
                    .parent()
                    .slideUp('fast')
                    .prev(':hidden')
                    .show();

                e.preventDefault();
            }
        );
    }
);
