$(document).ready(() => {
        //Archive
        var newestFirst = true;
        if (reverse[0] == 1) {
            newestFirst = false;
        }
        $('#toggle-order').click(() => {
            console.log('please toggle')

            //button words
            switch (newestFirst) {
                case true:
                    newestFirst = false; 
                    break;
                case false:
                    newestFirst = true;
                    break;
            }
            // console.log(newestFirst);
            if (newestFirst) {
                $('#toggle-order').html('Oldest to Newest');
            } else {
                $('#toggle-order').html('Newest to Oldest');
            }
            //results
            var archive_results = archive_results_array.reverse();
            $('.archive-results').html(archive_results);
        })
    
})