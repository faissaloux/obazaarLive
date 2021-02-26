
var slug = $("body").attr("data-slug");
var wishlist = "";
var cartupdate = "/" + slug + "/cart/update";
var addtocard = "/" + slug + "/cart/add/";
var loadcartAgain = "/loadcartAgain/" + slug + "";

$(document).on('click', 'body #wishlistMb', function (e) {
  if (!$('body').hasClass('has-logged')) {
    $('#modalUnauth').modal('show');
    return false;
  }
  var token = $('meta[name="csrf-token"]').attr('content');
  var link = $(this).attr('data-link');
  var formData = new FormData();
  formData.append('_token', token);
  $.ajax({
    url: link,
    type: 'GET',
    processData: false,
    // important
    contentType: false,
    // important
    data: formData,
    cache: false,
    dataType: "HTML",
    beforeSend: function beforeSend() {
      $("#overlay").fadeIn(300);
    },
    success: function success(data) {
      $("#overlay").fadeOut(0);
      $('body .wishlist_count').html(data);
      $('#modalwishlist').modal('show');
    },
    error: function error(response) {
      console.log(response);
    }
  });
});
  
// add product to cart
$(document).on('click', 'body #addtocard', function (e) {
  if (!$('body').hasClass('has-logged')) {
    $('#modalUnauth').modal('show');
    return false;
  }

  e.preventDefault();
  var formData = new FormData();
  var product = $(this).attr('data-product-id');
  var token = $('meta[name="csrf-token"]').attr('content');
  formData.append('product', product);

  var attr = $(this).attr('name');

  // For some browsers, `attr` is undefined; for others,
  // `attr` is false.  Check for both.
  if (typeof attr !== typeof undefined && attr !== false) {
      // ...
  }

  var quantity = 1;

  if (('#instantQuantity').length) {
      quantity = $('#instantQuantity').val();
  }

  if (quantity == null) {
      quantity = 1;
  }

  formData.append('quantity', quantity);

  formData.append('_token', token);
  $.ajax({
      url: addtocard + product,
      type: 'POST',
      processData: false, // important
      contentType: false, // important
      data: formData,
      cache: false,
      dataType: "JSON",
      beforeSend: function () {
          $("#overlay").fadeIn(300);
      },
      success: function (data) {
          $("#overlay").fadeOut(0);
          $('#addedTocCart').modal('show');
          var formData = new FormData();
          formData.append('_token', token);
          $.ajax({
              url: loadcartAgain,
              type: 'GET',
              processData: false, // important
              contentType: false, // important
              data: formData,
              cache: false,
              dataType: "HTML",
              success: function (data) {
                  $('body .ps-cart__content').html(data);
                  var quantity = $('#cartcount').val();
                  $('#cart-mobile .TotalPriceM').html($('#cart-mobile .jahnama').text());


                  $('.ps-cart--mini .header__extra span i').html(quantity);
              },
          });

      },

  });

  return false;

});

//Add to cart form
$("#addToCartForm").submit((e) => {
  if (!$('body').hasClass('has-logged')) {
    $('#modalUnauth').modal('show');
    return false;
  }

  e.preventDefault();
  const token = $('meta[name="csrf-token"]').attr('content');
  const link = $("#addToCartForm").attr('data-link');
  const quantity = $("#add-to-cart-quantity").val();
  console.log("Link: ", link);
  console.log("Quantity: ", quantity);
  const formData = new FormData();
  formData.append('quantity', quantity);
  formData.append('_token', token);

  $.ajax({
      url: link,
      type: 'POST',
      processData: false,
      contentType: false,
      data: formData,
      cache: false,
      dataType: "JSON",
      beforeSend: function () {
          $("#overlay").fadeIn(300);
      },
      success: function (response) {
          $("#overlay").fadeOut(0);
          $('#addedTocCart').modal('show');
          var formData = new FormData();
          formData.append('_token', token);
          $.ajax({
              url: loadcartAgain,
              type: 'GET',
              processData: false, // important
              contentType: false, // important
              data: formData,
              cache: false,
              dataType: "HTML",
              success: function (data) {
                  $('body .ps-cart__content').html(data);
                  var quantity = $('#cartcount').val();
                  // $('body .TotalPriceM').html('');
                  // $('.TotalPriceM').html('');
                  //$('#cart-mobile .ps-cart__footer').html('');


                  $('#cart-mobile .TotalPriceM').html($('addToCartForm .jahnama').text());


                  $('.ps-cart--mini .header__extra span i').html(quantity);
              },
          });
      },
      error: function (error) {
          console.log(error);
      }
  });
});

