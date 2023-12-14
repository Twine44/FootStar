$(document).ready(function () {
    loadcards();
    itemsByFilter();
});

//Load Items - Store Page
function loadcards() {
    $.get("config/readItems.php", function (data, status) {
        $(".shopitems").html(data);
    });
}

//Refresh the store items by the applied filters, using AJAX - Store Page
function refreshItems(bId, pId, gId, s, cId) {
    $.ajax({
        type: 'POST',
        url: 'config/functions.php',
        data: { action: 'readItems', brandId: bId, priceId: pId, genderId: gId, sizes: s, categoryId: cId },
        dataType: 'html',
        success: function (response) {
            console.log('Response:', response);
            $('.shopitems').html(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
        }
    });
}

//Check if a filter is applied - Store Page
function itemsByFilter() {
    $('#price').change(function () {
        let priceId = $(this).val();
        let brandId = $("#brand").val();
        let genderId = $("#gender").val();
        let categoryId = $("#category").val();
        let sizesElements = $(".btn-checked");
        let sizes = getSizeValues(sizesElements);

        refreshItems(brandId, priceId, genderId, sizes, categoryId);
    });
    $('#brand').change(function () {
        let brandId = $(this).val();
        let priceId = $("#price").val();
        let genderId = $("#gender").val();
        let categoryId = $("#category").val();
        let sizesElements = $(".btn-checked");
        let sizes = getSizeValues(sizesElements);

        refreshItems(brandId, priceId, genderId, sizes, categoryId);
    });
    $('#gender').change(function () {
        let genderId = $(this).val();
        let brandId = $("#brand").val();
        let priceId = $("#price").val();
        let categoryId = $("#category").val();
        let sizesElements = $(".btn-checked");
        let sizes = getSizeValues(sizesElements);

        refreshItems(brandId, priceId, genderId, sizes, categoryId);
    });
    $('#category').change(function () {
        let categoryId = $(this).val();
        let genderId = $("#gender").val();
        let brandId = $("#brand").val();
        let priceId = $("#price").val();
        let sizesElements = $(".btn-checked");
        let sizes = getSizeValues(sizesElements);

        refreshItems(brandId, priceId, genderId, sizes, categoryId);
    });
    $('.sizebtns').click(function () {
        //Set sizebutton to checked
        $(this).toggleClass('btn-checked');

        let sizesElements = $(".btn-checked");
        let sizes = getSizeValues(sizesElements);
        let brandId = $("#brand").val();
        let priceId = $("#price").val();
        let genderId = $("#gender").val();
        let categoryId = $("#category").val();

        refreshItems(brandId, priceId, genderId, sizes, categoryId);
    });

    //Get the selected size button values as an array
    function getSizeValues(sizeBtns) {
        let array = [];
        if (sizeBtns.length < 1) {
            array = null;
        }
        else {
            for (let index = 0; index < sizeBtns.length; index++) {
                const element = sizeBtns[index].value;
                array[index] = element;
            }
        }
        return array;
    }
}