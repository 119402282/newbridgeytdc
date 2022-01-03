let imgArr = [...document.getElementsByTagName('img')];
for (var i = 0; i < 10; i++){
    imgArr[i].loading = "eager";
}