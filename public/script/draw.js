var priceCategoryColourMap;
function setup() {
    createCanvas(700,700);
    priceCategoryColourMap = [
        color(30, 30, 30),
        color(0, 255, 0),
        color(125, 255, 0),
        color(255,255, 0),
        color(255, 125, 0),
        color(255, 0, 0)
    ]
}

function drawProperties(soldProperties) {
    noStroke();

    for (count = 0;count < soldProperties.length; count++) {
        fill(priceCategoryColourMap[soldProperties[count].priceCategory]);
        rect(
            soldProperties[count].xPos * 7,
            soldProperties[count].yPos * 7,
            7,
            7
        );
    }
}
