let imgArr = [...document.getElementsByTagName('img')];
for (var i = 0; i < 11; i++){
    imgArr[i].loading = "eager";
}