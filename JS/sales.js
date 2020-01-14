const urlSales = '/sofia-shoes/sales';
$(document).ready(() => {
    // L I S T I N G

    ajaxGetAllSales();

    // FORM DISPLAY (srediti)
    $('#addSales').click(() => {
        $('.addSales').show();
    })
    $('#closeAddSales').click(() => {
        $('.addSales').hide();
    });

    $('#closeUpdateSales').click(() => {
        $('.updateSales').hide();
    });
    $('#closeDelSales').click(() => {
        $('.delSales').hide();
    });
    $('#closeAddItems').click(() => {
        $('.addItems').hide();
    });



    // A D D I N G 

    $("#salesFormAdd").validate({
        rules: {
            sname: "required",
            date: "required"
        },
        messages: {
            sname: "Please enter name of the sale",
            date: "Please choose a date for a sale"
        },
        submitHandler: function (form) {
            form.submit();
            let name = $('#sname');
            let date = $('#date');
            let data = {
                'SalesName': name.val().trim(),
                'Date': date.val(),
                'CreatedBy': userid,
            };
            ajaxPostSales(urlSales, data);
            console.log(data);
            $('.addSales').hide();
        }
    });


    // U P D A T I N G

    let salesId;
    $(document).on('click', '.sales-edit', function () {

        window.localStorage.setItem('salesId', this.dataset.id);
        salesId = window.localStorage.getItem('salesId');
        ajaxGetSales(salesId);

        $('.updateSales').show();
    });

    $("#salesFormUpdate").validate({
        rules: {
            updateSname: "required",
            updateDate: "required"
        },
        messages: {
            updateSname: "Please enter name of the sale",
            updateDate: "Please choose a date for a sale"
        },
        submitHandler: function (form) {
            form.submit();

            salesId = window.localStorage.getItem('salesId');
            let serverUrl = `${urlSales}/${salesId}`;
            let updateName = $('#updatesName');
            let updateDate = $('#updateDate');
            let data = {
                'SalesName': updateName.val().trim(),
                'Date': updateDate.val(),
                'SalesId': salesId,
                'UpdatedBy': userid,
            };
            ajaxPostSales(serverUrl, data);
            console.log(data);
            $('.updateSales').hide();
        }
    });


    // D E L E T I N G 

    $(document).on('click', '.sales-del', function () {

        window.localStorage.setItem('salesId', this.dataset.id);
        salesId = window.localStorage.getItem('salesId');
        $('.delSales').show();
    });

    $('#delSalesBtn').off('click').on('click', () => {

        salesId = window.localStorage.getItem('salesId');
        let serverUrl = `${urlSales}/${salesId}`;
        let data = {
            'DeletedBy': userid,
            'SalesId': salesId,
        }
        ajaxDelSales(serverUrl, data);
        $('.delSales').hide();
    })


    // ADDING SHOES FOR SALE

    $(document).on('click', '.sales-add', function () {

        window.localStorage.setItem('salesId', this.dataset.id);
        salesId = window.localStorage.getItem('salesId');

        $('.addItems').show();

        $('#addItemsBtn').off('click').on('click', () => {

            let form = document.forms[8];
            let data = [];

            for (let i = 0; i < form.length; i++) {
                if (form[i].checked) {
                    data.push({
                        'SalesId': salesId,
                        'ShoesId': form[i].value
                    })
                }
            }

            ajaxShoesOnSale(data)
            console.log(data)
            $('.addItems').hide();
        })
    })

});



// functions


function ajaxGetSales(id) {

    $.ajax({
        url: `${urlSales}/${id}`,
        success: (resp) => {
            console.log(resp)
            name = resp[0].SalesName;
            date = resp[0].Date;
            $('#updatesName').val(name);
            $('#updateDate').val(date);
        }
    })
}


function ajaxGetAllSales() {
    $.ajax({
        url: urlSales,
        success: (resp) => {
            let sales = resp;
            sales.forEach(e => {
                let tableContent = createSales(e.SalesName, e.Date, e.SalesId, e.cUsername, e.cDate, e.uUsername, e.uDate);
                $('#salesTableBody').append(tableContent);
            });
            $('#salesTable').DataTable();
        }
    });
}
function ajaxPostSales(url, data) {

    $.ajax({
        type: 'POST',
        url: url,
        data: JSON.stringify(data),
        dataType: "application/json",
        contentType: "application/json; charset=utf-8",
        success: (resp) => {
            console.log(resp);
        },
        error: (e) => {
            console.log(e);
        }
    });
}



function ajaxDelSales(url, data) {
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

function ajaxShoesOnSale(data) {
    $.ajax({
        type: 'POST',
        url: '/sofia-shoes/shoesonsale',
        data: JSON.stringify(data),
        dataType: "application/json",
        contentType: "application/json; charset=utf-8",
        success: (resp) => {
            console.log(resp);
        },
        error: (e) => {
            console.log(e);
        }
    });
}


function createSales(name, date, id, cUsername, cDate, uUsername, uDate) {
    let sales =
        `
        <tr>
        <td>${name}</td>
        <td>${date}</td>
        <td>${cUsername}</td>
        <td>${cDate}</td>
        <td>${uUsername}</td>
        <td>${uDate}</td>
        <td><i data-id="${id}" class="fa fa-plus-circle fa-2x sales-add"></i></td>
        <td><i data-id="${id}" class="fa fa-edit fa-2x sales-edit"></i></td>
        <td><i data-id="${id}" class="fa fa-trash fa-2x sales-del"></i></td>
        </tr>
        `
    return sales;
}
