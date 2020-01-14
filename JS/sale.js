let url = '/sofia-shoes/sales';

$(document).ready(()=>{
    ajaxGetAllSales(url)
})



function createSalesBtn(name, id){
    let btn = 
    `<button class="btn-block btn-info" data-id="${id}">${name}</button>`
    return btn;
}


function ajaxGetAllSales(url) {
    $.ajax({
        url: url,
        success: (resp) => {
            let sales = resp;
            sales.forEach(e => {
                let btnContent = createSalesBtn(e.SalesName, e.salesId);
                $('#sales').append(btnContent);
            });
        }
    });
}