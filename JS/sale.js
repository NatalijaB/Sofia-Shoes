let urlSale = '/sofia-shoes/sales';
let urlShoesOnSale = '/sofia-shoes/shoesonsale';

$(document).ready(() => {
    getAllSales(urlSale);


    // Display one sale
    $(document).on('click', '.sale-btn', function () {

        window.localStorage.setItem('saleId', this.dataset.id);
        saleId = window.localStorage.getItem('saleId');
        let serverUrl = `${urlShoesOnSale}/${saleId}`;
        
        getSale(serverUrl);

    });
})









// functions

function createSalesBtn(name, id) {
    let btn =
        `<button type="button" class="btn btn-block btn-info sale-btn" data-id="${id}">${name}</button>`
    return btn;
}


function getAllSales(url) {
    $.ajax({
        url: url,
        success: (resp) => {
            let sales = resp;
            sales.forEach(e => {
                let btnContent = createSalesBtn(e.SalesName, e.SalesId);
                $('#sales').append(btnContent);
            });
        }
    });
}

function getSale(url) {
    $.ajax({
        url: url,
        success: (resp) => {
            $('#shoes').empty();
            let shoes = resp;
            shoes.forEach(e => {
                let cardContent = createShoes(e.ShoesName, e.Price, e.Size, e.Description, e.ImgUrl);
                $('#shoes').append(cardContent).hide().fadeIn(1000);
            });
        }
    });
}