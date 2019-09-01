var xmlHttp = new XMLHttpRequest();

xmlHttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
        drawProperties(JSON.parse(this.responseText));
    }
};
xmlHttp.open('GET', '/properties');
xmlHttp.send();
