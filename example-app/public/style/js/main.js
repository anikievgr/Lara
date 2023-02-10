
var addCategory = document.querySelector('#addCategory');
var buutonAddCategory = document.getElementById("select");

buutonAddCategory.addEventListener('change', (event) => {
  
 if (event.target.value != 'buutonAddCategory') {
   document.getElementById("inputNewCategory").value = '';

       addCategory.style.display = 'none';
 }else{
    document.getElementById("inputNewCategory").value = '';
     addCategory.style.display = 'block';
 }
});

var sliderMain = document.querySelector('.sliderMain');
var contenerSlider = document.querySelector('.sliderMainOff')
var sliders = document.querySelectorAll('.mainSlids');
var hight = new Array();
var colElements = 0;
var elements= new Array;
for(slids of sliders){
 elements[colElements] = slids;
  hight[colElements] = slids.offsetWidth;
     colElements++;
}

function sliderOff() {
  
  var sliderMainHeght = sliderMain.offsetHeight;
  console.log(sliderMainHeght) ;
  if (sliderMainHeght >= 90) {
      sliderMain.style.display = 'none';
      contenerSlider.style.display = 'block';
      
  }
}
sliderOff();
colElements = colElements-2;
elements.splice(-2)
var firstElements = document.querySelector('.first');
var buttonPrev = document.getElementById('prevMain');
var buttonNext = document.getElementById('nextMain');
var nextItem =0 ;
var prevItem =0;
var prevItemCheck = 0;
buttonPrev.addEventListener('click', (event) => {

  if (nextItem < 0) {
    nextItem= 0;
    prevItem=0;
  }
    if (nextItem <= colElements) {
      
    
   elements[nextItem].style.display = 'none'
     if (elements[nextItem].classList.contains('add')) {
      elements[nextItem].classList.remove('add');
    }
   
    if (nextItem != colElements ) {
          nextItem++;
    }
     
  
   
     prevItemCheck = 0;
     }
  });
buttonNext.addEventListener('click', (event) => {

    if(prevItem >=0){
    prevItemCheck++;

    if (prevItemCheck == 1) {
       prevItem = nextItem -1;
    }if (prevItemCheck > 1) {
      prevItem--;
    }
    nextItem--;
    if (elements[prevItem].classList.contains('none')) {
       elements[prevItem].classList.remove('none');
     }
    elements[prevItem].style.display = 'block';
  }
  });


 




$(function() {
  var selectedClass = "";
  $(".filter").click(function(){
    selectedClass = $(this).attr("data-rel");
    $("#gallery").fadeTo(100, 0.1);
    $("#gallery div").not("."+selectedClass).fadeOut().removeClass('animation');
    setTimeout(function() {
      $("."+selectedClass).fadeIn().addClass('animation');
      $("#gallery").fadeTo(300, 1);
    }, 300);
  });
});
