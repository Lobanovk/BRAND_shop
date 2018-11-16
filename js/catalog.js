"use strict";

const catalog = {
  init() {
    this.renderCatalogIndex();
  },

  renderCatalogIndex() {
    $.ajax({
      url: 'http://localhost:3000/catalog',
      type: 'GET',
      success: function (goods) {
        goods.forEach(function (good) {
          $('<div>', {
            class: 'parent-product',
            append:
              $('<a>', {
                href: 'single_page.html',
                class: "product",
                append: $('<img>', {
                  class: 'img',
                  src: good.src,
                })
              })
                .add($('<div>', {
                  class: 'product-info',
                  append: $('<p>', {
                    text: good.name
                  })
                    .add('<span>',{
                      text: '$' + good.price,
                    })
                }))
                .add($('<div>', {
                  class: 'parent-add-cart',
                  append: $('<div>', {
                    class: 'active-link',
                    'data-id_name': good.id,
                    'data-name': good.name,
                    'data-price': good.price,
                    'data-srcMini': good.srcMini,
                    append: $('<img>', {
                      src: "img/cart-white.svg",
                    })
                      .add($('<span>', {
                        text: "Add to Cart"
                      }))
                  })
                }))
          })
            .appendTo('.img-items');
        })
      }
    })
  }
};


const cart = {

  init(){
    this.cartAddGood();
    this.cartRenderGoods();
  },

  cartAddGood() {
    $('.img-items').on('click', '.active-link', function () {
        let good = $(this).data();
        good.quantity = 1;
        $.ajax({
          url: 'http://localhost:3000/cart',
          type: 'POST',
          data: good,
          success: function (goods) {
            console.log("Ok");
          }
        });

        cart.cartRenderGoods();
    })
  },

  cartRenderGoods() {
    $('#cart').text('');
    $.ajax({
      url: 'http://localhost:3000/cart',
      type: 'GET',
      success: function (goods) {
            goods.forEach(function (good) {
              $('<div>',{
                class: 'goods',
                append: $('<a>', {
                  href: '#',
                  append: $('<img>',{
                    src: good.srcmini
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
                        text: good.quantity + ' x $' + good.price,
                      }))
                  }))
                  .add($('<i>', {
                    class: "fas fa-times-circle remove-goods"
                  }))
              })
                .appendTo('#cart');
            });
      }
    })
  }
};
