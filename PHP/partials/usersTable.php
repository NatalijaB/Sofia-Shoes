<section id="users">
    <div class="container m-auto p-5 myTable">
        <h1>Users:</h1>
        <table id="usersTable" class="cell-border stripe order-column hover">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Created By:</th>
                    <th>Created At:</th>
                    <th>Updated By:</th>
                    <th>Updated At:</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="usersTableBody">
            </tbody>
        </table>
        <button role="button" class="btn btn-info usersBtn" id="addUsers">Add A User</button>

        <!-- popup add form -->

        <div class="modal addUsers hideForm">
            <div class="modal-content">
                <button type="button" class="close" aria-label="Close" id="closeAddUsers">
                    <span aria-hidden="true">&#10006;</span>
                </button>
                <form id="usersFormAdd">
                    <h2>Add User:</h2>
                    <div class="form-group">
                        <label for="fname">First name:</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last name:</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <button id='addUsersBtn' name="addUser" type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>


        <!-- popup update form -->

        <div class="modal updateUsers hideForm">
            <div class="modal-content">
                <button type="button" class="close" aria-label="Close" id="closeUpdateUsers">
                    <span aria-hidden="true">&#10006;</span>
                </button>
                <form id="usersFormUpdate">
                    <h2>Update User:</h2>
                    <div class="form-group">
                        <label for="updatefName">First name:</label>
                        <input type="text" class="form-control" id="updatefName" name="updatefName" required>
                    </div>
                    <div class="form-group">
                        <label for="updatelName">Last name:</label>
                        <input type="text" class="form-control" id="updatelName" name="updatelName" required>
                    </div>
                    <div class="form-group">
                        <label for="updateUsername">Username:</label>
                        <input type="text" class="form-control" id="updateUsername" name="updateUserName" required>
                    </div>
                    <div class="form-group">
                        <label for="updateEmail">Email:</label>
                        <input type="email" class="form-control" id="updateEmail" name="updateEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="updatePassword">Password:</label>
                        <input type="password" class="form-control" id="updatePassword" name="updatePassword" required>
                    </div>
                    <button id='updateUsersBtn' type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>

        <!-- popup delete -->
        <div class="modal delUsers">
            <div class="modal-content">
                <button type="button" class="close" aria-label="Close" id="closeDelUsers">
                    <span aria-hidden="true">&#10006;</span>
                </button>
                <h4>Are you sure you want to delete this user?</h4>
                <br><br><br>
                <button id="delUsersBtn" type="submit" class="btn btn-info">Delete</button>
            </div>
        </div>
    </div>
</section>