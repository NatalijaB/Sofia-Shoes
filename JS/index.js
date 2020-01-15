const url = '/sofia-shoes/shoes';

$(document).ready(() => {
    getShoes(url);

});


function getShoes(url) {
    $.ajax({
        url: url,
        success: (resp) => {
            let shoes = resp;
            shoes.forEach(e => {
                let cardContent = createShoes(e.ShoesName, e.Price, e.Size, e.Description, e.ImgUrl);
                $('#shoes').append(cardContent).hide().fadeIn(1000);
                $('#nameF').append($('<option>', { value: e.ShoesId, text: e.ShoesName }));
            });
        }
    });
}


