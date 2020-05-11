
var robi=0;


function setup() {
  createCanvas(400, 400);
background("#BDD8B5");
}

function draw() {
  
  fill(140,robi,60);
  stroke("#104D1D");
  strokeWeight(5);
  ellipse(200,200,robi,robi);
  
  fill("#24C36B");
  ellipse(mouseX, mouseY, 50, 50);
  textSize(24);
  textFont("Georgia");
  textStyle(ITALIC);
  text("Good Morning !", 200, 100);
  text("poke me", 305,305);
  rect(200,200,100,100);
  line(200,200,100,robi);
robi = robi+10;
}
function mousePressed(){
  
  
}
