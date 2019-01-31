const cart = {

  init() {
    this.cartAddGood();
    this.cartRenderGoods();
    this.cartRemoveGoods();
  },

  cartAddGood() {
    $('.img-items').on('click', '.active-link', function () {
      let good = $(this).data();
      good.quantity = 1;

      if ($('#cart .remove-goods[data-id_catalog ="' + good.id_catalog + '"]').length) {
        let goodFromCart = $('#cart .remove-goods[data-id_catalog ="' + good.id_catalog + '"]').data();
        $.ajax({
          url: 'methods.php?m=update_cart',
          type: 'POST',
          data: {quantity: +goodFromCart.quantity + 1, id_catalog: good.id_catalog},
          success: function (result) {
            console.log(result);
            cart.cartRenderGoods();
          }
        });

      } else {
        $.ajax({
          url: 'methods.php?m=addcart',
          type: 'POST',
          data: good,
          success: function (result) {
            console.log(result);
            cart.cartRenderGoods();
          }
        });
      }
    })
  },

  cartRenderGoods() {
    $('#cart').empty();
    $.ajax({
      url: 'methods.php?m=see_cart',
      type: 'GET',
      success: function (products) {
        console.log(products);
        let goods = JSON.parse(products);
        let total = 0;
        goods.forEach(function (good) {
          $('<div>', {
            class: 'goods',
            append: $('<a>', {
              href: '#',
              append: $('<img>', {
                src: good.src_mini
              })
            })
            //TODO Предусмотреть возможность проставления звезд рейтинга
              .add($('<div>', {
                class: 'cart-text',
                append: $('<p>', {
                  class: 'name-goods',
                  text: 'Rebox Zane'
                })
                  .add($('<div>', {
                    class: 'star',
                    append: $('<i>', {
                      class: 'fa fa-star'
                    })
                      .add($('<i>', {
                        class: 'fa fa-star'
                      }))
                      .add($('<i>', {
                        class: 'fa fa-star'
                      }))
                      .add($('<i>', {
                        class: 'fa fa-star'
                      }))
                      .add($('<i>', {
                        class: 'fa fa-star-half'
                      }))

                  }))
                  .add($('<p>', {
                    class: 'price',
                    text: +good.quantity + ' x $' + +good.price,
                  }))
              }))
              .add($('<i>', {
                class: "fas fa-times-circle remove-goods",
                'data-id_catalog': good.id_catalog,
                'data-name': good.name,
                'data-price': good.price,
                'data-quantity': good.quantity,
                'data-srcMini': good.src_mini,
              }))
          })
            .appendTo('#cart');

          total += +good.price * good.quantity;
        });
        $('#all-price').text(total);
      }
    })
  },

  cartRemoveGoods() {
    $('#cart').on('click', '.remove-goods', function () {
      let good = $(this).data();
      $.ajax({
        url: 'methods.php?m=delete_cart',
        type: 'POST',
        data: {id_catalog: good.id_catalog},
        success: function () {
          cart.cartRenderGoods();
        }
      })
    })
  },

  removeGods() {
    $('#cart-page').on('click', '.remove-goods', function () {
      let good = $(this).data();
      $.ajax({
        url: 'methods.php?page=shopping-cart&m=delete_cart',
        type: 'POST',
        data: {id_catalog: good.id_catalog},
        success: function (succes) {
          cart.cartPage();
        }
      })
    })
  },

  cartPage() {
    $('#cart-page').empty();
    $.ajax({
      url: 'methods.php?page=shopping-cart',
      type: 'GET',
      success: function (products) {
        //console.log(products);
        let total = 0;
        let goods = JSON.parse(products);
        goods.forEach(function (good) {
          $('<div>', {
            class: 'img-product-item',
            append: $('<div>', {
              class: 'img-info-product',
              append: $('<img>', {
                src: good.src_mini,
                alt: 'product'
              }).add($('<div>', {
                class: 'info-description-product',
                append: $('<p>', {
                  class: 'description-product',
                  text: good.name
                }).add($('<div>', {
                  class: 'description-product__smal',
                  append: $('<p>', {
                    append: $('<span>', {
                      class: 'special-color-shoping-cart',
                      text: 'Color:'
                    }),
                    text: 'Red'
                  })
                    .add($('<p>', {
                      append: $('<span>', {
                        class: 'special-color-shoping-cart',
                        text: 'Size:'
                      }),
                      text: 'Xll'
                    }))
                }))
              }))
            })
              .add($('<div>', {
                class: 'other-info',
                append: $('<p>', {
                  class: 'price-shoping-cart position-shoping-cart',
                  text: '$',
                  append: $('<span>', {
                    class: 'price-cart',
                    text: good.price,
                  })
                }).add($('<input>', {
                  class: 'border-input price-shoping-cart position-input',
                  name: 'quantity',
                  type: 'number',
                  min: '0',
                  value: good.quantity,
                  'data-id_cart': good.id_cart,
                })).add('<p>', {
                  class: 'price-shoping-cart position-text-p',
                  text: 'FREE'
                })
                  .add('<p>', {
                    class: 'price-shoping-cart position-subtoal',
                    text: '$',
                    append: $('<span>', {
                      class: 'price-cart-total',
                      text: +good.price * +good.quantity
                    })
                  })
                  .add($('<i>', {
                    class: 'fas fa-times-circle positin-action hover-element remove-goods',
                    'data-id_catalog': good.id_catalog,
                    'data-name': good.name,
                    'data-price': good.price,
                    'data-quantity': good.quantity,
                    'data-srcMini': good.src_mini,
                  }))
              }))
          })
            .appendTo('#cart-page');
          total += +good.price * good.quantity;
        });

        $('.sub-total').text(total);
      }
    });
  },

  updatePrice() {
    $('#cart-page').on('blur', '.other-info', '[name="quantity"]', function () {
      let quantity = $(this).find('[name="quantity"]').val();
      let price = $(this).find('.price-cart').text();
      let totalPrice = +price * quantity;
      $(this).find('.price-cart-total').text(totalPrice);

      let sumPrice = $('.other-info').find('.price-cart-total');
      let subPrice = 0;

      for (value of sumPrice){
        subPrice += +$(value).text();
      }
      $('.sub-total').text(subPrice);
    })
  },

  cartUpdateOrders(){
    $('.position-proccesed-check').on('click', '.container-for-button', '.button-proccesed-to-checkout', function () {

    let orders = $('#cart-page').find('.img-product-item').find('.other-info').find('[name="quantity"]');

      for(order of orders) {
        let catalog = $(order).data();
        $.ajax({
          url: 'methods.php?page=shopping-cart&m=update_orders',
          type: 'POST',
          data: {quantity: $(order).val(), id_cart: catalog.id_cart},
          success: function (success) {
            console.log(success);
          }
        })
      }

      $('#cart-page').empty();
    });
  }
};