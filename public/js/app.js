$(document).ready(function () {

    $("#AddBook").click(function () {
        $("#AddBookModal").modal();
        GetRacks();
    });

    $("#AddRack").click(function () {
        $("#AddRackModal").modal();
    });

    function GetRacks() {

        var Data = "";

        $.ajax({
            type: "get",
            url: '/api/racks',
            dataType: 'json',
            success: function (response) {
                Data += '<option value="0" selected>Select</option>';
                for (let index = 0; index < response.length; index++) {
                    Data += '<option value="' + response[index].Rack_ID + '">' + response[index].Rack_Name + '</option>';
                }
                $('#cbRacks').html(Data);
            }
        });
    };

    $("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });


});
