/*Target all menus cards that appear below 768pixels*/

const menu_cards = document.querySelectorAll(".menu-card");
let currentCard = 0
let row = '';


const manageTabs = () =>{ /* Function that closes rest of the tabs that are open. */
  /* When cliking to open one of the categories in the card-menu, since it's not an accordion, the cards
    remain open , which might result in a tiring user experience. This function is simply responsible for adding
    the classes that are to be added from the bootstra.js when the open and close operation is called for a card
    */
  /*For each menu card*/
  Array.prototype.map.call(menu_cards, card=>{
    /*get the card-header, then get its classes */
    let header = card.childNodes[1]
    let classes= header.classList
    /* get card-header's attribute data-target */
    let attribute = header.getAttribute("data-target")
    /* If card-header is not collapsed*/
    if(!classes.contains("collapsed")){
      /* add collapsed to the header and the attribute */
      header.classList.add("collapsed")
      header.setAttribute("aria-expanded","false")

      /*get the row*/
      row =card.nextSibling.nextSibling
      /* remove and add classes */
      row.classList.remove("collapse","show")
      row.classList.add("collapsing")
      row.classList.remove("collapsing")
      row.classList.add("collapse")
    }
  });
}

Array.prototype.map.call(menu_cards, card=>{
	card.addEventListener("click",(card)=>{
      currentCard = card.target.classList.contains("h3") ? card.target.parentNode.classList : card.target.classList
      if(currentCard.contains("collapsed")){
        manageTabs()
      }
  });
});

function openNav() {
var w= window.innerWidth;

  if (w < 768) {
    document.getElementById("mySidenav").style.width = "100%";
    document.getElementById("cart-button").style.marginRight = "100%";
  } else {
    document.getElementById("mySidenav").style.width = "320px";
    document.getElementById("cart-button").style.marginRight = "320px";
  }
}

/* Set the width of the side navigation to 0 */
function closeNav() {
document.getElementById("mySidenav").style.width = "0";
document.getElementById("cart-button").style.marginRight = "0"
}

function addtoCart() {
  this.style.color ="red";
  alert(this);
}


/* Jquery */
$(document).ready(function(){

  $('.menu-tab').click(function() {
    $('.category_list').show();
  });
  $('.checkout-tab').click(function() {
    $('.category_list').hide();
  });

  function calculateTotal(){
		total=0;
		items=$('.cart-list').find('ul').find('.cart-item');
		items.each(function(){
			price=parseFloat($(this).find('.cart-item-cost').html());
			total += price;
		});
		$('.total-cost span:last-child').html(total);
	}

  $('.add-button').click(function(e){
		e.preventDefault();
		var $this = $(this);//this
    var food_title=$this.parent().parent().find('.food-title').html();//take data from parent li of this
    var food_description=$this.parent().parent().find('.food-description').html();//take data from parent li of this
    var food_cost=$this.parent().parent().find('.food-cost').html();
		var food_cost_init=$this.parent().parent().find('.food-cost').html();
    $('.cart-list ul').append("<li><div class='card mb-2 cart-item'><div class='card-header'><div class='w-75'><span class='cart-food-title'>"+food_title+
    "</span><span class='cart-item-cost pl-2'>"+food_cost+"</span></div><span class='remove'>&times;</span></div><div class='card-body'><span class='cart-food-desc'>"+food_description+
    "</span></div></div></li>"
    );
    calculateTotal();

    $('.remove').on("click", function(e){
      e.preventDefault();
       $(this).parent().parent().parent().remove();
       calculateTotal();
    });

 });

});
