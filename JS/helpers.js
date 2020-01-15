

// P O S T   D A T A 

function postData(url, data) {

    $.ajax({
        type: 'POST',
        url: url,
        data: JSON.stringify(data),
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: (resp) => {
            console.log(resp);
        },
        error: (e) => {
            console.log(e);
        }
    });
};


// D E L E T E   D A T A

function deleteData(url, data) {
    $.ajax({
        type: "DELETE",
        url: url,
        data: JSON.stringify(data),
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        success: (resp) => {
            console.log(resp);
        },
        error: (e) => {
            console.log(e)
        }
    })
}


// M A K E   S H O E S


function createShoes(name, price, size, description, imgUrl) {
    let shoes = `
    <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="${imgUrl}" alt="cardImg">
                    <div class="card-body">
                        <h5 class="card-title">${name}</h5>
                        <p class="card-text">${description}</p>
                        <p class="card-text">
                        Price: <span id="price">$${price}</span>
                        Size: <span id="size">${size}</span>
                        </p>
                    </div>
                </div>
            </div>
    `
    return shoes;
}