// updatequantitiy from cart
function updatequantitiy(input) {
  var slug = $('#slug').val();
  var token = $('meta[name="csrf-token"]').attr('content');
  var rawId = input.attr('data-product');
  var quantity = input.val();
  var product = input.attr('data-product-id');
  var cart_id = input.attr('data-cart');
  $('#cart-mobile .product-col-' + product + ' .product-qty updatedQty').html(quantity);

  var formData = new FormData();

  formData.append('_token', token);
  formData.append('rawId', rawId);
  formData.append('quantity', quantity);
  formData.append('product_id', product);
  formData.append('cart_id', cart_id);

  $.ajax({
      type: 'POST',
      url: cartupdate,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
  });
};

// getTotal
function getTotal() {

  var numbersFi = [];
  var total = 0;
  $('#cart-mobile .preis').each(function () {
      var number = parseFloat($(this).text()).toFixed(2);
      numbersFi.push(number);
  });

  for (var i = 0; i < numbersFi.length; i++) {
      total += Number(numbersFi[i]);
  }

  return total;
}

// getTotal
function getTotalM() {

  var numbersFi = [];
  var total = 0;
  $('#cart-mobile .preis').each(function () {
      var number = parseFloat($(this).val()).toFixed(2);
      numbersFi.push(number);
  });

  var total = 0;
  for (var i = 0; i < numbersFi.length; i++) {
      total += Number(numbersFi[i]);
  }

  return total;
}

// ikhaaaaan
function ikhaaaaan(input) {

  var token = $('meta[name="csrf-token"]').attr('content');
  var rawId = input.attr('data-product');
  var quantity = input.val();
  var product = input.attr('data-product-id');
  var price = input.attr('data-price');
  var cart_id = input.attr('data-cart');

  // change the price instant
  var price = input.attr('data-price');

  var subtotal = parseFloat(quantity, 10).toFixed(2) * parseFloat(price, 10).toFixed(2);
  input.closest('tr').find('.price').html(parseFloat(subtotal, 10).toFixed(2));


  $('#order-cart-section .product-col-' + product + '  span.preis').html(subtotal);

  $('.product-col-tele-' + product + '  input.preis').val(subtotal);
  $('.product-col-tele-' + product + '  span.prdqty').html(quantity);

  // change the qte under product name
  $('#cart-mobile .product-col-' + product + ' .product-qty .updatedQty').html(quantity);
  $('#cart-mobile .product-col-' + product + ' .product-qty .preis').html(parseFloat(quantity*price).toFixed(2));

  var total = getTotal();
  $('#order-cart-section .TotalPrice').html(total.toFixed(2));
  $('.TotalPrice').html(parseFloat(total).toFixed(2));

  var totalM = getTotalM();
  $('.TotalPriceM').html(totalM.toFixed(2));

  var formData = new FormData();

  formData.append('_token', token);
  formData.append('rawId', rawId);
  formData.append('quantity', quantity);
  formData.append('product_id', product);
  formData.append('cart_id', cart_id);

  $.ajax({
      type: 'POST',
      url: cartupdate,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
  });
};

// qte up from cart
$(document).on('click', 'body .zaydnaks .up', function (e) {
  var num = +$(this).closest('.zaydnaks').find('.instantQuantity').val() + 1;
  $(this).closest('.zaydnaks').find('.instantQuantity').val(num);
  var input = $(this).closest('.zaydnaks').find('.instantQuantity');
  updatequantitiy(input);
  $('.TotalPriceM').removeAttr('data-price');
  ikhaaaaan(input);
});

// qte down from cart
$(document).on('click', 'body .zaydnaks .down', function (e) {
  var num = +$(this).closest('.zaydnaks').find('.instantQuantity').val() - 1;
  if (num > 0) {
      $(this).closest('.zaydnaks').find('.instantQuantity').val(num);
      var input = $(this).closest('.zaydnaks').find('.instantQuantity');
      updatequantitiy(input);
      $('.TotalPriceM').removeAttr('data-price');
      ikhaaaaan(input);
  }
});
