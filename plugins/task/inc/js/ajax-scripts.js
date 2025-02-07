jQuery(document).ready(function($) {
    $('#fetch-projects').on('click', function() {
        $.ajax({
            url: ajax_object.ajax_url, 
            type: 'POST',
            data: {
                action: 'get_projects' 
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    console.log(response.data);
                    
                    let output = '<ul class="project-list-ul">';
                    response.data.forEach(project => {
                        output += `<li class="project-list-li"><a href="${project.link}">${project.title}</a></li>`;
                    });
                    output += '</ul>';
                    $('#project-list').html(output);
                }
            },
            error: function(error) {
                console.log("AJAX Error:", error);
            }
        });
    });
});