
function renderHtmlImage(srcImage) {
return `<div class="card col-md-3 mr-2">
        <img class="card-img-top image_detail_product" src="${srcImage}" alt="">
        </div>`;
}
function loadPreviewMutipleImage() {
    let files = $(this).get(0).files;
    let fileLength = files.length;
    $('.image_detail_wrapper').html('');
    for (let i = 0; i < fileLength; i++) {
        let fileItem = files[i];
        const reader = new FileReader();
        reader.onload = function(element){
            let data = renderHtmlImage(element.target.result);
            $('.image_detail_wrapper').append(data);
        };

        reader.readAsDataURL(fileItem);
    }

}


$(function () {
    $(".tags_select_choose").select2({
        tags: true,
        tokenSeparators: [',']
    });
    $(".select2_init").select2({
        placeholder: "Chọn danh mục",
        allowClear: true
    });

    

});

$(document).ready(function() {
    $('#summernote').summernote();
});

