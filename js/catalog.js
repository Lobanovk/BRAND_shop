"use strict";

const catalog = {

  renderCatalogIndex() {
    $.ajax({
      url: 'methods.php?page=index',
      type: 'GET',
      success: function (goods) {
        let products = JSON.parse(goods);
        products.forEach(function (good) {
          $('<div>', {
            class: 'parent-product',
            append: $('<a>', {
              href: 'index.php?page=single-page&id_catalog=' + good.id_catalog,
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
                  .add('<span>', {
                    text: '$' + good.price,
                  })
              }))
              .add($('<div>', {
                class: 'parent-add-cart',
                append: $('<div>', {
                  class: 'active-link',
                  'data-id_catalog': good.id_catalog,
                  'data-name': good.name,
                  'data-price': good.price,
                  'data-src_mini': good.src_mini,
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
        });
      }
    });
  },

  productPage() {
    $.ajax({
      url: 'methods.php?page=product&gender=1',
      type: 'GET',
      success: function (products) {
      let goods = JSON.parse(products);
        goods.forEach(function (good) {
            $('<div>', {
              class: 'parent-product',
              append: $('<a>', {
                href: 'index.php?page=single-page&id_catalog=' + good.id_catalog ,
                class: "product",
                append: $('<img>', {
                  class: 'img',
                  src: good.src,
                })
              })
                .add($('<div>', {
                  class: 'product-info special-color-p-product',
                  append: $('<p>', {
                    text: good.name
                  })
                    .add('<span>', {
                      text: '$' + good.price,
                    })
                }))
                .add($('<div>', {
                  class: 'parent-add-cart',
                  append: $('<div>', {
                      class: 'active-link',
                    'data-id_catalog': good.id_catalog,
                    'data-name': good.name,
                    'data-price': good.price,
                    'data-src_mini': good.src_mini,
                      append: $('<img>', {
                        src: "img/cart-white.svg",
                      })
                        .add($('<span>', {
                          text: "Add to Cart"
                        }))
                    })
                      .add($('<div>', {
                        class: 'flex-svg-item',
                        append: $('<div>', {
                          class: 'active-link special-style',
                          append: $('<img>', {
                            src: 'img/change.svg'
                          })
                        })
                          .add($('<div>', {
                            class: 'active-link special-style',
                            append: $('<img>', {
                              src: 'img/Like.svg'
                            })
                          }))
                      }))
                }))
            })
              .appendTo('.img-items');
        });
      }
    });
  },

  renderProduct(){
    $('.choose-goods-other').empty();
    $.ajax({
      url: 'methods.php?page=single-page',
      type: 'GET',
      success: function (goods) {
        console.log(goods);
        let products = JSON.parse(goods);
        products.forEach(function (good) {
          $('<div>', {
            class: 'parent-product',
            append: $('<a>', {
              href: 'index.php?page=single-page&id_catalog=' + good.id_catalog,
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
                  .add('<span>', {
                    text: '$' + good.price,
                  })
              }))
              .add($('<div>', {
                class: 'parent-add-cart',
                append: $('<div>', {
                  class: 'active-link',
                  'data-id_catalog': good.id_catalog,
                  'data-name': good.name,
                  'data-price': good.price,
                  'data-src_mini': good.src_mini,
                  append: $('<img>', {
                    src: "img/cart-white.svg",
                  })
                    .add($('<span>', {
                      text: "Add to Cart"
                    }))
                })
              }))
          })
            .appendTo('.choose-goods-other');
        });
      }
    });
  }

};



