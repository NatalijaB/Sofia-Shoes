const urlSales = '/sofia-shoes/sales';
$(document).ready(() => {
    // L I S T I N G

    ajaxGetAllSales();

    // FORM DISPLAY
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
            sdate: "required",
            edate: "required"
        },
        messages: {
            sname: "Please enter name of the sale",
            sdate: "Please choose a start date for a sale",
            edate: "Please choose an end date for a sale",
        },
        submitHandler: function (form) {
            form.submit();
            let name = $('#sname');
            let sdate = $('#sdate');
            let edate = $('#edate');
            let data = {
                'SalesName': name.val().trim(),
                'StartDate': sdate.val(),
                'EndDate': edate.val(),
                'CreatedBy': userid,
            };
            postData(urlSales, data);
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
            updateSDate: "required",
            updateEDate: "required"
        },
        messages: {
            updateSname: "Please enter name of the sale",
            updateSDate: "Please choose a start date for a sale",
            updateEDate: "Please choose an end date for a sale"
        },
        submitHandler: function (form) {
            form.submit();

            salesId = window.localStorage.getItem('salesId');
            let serverUrl = `${urlSales}/${salesId}`;
            let updateName = $('#updatesName');
            let updateSDate = $('#updateSDate');
            let updateEDate = $('#updateEDate');
            let data = {
                'SalesName': updateName.val().trim(),
                'StartDate': updateSDate.val(),
                'EndDate': updateEDate.val(),
                'SalesId': salesId,
                'UpdatedBy': userid,
            };
            postData(serverUrl, data);
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
        deleteData(serverUrl, data);
        $('.delSales').hide();
    })


    // ADDING SHOES FOR SALE

    $(document).on('click', '.sales-add', function () {

        window.localStorage.setItem('salesId', this.dataset.id);
        salesId = window.localStorage.getItem('salesId');

        $('.addItems').show();

        $('#addItemsBtn').off('click').on('click', () => {
            let serverUrl = '/sofia-shoes/shoesonsale';
            let form = document.forms[6];
            let data = [];

            for (let i = 0; i < form.length; i++) {
                if (form[i].checked) {
                    data.push({
                        'SalesId': salesId,
                        'ShoesId': form[i].value
                    })
                }
            }

            postData(serverUrl, data)
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
            sdate = resp[0].StartDate;
            edate = resp[0].EndDate;
            $('#updatesName').val(name);
            $('#updateSDate').val(sdate);
            $('#updateEDate').val(edate);
        }
    })
}


function ajaxGetAllSales() {
    $.ajax({
        url: urlSales,
        success: (resp) => {
            let sales = resp;
            sales.forEach(e => {
                let tableContent = createSales(e.SalesName, e.StartDate, e.EndDate, e.SalesId, e.cUsername, e.cDate, e.uUsername, e.uDate);
                $('#salesTableBody').append(tableContent);
            });
            $('#salesTable').DataTable();
        }
    });
}



function createSales(name, startDate, endDate, id, cUsername, cDate, uUsername, uDate) {
    let sales =
        `
        <tr>
        <td>${name}</td>
        <td>${startDate}</td>
        <td>${endDate}</td>
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


