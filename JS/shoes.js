const urlShoes = '/sofia-shoes/shoes'

$(document).ready(() => {

    // L I S T I N G
    ajaxGetAllShoes();


    // FORM DISPLAY (srediti)

    $('#addShoes').click(() => {
        $('.addShoes').show();
    })

    $('#closeAddShoes').click(() => {
        $('.addShoes').hide();
    });

    $('#closeUpdateShoes').click(() => {
        $('.updateShoes').hide();
    })



    // A D D I N G 

    $('#addShoesBtn').click(() => {
        let name = $('#shoesName');
        let description = $('#description');
        let price = $('#price');
        let size = $('#size');
        let passcode = $('#passcode');
        let imgUrl = $('#imgUrl');
        let category = $('#catOptions :selected');
        let data = {
            'ShoesName': name.val().trim(),
            'Description': description.val().trim(),
            'Price': price.val().trim(),
            'Size': size.val().trim(),
            'Passcode': passcode.val().trim(),
            'ImgUrl': imgUrl.val().trim(),
            'Category': category.val(),
            'CreatedBy': userid,
        };
        ajaxPostShoes(urlShoes, data);
        console.log(data);
        $('.addShoes').hide();
    });


    // U P D A T I N G
    let shoesId;
    $(document).on('click', '.shoes-edit', function () {

        window.localStorage.setItem('shoesId', this.dataset.id);
        shoesId = window.localStorage.getItem('shoesId');
        ajaxGetShoes(shoesId);
        $('.updateShoes').show();


        $('#updateShoesBtn').click(() => {
            shoesId = window.localStorage.getItem('shoesId');
            let serverUrl = `${urlShoes}/${shoesId}`;

            let updateShoesName = $('#updateShoesName');
            let updateDescription = $('#updateDescription');
            let updatePrice = $('#updatePrice');
            let updateSize = $('#updateSize');
            let updatePasscode = $('#updatePasscode');
            let updateImgUrl = $('#updateImgUrl');
            let updateCategory = $('#updateCatOptions :selected');
            let data = {
                'ShoesId': shoesId,
                'ShoesName': updateShoesName.val().trim(),
                'Description': updateDescription.val().trim(),
                'Price': updatePrice.val().trim(),
                'Size': updateSize.val().trim(),
                'Passcode': updatePasscode.val().trim(),
                'ImgUrl': updateImgUrl.val().trim(),
                'Category': updateCategory.val(),
                'UpdatedBy': userid,
            };
            ajaxPostShoes(serverUrl, data);
            console.log(data)
            $('.updateShoes').hide();
        })
    });

    //D E L E T I N G 

    $(document).on('click', '.shoes-del', function () {

        window.localStorage.setItem('shoesId', this.dataset.id);
        shoesId = window.localStorage.getItem('shoesId');
        $('.delShoes').show();
    });

    $('#delShoesBtn').click(() => {
        shoesId = window.localStorage.getItem('shoesId');
        let serverUrl = `${urlShoes}/${shoesId}`;
        let data = {
            'Id' : shoesId,
            'DeletedBy': userid,
        }
        ajaxDelShoes(serverUrl, data);
        $('.delShoes').hide();
    })

});



// functions


function ajaxPostShoes(url, data) {

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
function ajaxGetAllShoes() {
    $.ajax({
        url: urlShoes,
        success: function (resp) {
            let shoes = resp;
            shoes.forEach(e => {
                let tableContent = createShoes(e.ShoesName, e.Description, e.Price, e.Size, e.CategoryName, e.ShoesId);
                $('#shoesTableBody').append(tableContent);
            });
            $('#shoesTable').DataTable();
        }
    });
}

function ajaxGetShoes(id) {

    $.ajax({
        url: `${urlShoes}/${id}`,
        success: (resp) => {

            name = resp[0].ShoesName;
            description = resp[0].Description;
            price = resp[0].Price;
            size = resp[0].Size;
            passcode = resp[0].Passcode;
            imgUrl = resp[0].ImgUrl;

            $('#updateShoesName').val(name);
            $('#updateDescription').val(description);
            $('#updatePrice').val(price);
            $('#updateSize').val(size);
            $('#updatePasscode').val(passcode);
            $('#updateImgUrl').val(imgUrl);
        }
    })
}

function ajaxDelShoes(url, data) {
    $.ajax({
        type: "DELETE",
        url: url,
        data: JSON.stringify(data),
        dataType: "application/json",
        contentType: "application/json; charset=utf-8",
        success: (resp) => {
            console.log(resp);
        },
        error: (e) => {
            console.log(e)
        }
    })
}


function createShoes(name, description, price, size, categoryName, id) {
    let shoes =
        `
        <tr>
        <td>${name}</td>
        <td>${description}</td>
        <td>${price}</td>
        <td>${size}</td>
        <td>${categoryName}</td>
        <td><i data-id="${id}" class="fa fa-edit fa-2x shoes-edit"></i></td>
        <td><i data-id="${id}" class="fa fa-trash fa-2x shoes-del"></i></td>
        </tr>
        `
    return shoes;
}