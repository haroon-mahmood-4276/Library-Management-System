$(document).ready(function () {

    $("#AddBook").click(function (event) {

        var button = $(event.relatedTarget)
        var txtBookID = " "
        var txtBookTitle = " "
        var txtBookAuthor = " "
        var modalworking = " "

        var modal = $(this)
        modal.find('.modal-body #txtBookID').val(txtBookID)
        modal.find('.modal-body #txtBookTitle').val(txtBookTitle)
        modal.find('.modal-body #txtBookAuthor').val(txtBookAuthor)
        modal.find('.modal-body #modalworking').val(modalworking)

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


    $('#AddBookModal').on('show.bs.modal', function (event) {
        GetRacks();
        var button = $(event.relatedTarget)
        var txtBookID = button.data('bookid')
        var txtBookTitle = button.data('booktitle')
        var txtBookAuthor = button.data('bookauthor')
        var modalworking = button.data('modalworking')

        var modal = $(this)
        modal.find('.modal-body #txtBookID').val(txtBookID)
        modal.find('.modal-body #txtBookTitle').val(txtBookTitle)
        modal.find('.modal-body #txtBookAuthor').val(txtBookAuthor)
        modal.find('.modal-body #modalworking').val(modalworking)
        console.log(modalworking)
      })

});
