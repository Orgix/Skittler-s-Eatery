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

const openNav = () => {
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
const closeNav = () => {
document.getElementById("mySidenav").style.width = "0";
document.getElementById("cart-button").style.marginRight = "0"
}




/* Jquery */
$(document).ready(function(){

  $('.menu-tab').click(function() {
    $('.category_list').show();
  });
  $('.checkout-tab').click(function() {
    $('.category_list').hide();
  });

  function calculateTotal(){/* function that calculates the total of the items in the user's cart */
    total=0;
    
    items=$('.cart-list').find('ul').find('.cart-item');
		items.each(function(){
			price=parseFloat($(this).find('.cart-item-cost').html());
			total += price;
		});
		$('.total-cost span:last-child').html(total.toFixed(2)+"&euro;");
	}

  $('.add-button').click(function(e){ /* add buton actions. It will target the food's id and it will send an ajax request with that in conjuction with the user's id to the database */
        e.preventDefault();
        var $this = $(this);//this
        var food_code = $this.parent().parent().find('.food_code').val();
        var food_title=$this.parent().parent().find('.food-title').html();
        var food_description=$this.parent().parent().find('.food-description').html();
        var food_cost=$this.parent().parent().find('.food-cost').html();
    $.ajax({
      type:'POST',
      url:"../resources/functions.php",
      data:{code: food_code}
      
      }).done((data)=> { /* if done, renew the cart */
       
        $('.cart-list ul').append("<li><div class='card mb-2 cart-item'><div class='card-header'><div class='w-75'><span class='cart-food-title'>"+food_title+
        "</span><span class='cart-item-cost pl-2'>"+food_cost+"</span></div><span class='remove'>&times;</span></div><div class='card-body'><span class='cart-food-desc'>"+food_description+
          "</span></div></div><input type='hidden' class='code' value="+data+"></li>");

          

        
        calculateTotal();
      })
      $('.remove').on("click", function(e){
        e.preventDefault();
         const target_code = $(this).parent().parent().parent().find('.code');
         
         $.ajax({
           type:'POST',
           url:'../resources/functions.php',
           data:{del_code:target_code.val()}
         })
         .done(()=>{
           $(this).parent().parent().parent().remove();
           calculateTotal();
         })
     });
 });
 
 const getCartContents = () =>{
  $('.cart-list ul').empty(); /*function that requests the items in the user's cart  */
    $.ajax({
      type:'POST',
      url:"../resources/functions.php",
      data:{retrieve:'0'}
    })
    .done((result) => {
     result = JSON.parse(result);
      result.forEach(row => {
        $('.cart-list ul').append("<li><div class='card mb-2 cart-item'><div class='card-header'><div class='w-75'><span class='cart-food-title'>"+row.item_name+
             "</span><span class='cart-item-cost pl-2'>"+row.item_cost+"</span></div><span class='remove'>&times;</span></div><div class='card-body'><span class='cart-food-desc'>"+row.item_description+
               "</span></div></div><input type='hidden' class='code' value="+row.cart_id+"></li>");

               $('.remove').on("click", function(e){
                 e.preventDefault();
                  const target_code = $(this).parent().parent().parent().find('.code');
                  
                  $.ajax({
                    type:'POST',
                    url:'../resources/functions.php',
                    data:{del_code:target_code.val()}
                  })
                  .done(()=>{
                    $(this).parent().parent().parent().remove();
                    calculateTotal();
                  })
              });
      });
      calculateTotal();
    });
 }
 getCartContents();
 

$('.submit-button').on("click",function(e){
  e.preventDefault();
  const cartContents= $('.cart-list').find('ul').find('.cart-item');
  if(cartContents.length == 0){
    alert("No items in cart");
  }
  else{
    let nameList = [];
    cartContents.each(function(){
      let title = $(this).find('.cart-food-title').html();
      nameList.push(title);
    })
    const form = $('form').serialize();
    const cost = $('.total-cost span:last-child').html().slice(0,-1);
    
    $.ajax({
      type:'POST',
      url:"../resources/functions.php",
      data:{
        order:'true',
        food_titles: nameList,
        formContents: form,
        order_cost:cost
      }
    }).done((data)=>{
      if(data == "success"){
        window.location.href="thankyou.php";
      }else{
        console.log(data)
      }
    })
  }
});



});
