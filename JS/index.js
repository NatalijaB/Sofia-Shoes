const url = '/sofia-shoes/shoes';
const urlSale = '/sofia-shoes/shoesonsale/1';

$(document).ready(() => {
    if(window.location.href == 'http://localhost/sofia-shoes/index.php'){
        getShoes(url);
    } else{
        getShoes(urlSale)
    }
});


function getShoes(url) {
    $.ajax({
        url: url,
        success: (resp) => {
            let shoes = resp;
            shoes.forEach(e => {
                let cardContent = createShoes(e.ShoesName, e.Price, e.Size, e.Description, e.ImgUrl);
                $('.row').append(cardContent);
            });
        }
    });
}

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
