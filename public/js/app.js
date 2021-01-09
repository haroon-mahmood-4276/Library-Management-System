$(document).ready(function () {

    $("#AddBook").click(function (event) {
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
                console.log("here");
                $('#cbRacks').html(Data);
            }
        });
    };
});
