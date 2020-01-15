<section id="sales">
    <div class="container m-auto p-5 myTable">
        <h1>Sales:</h1>
        <table id="salesTable" class="cell-border stripe order-column hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Created By:</th>
                    <th>Created At:</th>
                    <th>Updated By:</th>
                    <th>Updated At:</th>
                    <th>Add Products:</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="salesTableBody">
            </tbody>
        </table>
        <button role="button" class="btn btn-info salesBtn" id="addSales">Add A Sale</button>

        <!-- popup add form -->

        <div class="modal addSales hideForm">
            <div class="modal-content">
                <button type="button" class="close" aria-label="Close" id="closeAddSales">
                    <span aria-hidden="true">&#10006;</span>
                </button>
                <form id="salesFormAdd">
                    <h2>Add a Sale:</h2>
                    <div class="form-group">
                        <label for="sname">Name:</label>
                        <input type="text" class="form-control" id="sname" name="sname" placeholder="Sale name" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Start date:</label>
                        <input type="date" class="form-control" id="sdate" name="sdate" required>
                    </div>
                    <div class="form-group">
                        <label for="date">End date:</label>
                        <input type="date" class="form-control" id="edate" name="edate" required>
                    </div>
                    <button id='addSalesBtn' type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>


        <!-- popup update form -->

        <div class="modal updateSales hideForm">
            <div class="modal-content">
                <button type="button" class="close" aria-label="Close" id="closeUpdateSales">
                    <span aria-hidden="true">&#10006;</span>
                </button>
                <form id="salesFormUpdate">
                    <h2>Update Sale:</h2>
                    <div class="form-group">
                        <label for="updatesName">Name:</label>
                        <input type="text" class="form-control" id="updatesName" name="updatesName" required>
                    </div>
                    <div class="form-group">
                        <label for="updateSDate">Start Date:</label>
                        <input type="date" class="form-control" id="updateSDate" name="updateSDate" required>
                    </div>
                    <div class="form-group">
                        <label for="updateEDate">End Date:</label>
                        <input type="date" class="form-control" id="updateEDate" name="updateEDate" required>
                    </div>
                    <button id='updateSalesBtn' type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>

        <!-- popup delete -->
        <div class="modal delSales">
            <div class="modal-content">
                <button type="button" class="close" aria-label="Close" id="closeDelSales">
                    <span aria-hidden="true">&#10006;</span>
                </button>
                <h4>Are you sure you want to delete this sale?</h4>
                <br><br><br>
                <button id="delSalesBtn" type="submit" class="btn btn-info">Delete</button>
            </div>
        </div>

        <!-- add items form -->
        <div class="modal addItems">
            <div class="modal-content">
                <button type="button" class="close" aria-label="Close" id="closeAddItems">
                    <span aria-hidden="true">&#10006;</span>
                </button>
                <h2>Choose shoes for sale:</h2>
                <form id="items">
                    <div class="form-row align-items-center">
                    </div>
                </form>
                <button id="addItemsBtn" type="submit" class="btn btn-info">Submit</button>
            </div>
        </div>
    </div>
</section>