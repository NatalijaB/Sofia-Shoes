const urlCat = '/sofia-shoes/categories/';
$(document).ready(function () {

    // L I S T I N G

    ajaxGetAllCat();

    // FORM DISPLAY (srediti)

    $('#addCat').click(() => {
        $('.addCat').show();
    })

    $('#closeAddCat').click(() => {
        $('.addCat').hide();
    });

    $('#closeUpdateCat').click(() => {
        localStorage.clear();
        $('.updateCat').hide();
    })



    // A D D I N G 

    $('#addBtn').click(() => {
        let serverUrl = '/sofia-shoes/categories';
        let name = $('#name');
        let data = {
            'Name': name.val().trim(),
        };
        ajaxPostCat(serverUrl, data);
        $('.addCat').hide();
    });


    // U P D A T I N G


    let catId;
    $(document).on('click', '.cat-edit', function () {

        window.localStorage.setItem('catId', this.dataset.id);

        catId = window.localStorage.getItem('catId');
        ajaxGetCat(catId);

        $('.updateCat').show();
    });

    $('#updateBtn').click(() => {
        
        catId = window.localStorage.getItem('catId');
        let serverUrl = urlCat + catId;
        let updateName = $('#updateName');
        let data = {
            'Name': updateName.val().trim(),
            'Id': catId
        };
        ajaxPostCat(serverUrl, data);
        $('.updateCat').hide();
    })



});



// functions


function ajaxPostCat(url, data) {

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


function ajaxGetCat(id) {

    $.ajax({
        url: '/sofia-shoes/categories/' + id,
        success: (resp) => {
            console.log(resp)
            name = resp[0].Name;
            $('#updateName').val(name);
        }
    })
}


function ajaxGetAllCat() {
    $.ajax({
        url: '/sofia-shoes/categories',
        success: (resp) => {
            let categories = resp;
            categories.forEach(e => {
                let tableContent = createCat(e.Name, e.Id);
                $('#catTableBody').append(tableContent);
            });
            $('#catTable').DataTable();
        }
    });
}


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