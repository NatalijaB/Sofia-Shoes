const urlCat = '/sofia-shoes/categories';
$(document).ready(() => {

    // L I S T I N G

    ajaxGetAllCat();

    // FORM DISPLAY
    $('#addCat').click(() => {
        $('.addCat').show();
    })
    $('#closeAddCat').click(() => {
        $('.addCat').hide();
    });

    $('#closeUpdateCat').click(() => {
        $('.updateCat').hide();
    })
    $('#closeDelCat').click(() => {
        $('.delCat').hide();
    })



    // A D D I N G 

    $("#catFormAdd").validate({
        rules: {
            name: "required",
        },
        messages: {
            name: "Please enter name of the category",
        },
        submitHandler: function (form) {
            form.submit();
            let name = $('#name');
            let data = {
                'CatName': name.val().trim(),
                'CreatedBy': userid,
            };
            post(urlCat, data);
            $('.addCat').hide();
        }
    });



    // U P D A T I N G


    let catId;

    $(document).on('click', '.cat-edit', function () {

        window.localStorage.setItem('catId', this.dataset.id);
        catId = window.localStorage.getItem('catId');

        ajaxGetCat(catId);

        $('.updateCat').show();
    });

    $("#catFormUpdate").validate({
        rules: {
            updateName: "required",
        },
        messages: {
            updateName: "Please enter name of the category",
        },
        submitHandler: function (form) {
            form.submit();

            catId = window.localStorage.getItem('catId');

            let serverUrl = `${urlCat}/${catId}`;
            let updateName = $('#updateName');
            let data = {
                'CatName': updateName.val().trim(),
                'CatId': catId,
                'UpdatedBy': userid,
            };
            postData(serverUrl, data);
            $('.updateCat').hide();
        }
    });


    // D E L E T I N G 

    $(document).on('click', '.cat-del', function () {

        window.localStorage.setItem('catId', this.dataset.id);
        catId = window.localStorage.getItem('catId');
        
        $('.delCat').show();
    });

    $('#delBtn').off('click').on('click', () => {

        catId = window.localStorage.getItem('catId');
        let serverUrl = `${urlCat}/${catId}`;
        let data = {
            'DeletedBy': userid,
            'CatId': catId,
        }
        deleteData(serverUrl, data);
        $('.delCat').hide();
    })

})





// functions


function ajaxGetCat(id) {

    $.ajax({
        url: `${urlCat}/${id}`,
        success: (resp) => {
            console.log(resp)
            name = resp[0].CatName;
            $('#updateName').val(name);
        }
    })
}


function ajaxGetAllCat() {
    $.ajax({
        url: urlCat,
        success: (resp) => {
            let categories = resp;
            categories.forEach(e => {
                let tableContent = createCat(e.CatName, e.CatId, e.cUsername, e.cDate, e.uUsername, e.uDate);
                $('#catTableBody').append(tableContent);
                $('#updateCatOptions').append($('<option>', { value: e.CatId, text: e.CatName }));
                $('#catOptions').append($('<option>', { value: e.CatId, text: e.CatName }));
                $('#catF').append($('<option>', { value: e.CatId, text: e.CatName }));
            });
            $('#catTable').DataTable();
        }
    });
}


function createCat(name, id, cUsername, cDate, uUsername, uDate) {
    let category =
        `
        <tr>
        <td>${name}</td>
        <td>${cUsername}</td>
        <td>${cDate}</td>
        <td>${uUsername}</td>
        <td>${uDate}</td>
        <td><i data-id="${id}" class="fa fa-edit fa-2x cat-edit"></i></td>
        <td><i data-id="${id}" class="fa fa-trash fa-2x cat-del"></i></td>
        </tr>
        `
    return category;
}
