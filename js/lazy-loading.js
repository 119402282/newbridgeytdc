let imgArr = [...document.getElementsByTagName('img')];
for (var i = 0; i < 20; i++){
    imgArr[i].loading = "eager";
}