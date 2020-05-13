
var robi=0;
var chy=0;

function setup() {
  createCanvas(400, 400);
background("#F4A591");
}

function draw() {
  
  fill(140,robi,60);
  stroke("#478CF3");
  strokeWeight(5);
  ellipse(200,200,robi,robi);
  
  fill(140,chy,60);
  stroke("#F3BF47");
  strokeWeight(5);
  ellipse(200,200,chy,chy);
  
  
  fill("#E16236");
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
  
  chy = chy+10;
  
}
