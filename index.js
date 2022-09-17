function focusImage(imageId){
    var image = document.getElementById(imageId);
    var source = image.src;
    window.open(source);
}