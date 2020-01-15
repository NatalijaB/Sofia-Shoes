<section id="categories">
        <div class="container m-auto p-5 myTable">
            <h1>Categories:</h1>
            <table id="catTable">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Created By:</th>
                        <th>Created At:</th>
                        <th>Updated By:</th>
                        <th>Updated At:</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="catTableBody">
                </tbody>
            </table>
            <button role="button" class="btn btn-info catBtn" id="addCat">Add A Category</button>

            <!-- popup add form -->

            <div class="modal addCat">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeAddCat">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form id="catFormAdd">
                        <h2>Add Category:</h2>
                        <div class="form-group">
                            <label for="name">Category name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Write a name..." required />
                        </div>
                        <button id='addBtn' type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>


            <!-- popup update form -->

            <div class="modal updateCat">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeUpdateCat">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form id="catFormUpdate">
                        <h2>Update Category:</h2>
                        <div class="form-group">
                            <label for="updateName">Category name:</label>
                            <input type="text" class="form-control" id="updateName" name="updateName" required>
                        </div>
                        <button id='updateBtn' type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>

            <!-- popup delete -->

            <div class="modal delCat">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeDelCat">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <h4>Are you sure you want to delete this category?</h4>
                    <br><br><br>
                    <button id="delBtn" type="submit" class="btn btn-info">Delete</button>
                </div>
            </div>
        </div>
    </section>