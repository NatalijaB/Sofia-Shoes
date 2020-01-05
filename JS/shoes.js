const urlShoes = '/sofia-shoes/shoes/'

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
        ajaxPostShoes(serverUrl, data);
        console.log(data);
    });


    // U P D A T I N G
    let shoesId;
    $(document).on('click', '.shoes-edit', function () {
        
        window.localStorage.setItem('shoesId', this.dataset.id);
        shoesId = window.localStorage.getItem('shoesId');
        ajaxGetShoes(shoesId);
        $('.updateShoes').show();


        $('#updateShoesBtn').click(()=>{
            shoesId = window.localStorage.getItem('shoesId');
            let serverUrl = urlShoes + shoesId;
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
            ajaxPostShoes(serverUrl, data);
            console.log(data)
        })
    });

});



// functions


function ajaxPostShoes (url, data){

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


function ajaxGetShoes (id){

    $.ajax({
        url: urlShoes + id,
        success: ( resp )=>{
            
            name = resp[0].Name;
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