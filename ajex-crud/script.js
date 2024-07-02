$(document).ready(function(){
    // Load existing data on page load
    loadData();

    // Add new data
    $('#addForm').submit(function(event){
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'process.php',
            data: formData,
            success: function(response){
                alert(response);
                loadData();
                $('#addForm')[0].reset();
            }
        });
    });

    // Delete data
    $(document).on('click', '.delete', function(){
        var id = $(this).data('id');
        if(confirm("Are you sure you want to delete this record?")){
            $.ajax({
                type: 'POST',
                url: 'process.php',
                data: {id: id, action: 'delete'},
                success: function(response){
                    alert(response);
                    loadData();
                }
            });
        }
    });
});

// Function to load data from the server
function loadData() {
    $.ajax({
        type: 'GET',
        url: 'process.php',
        success: function(response){
            $('#dataContainer').html(response);
        }
    });
}
