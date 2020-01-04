
function createShoes(name, description, price, size, id) {
    let shoes =
        `
        <tr>
        <td>${name}</td>
        <td>${description}</td>
        <td>${price}</td>
        <td>${size}</td>
        <td><i data-id="${id}" class="fa fa-edit fa-2x shoes-edit"></i></td>
        <td><i data-id="${id}" class="fa fa-trash fa-2x shoes-del"></i></td>
        </tr>
        `
    return shoes;
}
$(document).ready(function () {

    // L I S T I N G
    $.ajax({
        url: '/sofia-shoes/shoes',
        success: function (resp) {
            let shoes = resp;
            shoes.forEach(e => {
                let tableContent = createShoes(e.Name, e.Description, e.Price, e.Size, e.Id);
                $('#shoesTableBody').append(tableContent);
            });
            $('#shoesTable').DataTable();
        }
    });


    // FORM DISPLAY (srediti)

    $('#addShoes').click(()=>{
        $('.addShoes').show();
    })

    $('#closeAddShoes').click(()=>{
        $('.addShoes').hide();
    });

    $('#closeUpdateShoes').click(()=>{
        $('.updateShoes').hide();
    })



    // A D D I N G 

    $('#addShoesBtn').click(() => {
        let serverUrl = '/sofia-shoes/shoes';
        let name = $('#shoesName');
        let description = $('#description');
        let price = $('#price');
        let size = $('#size');
        let passcode = $('#passcode');
        let imgUrl = $('#imgUrl');
        let data = {
            'Name': name.val().trim(),
            'Description': description.val().trim(),
            'Price': price.val().trim(),
            'Size': size.val().trim(),
            'Passcode': passcode.val().trim(),
            'ImgUrl': imgUrl.val().trim(),
        };
        ajaxCall(serverUrl, data);
        console.log(data);
    });


    // U P D A T I N G

    $(document).on('click', '.shoes-edit', function () {
        let id = this.dataset.id;
        $('.updateShoes').show();


        $('#updateShoesBtn').click(()=>{
            let serverUrl = '/sofia-shoes/shoes/' + id;
            let updateName = $('#updateName');
            let updateDescription = $('#updateDescription');
            let updatePrice = $('#updatePrice');
            let updateSize = $('#updateSize');
            let data = {
                'Name': updateName.val().trim(),
                'Description': updateDescription.val().trim(),
                'Price': updatePrice.val().trim(),
                'Size': updateSize.val().trim(),
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