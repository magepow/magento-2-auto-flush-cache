[<img src="https://github.com/magepow/themeforest/blob/master/shopify/shopify_affiliate.jpg" >](https://shopify.pxf.io/VyL446)

# Magento 2 Auto Flush Cache

## Magento 2 Auto Flush Cache (Magepow Auto Flush Cache extension Free)

**Auto flush cache** for Magento 2 the flush cache is a very special function of Magento 2. The cache is a particular area of your hosting server. It helps to increase the page load speed by storing the web pages through browsers. Also, it reduces resource requirements in the situation of heavy traffic.
Every time we edit any information or configuration content after saving we have to clear the cache in admin or run it by command via terminal.

[![Latest Stable Version](https://poser.pugx.org/magepow/autoflushcache/v/stable)](https://packagist.org/packages/magepow/autoflushcache)
[![Total Downloads](https://poser.pugx.org/magepow/autoflushcache/downloads)](https://packagist.org/packages/magepow/autoflushcache)
[![Daily Downloads](https://poser.pugx.org/magepow/autoflushcache/d/daily)](https://packagist.org/packages/magepow/autoflushcache)

**See more information**:

- [Detail](https://magepow.com/magento-2-auto-flush-cache-extension.html)

- [Documentation](https://docs.alothemes.com/m2/extension/autoflushcache/)

## ✨ Key Features

- ✅ **Automatic Cache Management** - No more manual cache clearing after admin changes
- ✅ **Intelligent Tag-Based Cache Invalidation** - Only clears cache entries related to changed content (NEW)
- ✅ **Event-Specific Controls** - Enable/disable cache flushing for each event type individually (NEW)
- ✅ **Production-Safe Defaults** - Optimized configuration that won't impact site performance (NEW)
- ✅ **Granular Configuration** - Control exactly which cache types to flush
- ✅ **Performance Optimized** - Removed aggressive cache clearing that caused performance issues (NEW)

### Performance Improvements

| Scenario | Before | After (Tag-Based) |
|----------|--------|-------------------|
| Single Product Save | Full cache flush | Only product cache tags cleared |
| Bulk Product Import (1000 items) | 1000 full cache flushes | No cache flushing (disabled by default) |
| CMS Page Save | Full cache flush | Only page cache tags cleared |

## How to use auto flush cache extension
Before you continue, ensure you meet the following requirements:

  * You have installed magento2

### Step 1 : Download Magento 2 AutoFlushCache Extension

 #### Install via composer (recommend)
Run the following commands in Magento 2 root folder:
```
composer require magepow/autoflushcache
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush
```

### Step 2: User guide
  #### Key features of Magento 2 Auto flush cache Extension:
  * when install done is an auto flush cache already working.
  * You can login as administrator to configure everything without clearing cache.

  ### 2.1. Configuration Options (NEW)

  Navigate to: `Stores > Configuration > Magepow > Auto Flush Cache`

  **General Settings:**
  - **Enabled**: Master on/off switch for the extension
  - **Use Intelligent Tag-Based Invalidation**: (Recommended) Enable tag-based cache invalidation for better performance
  - **Cache Types to Flush**: Select which cache types to flush (only used when tag-based invalidation is disabled)

  **Event-Specific Settings** (Control which admin actions trigger cache flushing):
  - **Flush on Configuration Save**: ✅ Enabled by default
  - **Flush on Design Configuration Change**: ✅ Enabled by default
  - **Flush on CMS Page Save**: ✅ Enabled by default
  - **Flush on CMS Block Save**: ✅ Enabled by default
  - **Flush on Product Save**: ❌ Disabled by default (can impact performance with bulk operations)
  - **Flush on Category Save**: ❌ Disabled by default (can impact performance with bulk operations)

  ### 2.2. When not installed after configure in System > tools > cache management will like below.


  ![Image of Magento admin config](https://github.com/magepow/magento-2-auto-flush-cache/blob/master/media/autoflushcache.png)

  ### 2.3. Result after install auto flush cache Extension:

   ![Image of magento store front](https://github.com/magepow/magento-2-auto-flush-cache/blob/master/media/ezgif.com-gif-maker.gif)

  ### 2.4. Recommended Production Configuration

  For best performance on production sites:
  ```
  ✓ Enabled: Yes
  ✓ Use Intelligent Tag-Based Invalidation: Yes (Recommended)
  ✓ Flush on Configuration Save: Yes
  ✓ Flush on Design Change: Yes
  ✓ Flush on CMS Page Save: Yes
  ✓ Flush on CMS Block Save: Yes
  ✗ Flush on Product Save: No (keep disabled to prevent performance issues)
  ✗ Flush on Category Save: No (keep disabled to prevent performance issues)
  ```

 ## Donation

If this project help you reduce time to develop, you can give me a cup of coffee :) 

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/paypalme/alopay)

      
**[Our Magento 2 Extensions](https://magepow.com/magento-2-extensions.html)**

* [Magento 2 Recent Sales Notification](https://magepow.com/magento-2-recent-order-notification.html)

* [Magento 2 Categories Extension](https://magepow.com/magento-categories-extension.html)

* [Magento 2 Sticky Cart](https://magepow.com/magento-sticky-cart.html)

* [Magento 2 Ajax Contact](https://magepow.com/magento-ajax-contact-form.html)

* [Magento 2 Lazy Load](https://magepow.com/magento-lazy-load.html)

* [Magento 2 Mutil Translate](https://magepow.com/magento-multi-translate.html)

* [Magento 2 Instagram Integration](https://magepow.com/magento-2-instagram.html)

* [Magento 2 Lookbook Pin Products](https://magepow.com/lookbook-pin-products.html)

* [Magento 2 Product Slider](https://magepow.com/magento-product-slider.html)

* [Magento 2 Product Banner](https://magepow.com/magento-2-banner-slider.html)

**[Our Magento 2 services](https://magepow.com/magento-services.html)**

* [PSD to Magento 2 Theme Conversion](https://alothemes.com/psd-to-magento-theme-conversion.html)

* [Magento 2 Speed Optimization Service](https://magepow.com/magento-speed-optimization-service.html)

* [Magento 2 Security Patch Installation](https://magepow.com/magento-security-patch-installation.html)

* [Magento 2 Website Maintenance Service](https://magepow.com/website-maintenance-service.html)

* [Magento 2 Professional Installation Service](https://magepow.com/professional-installation-service.html)

* [Magento 2 Upgrade Service](https://magepow.com/magento-upgrade-service.html)

* [Magento 2 Customization Service](https://magepow.com/customization-service.html)

* [Hire Magento 2 Developer](https://magepow.com/hire-magento-developer.html)

**[Our Magento 2 Themes](https://alothemes.com/)**

* [Expert Multipurpose Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/expert-premium-responsive-magento-2-and-1-support-rtl-magento-2-/21667789)

* [Gecko Premium Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/gecko-responsive-magento-2-theme-rtl-supported/24677410)

* [Milano Fashion Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/milano-fashion-responsive-magento-1-2-theme/12141971)

* [Electro 2 Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/electro2-premium-responsive-magento-2-rtl-supported/26875864)

* [Electro Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/electro-responsive-magento-1-2-theme/17042067)

* [Pizzaro Food responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/pizzaro-food-responsive-magento-1-2-theme/19438157)

* [Biolife organic responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/biolife-organic-food-magento-2-theme-rtl-supported/25712510)

* [Market responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/market-responsive-magento-2-theme/22997928)

* [Kuteshop responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/kuteshop-multipurpose-responsive-magento-1-2-theme/12985435)

* [Bencher - Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/bencher-responsive-magento-1-2-theme/15787772)

* [Supermarket Responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/supermarket-responsive-magento-1-2-theme/18447995)

**[Our Shopify Themes](https://themeforest.net/user/alotheme)**

* [Dukamarket - Multipurpose Shopify Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/dukamarket-multipurpose-shopify-theme/36158349)

* [Ohey - Multipurpose Shopify Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/ohey-multipurpose-shopify-theme/34624195)

* [Flexon - Multipurpose Shopify Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/flexon-multipurpose-shopify-theme/33461048)

**[Our Shopify App](https://apps.shopify.com/partners/maggicart)**

* [Magepow Infinite Scroll](https://apps.shopify.com/magepow-infinite-scroll)

* [Magepow Promotionbar](https://apps.shopify.com/magepow-promotionbar)

* [Magepow Size Chart](https://apps.shopify.com/magepow-size-chart)

**[Our WordPress Theme](https://themeforest.net/user/alotheme/portfolio)**

* [SadesMarket - Multipurpose WordPress Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/sadesmarket-multipurpose-wordpress-theme/35369933)
