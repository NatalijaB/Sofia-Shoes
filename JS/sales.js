const urlSales = '/sofia-shoes/sales';
$(document).ready( ()=> {
    // L I S T I N G

    ajaxGetAllSales();

    // FORM DISPLAY (srediti)
    $('#addSales').click(()=>{
        $('.addSales').show();
    })
    $('#closeAddSales').click(() => {
        $('.addSales').hide();
    });

    $('#closeUpdateSales').click(() => {
        $('.updateSales').hide();
    })
    $('#closeDelSales').click(() => {
        $('.delSales').hide();
    })



    // A D D I N G 

    $('#addSalesBtn').click(() => {
        let serverUrl = urlSales;
        let name = $('#sname');
        let data = {
            'SalesName': name.val().trim(),
            'CreatedBy': userid,
        };
        ajaxPostSales(serverUrl, data);
        console.log(data);
        $('.addSales').hide();
    });


    // U P D A T I N G


    let salesId;
    $(document).on('click', '.sales-edit', function () {

        window.localStorage.setItem('salesId', this.dataset.id);
        salesId = window.localStorage.getItem('salesId');
        ajaxGetSales(salesId);

        $('.updateSales').show();
    });

    $('#updateSalesBtn').click(() => {
        
        salesId = window.localStorage.getItem('salesId');
        let serverUrl = `${urlSales}/${salesId}`;
        let updateName = $('#updatesName');
        let data = {
            'SalesName': updateName.val().trim(),
            'SalesId': saleid,
            'UpdatedBy': userid,
        };
        ajaxPostSales(serverUrl, data);
        console.log(data);
        $('.updateSales').hide();
    })


    // D E L E T I N G 

    $(document).on('click', '.sales-del', function () {

        window.localStorage.setItem('salesId', this.dataset.id);
        salesId = window.localStorage.getItem('salesId');
        $('.delSales').show();
    });

    $('#delSalesBtn').click(() => {
        
        salesId = window.localStorage.getItem('salesId');
        let serverUrl = `${urlSales}/${salesId}`;
        let data = {
            'DeletedBy': userid,
            'SalesId': catId,
        }
        ajaxDelSales(serverUrl, data);
        $('.delSales').hide();
    })



});



// functions


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
        error:(e) => {
            console.log(e);
        }
    });
}


function ajaxGetSales(id) {

    $.ajax({
        url: `${urlSales}/${id}`,
        success: (resp) => {
            console.log(resp)
            name = resp[0].SalesName;
            $('#updateName').val(name);
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

function ajaxDelSales (url, data){
    $.ajax({
        type:"DELETE",
        url: url,
        data: JSON.stringify(data),
        dataType: "application/json",
        contentType: "application/json; charset=utf-8",
        success: (resp)=>{
            console.log(resp);
        },
        error: (e)=>{
            console.log(e)
        }
    })
}


function createSales(name, date, id, cUsername, cDate, uUsername, uDate) {
    let category =
        `
        <tr>
        <td>${name}</td>
        <td>${date}</td>
        <td>${cUsername}</td>
        <td>${cDate}</td>
        <td>${uUsername}</td>
        <td>${uDate}</td>
        <td><i data-id="${id}" class="fa fa-edit fa-2x sales-edit"></i></td>
        <td><i data-id="${id}" class="fa fa-trash fa-2x sales-del"></i></td>
        </tr>
        `
    return category;
}