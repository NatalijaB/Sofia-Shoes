<section id="shoes">
        <div class="container m-auto p-5 myTable">
            <h1>Shoes:</h1>
            <table id="shoesTable" class="cell-border stripe order-column hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Category</th>
                        <th>Created By:</th>
                        <th>Created At:</th>
                        <th>Updated By:</th>
                        <th>Updated At:</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="shoesTableBody">
                </tbody>
            </table>
            <button role="button" class="btn btn-info shoesBtn" id="addShoes">Add Shoes</button>

            <!-- popup add form -->
            <div class="modal addShoes hideForm">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeAddShoes">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form id="shoesFormAdd">
                        <h2>Add Shoes:</h2>
                        <div class="form-group">
                            <label for="shoesName">Name:</label>
                            <input class="form-control" type="text" id="shoesName" name="Name" placeholder="Write a name.." required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input class="form-control" type="text" id="description" name="Description" placeholder="Write a description.." required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input class="form-control" type="number" id="price" name="Price" placeholder="Price" required>
                        </div>
                        <div class="form-group">
                            <label for="size">Size:</label>
                            <input class="form-control" type="number" id="size" name="Size" placeholder="Size" required>
                        </div>
                        <div class="form-group">
                            <label for="catOptions">Choose Category:</label>
                            <select name="categories" class="form-control" id="catOptions">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="passcode">Passcode</label>
                            <input class="form-control" type="password" id="passcode" name="Passcode" placeholder="Passcode" pattern="([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*" required>
                        </div>
                        <div class="form-group">
                            <label for="imgUrl">Image Url:</label>
                            <input class="form-control" type="text" id="imgUrl" name="ImgUrl" placeholder="Image Url" required>
                        </div>
                        <button id='addShoesBtn' type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>

            <!-- popup update form -->
            <div class="modal updateShoes hideForm">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeUpdateShoes">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form id="shoesFormUpdate">
                        <h2>Update Shoes:</h2>
                        <div class="form-group">
                            <label for="updateShoesName">Name:</label>
                            <input class="form-control" type="text" id="updateShoesName" name="updateShoesName" required>
                        </div>
                        <div class="form-group">
                            <label for="updateDescription">Description:</label>
                            <input class="form-control" type="text" id="updateDescription" name="updateDescription" required>
                        </div>
                        <div class="form-group">
                            <label for="updatePrice">Price:</label>
                            <input class="form-control" type="number" id="updatePrice" name="updatePrice" required>
                        </div>
                        <div class="form-group">
                            <label for="updateSize">Size:</label>
                            <input class="form-control" type="number" id="updateSize" name="updateSize" required>
                        </div>
                        <div class="form-group">
                            <label for="catOptions">Choose Category:</label>
                            <select name="categories" class="form-control" id="updateCatOptions">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="updatePasscode">Passcode:</label>
                            <input class="form-control" type="password" id="updatePasscode" name="updatePasscode" pattern="([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*" required>
                        </div>
                        <div class="form-group">
                            <label for="updateImgUrl">Image Url:</label>
                            <input class="form-control" type="text" id="updateImgUrl" name="updateImgUrl" required>
                        </div>
                        <button id='updateShoesBtn' type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>

            <!-- popup delete -->
            <div class="modal delShoes">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeDelShoes">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <h4>Are you sure you want to delete these shoes?</h4>
                    <br><br><br>
                    <button id="delShoesBtn" type="submit" class="btn btn-info">Delete</button>
                </div>
            </div>
        </div>
    </section>