//Preview Avatar
$('.SelectImage').on('click', function (e) {
    console.log('clicked')
    $('#MainBg').click();
});
window.addEventListener("dragover", function (e) {
    e = e || event;
    e.preventDefault();
}, false);
window.addEventListener("drop", function (e) {
    e = e || event;
    e.preventDefault();
}, false);
$('#MainBg').change(function (e) {
    var input = e.target;
    if (input.files && input.files[0]) {
        var file = input.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (e) {
            console.log(reader.result);
            $('.MainBg').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
        }
    }
});