<div class="modal fade bd-example-modal-lg" id="AddBookModal" tabindex="-1" role="dialog" data-backdrop="static"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
           <form method="POST" action="/admin/books/add" name="addBook">
            @csrf
                <!-- Modal Header -->
                <div class="modal-header bg-UNi">
                    <h4 class="modal-title mr-auto">Add Book</h4>
                    <button type="button" class="ml-2 btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                <!-- <div class="divider"></div> -->
                <!-- Modal body -->
                <div class="modal-body">
                    <div>
                        <div class="card card-animation my-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="cbRacks">Racks</label>
                                        <select name="cbRacks" class="custom-select d-block" id="cbRacks" required>
                                            <option value="0" selected>Select</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="txtBookID">Book ID</label>
                                        <input type="text" class="form-control" id="txtBookID" name="txtBookID"
                                            maxlength="50" placeholder="Book ID" value="" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="txtBookTitle">Book Title</label>
                                        <input type="text" class="form-control" id="txtBookTitle" name="txtBookTitle"
                                            placeholder="Book Title" maxlength="50" value="" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="txtBookAuthor">Book Author</label>
                                        <input type="text" class="form-control" id="txtBookAuthor" name="txtBookAuthor"
                                            placeholder="Book Author" value="" maxlength="50" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="txtBookPublishedYear">Published Year</label>
                                        <input type="date" class="form-control" id="txtBookPublishedYear" name="txtBookPublishedYear"
                                            placeholder="Book Abbrivation" value="" maxlength="50" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer bg-UNi">
                    <input type="submit" class="btn btn-UNi" name="submit" value="Save" />
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
