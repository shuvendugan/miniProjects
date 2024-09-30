$(document).ready(function () {
    $('#txtPackage').on('change', function () {
        var selectedValue = $(this).val();
        if (selectedValue) {
            $.ajax({
                url: 'packageDetails.php',
                type: 'POST',
                data: { package_id: selectedValue },
                success: function (response) {
                    $('#serviceList').html(response);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $('#serviceList').html(''); // Clear the result if no option is selected
        }
    });
});