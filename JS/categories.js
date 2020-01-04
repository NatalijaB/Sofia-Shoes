
function createCat(name, id) {
    let category =
        `
        <tr>
        <td>${name}</td>
        <td><i data-id="${id}" class="fa fa-edit fa-2x cat-edit"></i></td>
        <td><i data-id="${id}" class="fa fa-trash fa-2x cat-del"></i></td>
        </tr>
        `
    return category;
}
$(document).ready(function () {

    // L I S T I N G
    $.ajax({
        url: '/sofia-shoes/categories',
        success: function (resp) {
            let categories = resp;
            categories.forEach(e => {
                let tableContent = createCat(e.Name, e.Id);
                $('#catTableBody').append(tableContent);
            });
            $('#catTable').DataTable();
        }
    });


    // FORM DISPLAY (srediti)

    $('#addCat').click(()=>{
        $('.addCat').show();
    })

    $('#closeAddCat').click(()=>{
        $('.addCat').hide();
    });

    $('#closeUpdateCat').click(()=>{
        $('.updateCat').hide();
    })



    // A D D I N G 

    $('#addBtn').click(() => {
        let serverUrl = '/sofia-shoes/categories';
        let name = $('#Name');
        let data = {
            'Name': name.val().trim(),
        };
        ajaxCall(serverUrl, data);
    });


    // U P D A T I N G

    $(document).on('click', '.cat-edit', function () {
        let id = this.dataset.id;
        $('.updateCat').show();


        $('#updateBtn').click(()=>{
            let serverUrl = '/sofia-shoes/categories/' + id;
            let updateName = $('#updateName');
            let data = {
                'Name': updateName.val().trim(),
                'Id' : id
            };
            ajaxCall(serverUrl, data);
            console.log(data)
        })
    });

});



// functions


function ajaxCall (url, data){

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