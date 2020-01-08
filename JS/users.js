const urlUsers = '/sofia-shoes/users'

$(document).ready(() => {

    // L I S T I N G
    ajaxGetAllUsers();


    // FORM DISPLAY (srediti)

    $('#addUsers').click(()=>{
        $('.addUsers').show();
    })

    $('#closeAddUsers').click(()=>{
        $('.addUsers').hide();
    });

    $('#closeUpdateUsers').click(()=>{
        $('.updateUsers').hide();
    })



    // A D D I N G 

    $('#addUsersBtn').click(() => {;

        let fname = $('#fname');
        let lname = $('#lname');
        let username = $('#username');
        let email = $('#email');
        let password = $('#password');
        let data = {
            'FirstName': fname.val().trim(),
            'LastName': lname.val().trim(),
            'Username': username.val().trim(),
            'Email': email.val().trim(),
            'Password': password.val().trim(),
        };
        ajaxPostUsers(urlUsers, data);
        console.log(data);
        $('.addUsers').hide();
    });


    // U P D A T I N G
    let usersId;
    $(document).on('click', '.users-edit', function () {
        
        window.localStorage.setItem('usersId', this.dataset.id);
        usersId = window.localStorage.getItem('usersId');
        ajaxGetUsers(usersId);
        $('.updateUsers').show();


        $('#updateUsersBtn').click(()=>{
            usersId = window.localStorage.getItem('usersId');
            let serverUrl = `${urlUsers}/${usersId}`;
            
            let updatefName = $('#updatefName');
            let updatelName = $('#updatelName');
            let updateUsername = $('#updateUsername');
            let updateEmail = $('#updateEmail');
            let updatePassword = $('#updatePassword');
            let data = {
                'FirstName': updatefName.val().trim(),
                'LastName': updatelName.val().trim(),
                'Username': updateUsername.val().trim(),
                'Email': updateEmail.val().trim(),
                'Password': updatePassword.val().trim(),
            };
            ajaxPostUsers(serverUrl, data);
            console.log(data)
            $('.updateUsers').hide();
        })
    });

    // D E L E T I N G 

    $(document).on('click', '.users-del', function () {

        window.localStorage.setItem('usersId', this.dataset.id);
        usersId = window.localStorage.getItem('usersId');
        $('.delUsers').show();
    });

    $('#delUsersBtn').click(() => {
        
        usersId = window.localStorage.getItem('usersId');
        let serverUrl = `${urlUsers}/${usersId}`;
        ajaxDelUsers(serverUrl);
        $('.delUsers').hide();
    })

});



// functions


function ajaxPostUsers (url, data){

    $.ajax({
        type: 'POST',
        url: url,
        data: JSON.stringify(data),
        dataType: "application/json",
        contentType: "application/json; charset=utf-8",
        success: function (serverResponse) {
            console.log(serverResponse);
        },
        error: function (e) {
            console.log(e);
        }
    });
}

function ajaxGetAllUsers(){
    $.ajax({
        url: urlUsers,
        success: function (resp) {
            let users = resp;
            users.forEach(e => {
                let tableContent = createUsers(e.FirstName, e.LastName, e.Username, e.UsersId);
                $('#usersTableBody').append(tableContent);
            });
            $('#usersTable').DataTable();
        }
    });
}

function ajaxGetUsers (id){

    $.ajax({
        url: `${urlUsers}/${id}`,
        success: ( resp )=>{
            
            fname = resp[0].FirstName;
            lname = resp[0].LastName;
            username = resp[0].Username;
            email = resp[0].Email;
            password = resp[0].Password;


            $('#updatefName').val(fname);
            $('#updatelName').val(lname);
            $('#updateUsername').val(username);
            $('#updateEmail').val(email);
            $('#updatePassword').val(password);
        }
    })
}

function ajaxDelUsers (url){
    $.ajax({
        type:"DELETE",
        url: url,
        success: (resp)=>{
            console.log(resp);
        },
        error: (e)=>{
            console.log(e)
        }
    })
}


function createUsers(fname, lname, username, id) {
    let users =
        `
        <tr>
        <td>${fname}</td>
        <td>${lname}</td>
        <td>${username}</td>
        <td><i data-id="${id}" class="fa fa-edit fa-2x users-edit"></i></td>
        <td><i data-id="${id}" class="fa fa-trash fa-2x users-del"></i></td>
        </tr>
        `
    return users;
}