function focusImage(imageId){
    var image = document.getElementById(imageId);
    var source = image.source;
    window.open(source);
}