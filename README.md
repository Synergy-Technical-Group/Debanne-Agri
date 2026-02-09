# **THM Starter Theme (Flexible Content)**
## Navigation
[Requirements](#requirements) </br>
[How To Srtart?](#how-to-start) </br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [1. Gulp File Settings](#1-gulp-file-settings)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [2. Prepare Fonts File](#2-prepare-fonts-file)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [3. Prepare SCSS](#3-prepare-scss)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [4. Prepare Flexible Content](#4-prepare-flexible-content)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [4.1 Prepare ACF PRO and Fields](#41-prepare-acf-pro-and-fields)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [4.2 Prepare PHP File for Flexible Content Section](#42-prepare-php-file-for-flexible-content-section)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [4.3 Enqueue Style and  Scripts for flexible content](#43-enqueue-style-and--scripts-for-flexible-content)</br>
[Working with CSS & JS Libraries](#working-with-css--js-libraries)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [1. Swiper](#1-swiper)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [1.1 Including Swiper JS in Scripts](#11-including-swiper-js-in-scripts)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [1.2 Including Swiper JS in Styles](#12-including-swiper-js-in-styles)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [1.3 Swiper JS - Useful links](#13-swiper-js---useful-links)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [2. FancyBox](#2-fancybox)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [2.1 Including FancyBox to Project](#21-including-fancybox-to-project)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [2.2 FancyBox - Useful links](#22-fancybox---useful-links)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [3. AOS](#3-aos)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [3.1 Including AOS to Project](#31-including-aos-to-project)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [3.2 AOS - Useful links](#32-aos---useful-links)</br>
[Theme Lazy Load](#theme-lazy-load) </br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [1. Enable/Disable Lazy Loading](#1-enabledisable-lazy-loading)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [1.1 PHP Lazy Load Setup](#11-php-lazy-load-setup)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [1.2 JS Lazy Load Script](#12-js-lazy-load-script)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [1.3. Disabling Lazy Load](#13-disabling-lazy-load)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [1.4 Skipping Lazy Load for a Single Image](#14-skipping-lazy-load-for-a-single-image)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [2. Lazy Load for Fancy box](#2-lazy-load-for-fancy-box)</br>
[SVG Sprites](#svg-sprites) </br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [1. Location and Connection of Sprites](#1-location-and-connection-of-sprites)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [2. Using Sprites in the Project](#2-using-sprites-in-the-project)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [2.1 Adding a Sprite to the Project](#21-adding-a-sprite-to-the-project)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [2.2 Using SVG Sprite in the Project](#22-using-svg-sprite-in-the-project)</br>
[Theme Helpers](#theme-helpers) </br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [PHP Helpers](#php-helpers)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [thm_display_logo( $heading_wrap )](#thmdisplaylogo-headingwrap-)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [thm_get_link( $link, $content, $attrs, $display, $content_before_title )](#thmgetlink-link-content-attrs-display-contentbeforetitle-)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [thm_display_no_img( $display, $title )](#thmdisplaynoimg-display-title-)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [thm_get_attachment_by_id( $id = -1, $size = 'full', $mobile_size = 'medium', $icon = false, $attr = array() )](#thmgetattachmentbyid-id---1-size--full-mobilesize--medium-icon--false-attr--array-)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [thm_pagination( $query )](#thmpagination-query-)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [thm_get_tel_format( $phone )](#thmgettelformat-phone-)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [thm_display_gform( $form_id, $ajax = 'true', $title = 'false', $description = 'false', $args = array() )](#thmdisplaygform-formid-ajax--true-title--false-description--false-args--array-)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [thm_display_flexible_content( $post_id = '', $name = 'flexible_content' )](#thmdisplayflexiblecontent-postid---name--flexiblecontent-)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [[thm_year_shortcode]](#thmyearshortcode)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [SCSS Helpers](#scss-helpers)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [@mixin transition($value: color 0.3s ease)](#mixin-transitionvalue-color-03s-ease)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [@mixin media-breakpoint-down($name)](#mixin-media-breakpoint-downname)</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [@mixin media-breakpoint-up($name)](#mixin-media-breakpoint-upname)</br>

## Requirements
> 1. Node v18.14 +
> 2. NPM v9.3 +
> 3. ACF PRO
## How to Start?
### 1. Gulp File Settings
> 1. Open the `gulpfile.js` file in the root of the theme
> 2. Change the `themeName` variable to the actual name of the theme
> 3. Change the `host` variable to the current site address
> 4. Change the `mode` variable to either `development` or `production` depending on the build type  
   **(Make sure to set `mode = "production"` before pushing to the server)**

### 2. Prepare Fonts File
> 1. Go to [Transfonter](https://transfonter.org/)
> 2. Upload all fonts that need to be included in the project
> 3. Select only the **WOFF2** format  
   *(The project supports only WOFF2 fonts — do not add or include other formats)*
> 4. In the **Subset** section, choose only the required language characters  
   *(Example: English = Latin)*
> 5. Download the converted fonts and place them into the folder:  
   `/src/fonts/%font-name-folder%`
> 6. Remove all unused fonts from the project
> 7. Set the theme folder path in the `$theme_folder` variable inside  
   `src/scss/_variables.scss`
> 8. Import the fonts in `fonts.scss`  
   *(Remove any imports for unused fonts)*
> 9. Define font-related SCSS variables in `src/scss/_variables.scss`
> 10. Fonts are loaded as critical CSS using the `thm_enqueue_critical_resources` function in  
    `includes/enqueue-scripts.php`
> 11. Fonts that are used across all pages are preloaded via the `thm_preload_fonts` function in  
    `includes/enqueue-scripts.php`.  
    **If preloading is not needed, it can be disabled — but if preloads are used, make sure the list is always up to date.**

### 3. Prepare SCSS
> 1. Fill in all core variables in `src/scss/_variables.scss`  
   (colors, fonts, sizes, etc.)
> 2. Define base typography and global styles in  
   `src/scss/_typography.scss` and `src/scss/_base.scss`

### 4. Prepare Flexible Content
#### 4.1 Prepare ACF PRO and Fields
> 1. Install the ACF Pro plugin
> 2. Go to **ACF > Field Groups > Sync** tab and synchronize all available fields
> 3. To add a new section to the Flexible Content field, create a new field group and define all necessary fields inside it.  
   Make sure to set the field group's location to **Clone Location**
> 4. Once the field group is configured, go to the field group that contains the **Flexible Content** field
> 5. In the Flexible Content group, create a new layout and add a field of type **Clone**.  
   Leave all settings as default **except** for the **Fields** setting
> 6. In the **Fields** setting of the Clone field, search for the field group you created for the new section and select **All Fields from %NAME_OF_GROUP%**
#### 4.2 Prepare PHP File for Flexible Content Section
> 1. In the `parts/flexible` folder, create a file named in the format:  
   `flexible-%acf-section-field-name%.php`  
   **Note:** even if your ACF section field name uses underscores (`_`), the filename must use hyphens (`-`) instead.
> 2. Add the section's layout code inside that file.
> 3. Connect the section to the SCSS styles through the template logic.
> 4. In the WordPress admin, open the page editor and assign the template  
   **Flexible Content** (registered in `templates/template-flexible-content.php`)
> 5. Add the required sections and check the output on the frontend.
> 6. Note that `template-flexible-content.php` renders the content using the function  
   `thm_display_flexible_content()`, which is located in `includes/theme-helpers.php`.  
   This function allows reusing the Flexible Content logic elsewhere — for example, on archive pages using ACF Options.  
   In that case, you can call the function with a custom target like:
   `thm_display_flexible_content( 'options' );` where 'options' can be a post ID, object ID, or a registered custom ACF location key for Options Page.
#### 4.3 Enqueue Style and  Scripts for flexible content
> 1. The SCSS file for the flexible content section should be added to the src/scss/flexible folder. The file name must match the PHP template filename (excluding the extension), using the .scss extension. 
> 2. The JavaScript file should be added to the src/js/flexible folder. The file name must also match the PHP template filename (excluding the extension), using the .js extension. 
> 3. Styles and scripts are enqueued in the includes/enqueue-scripts.php file, inside the thm_enqueue_scripts_flexible_sections() function. 
> 4. Inside the thm_enqueue_scripts_flexible_sections() function, the $flexible_sections array must be populated using the following structure:
> ```php
> 'main-hero' => array(
>   'css' => array(
>      'path'   => '/dist/css/flexible/flexible-main-hero.css',
>      'deps'   => array(),
>      'inline' => true // !!! Should be false if the section is not the First Screen
>   ),
>   'js' => array(
>      'path'     => '/dist/js/flexible/flexible-main-hero.min.js',
>      'deps'     => array(),
>      'strategy' => array(
>         'in_footer' => true,
>         'strategy'  => 'defer'
>      )
>   )
> )
> ```
> A. CSS:
>```php
> 'path' => '/dist/css/flexible/flexible-main-hero.css' — Path to the file relative to the theme root
> 'deps' => array() — Style dependencies
> 'inline' => true — Should be true only if the section is the First Screen (e.g., a hero section). 
>                   If the section is not always first or appears below the fold, always set to false.
> ```
> B. JS:
> ```php
> 'path' => '/dist/js/flexible/flexible-main-hero.min.js' — Path to the file relative to the theme root
> 'deps' => array() — Script dependencies, e.g., array('jquery')
> 'strategy' => array( 'in_footer' => true, 'strategy' => 'defer' )
>     'in_footer' —  Whether the script should be loaded in the footer
>     'strategy' — Loading strategy; keep 'defer' unless the script fails to load correctly, in which case false can be used.
> ```
## Working with CSS & JS Libraries
### 1. Swiper
ℹ️ Note: Swiper JS is installed via Node Modules and does not require registration through wp_enqueue_script.
### 1.1 Including Swiper JS in Scripts
>1. Open the JS file that will handle the slider initialization in your project. 
>2. At the beginning of the file, import Swiper and only the modules you need for your slider (avoid importing unused modules): 
> ```js
> import Swiper from 'swiper';
> import { Navigation } from 'swiper/modules';
> ```
> When initializing the slider, you must specify the modules you are using. 
>
> Example:
> ```js
> let swiper = new Swiper('.hero-slider__list', {
>  modules: [Navigation], <-------------
>  navigation: {
>     nextEl: '.swiper-button-next',
>     prevEl: '.swiper-button-prev',
>  },
>});
>```
### 1.2 Including Swiper JS in Styles
>1. Open the SCSS file that will be connected to the section responsible for the slider styles..
>2. At the beginning of the file, import styles for Swiper and only the modules you need for your slider (avoid importing unused modules):
>```scss
> @use "swiper/swiper" as *;
> @use "swiper/modules/navigation" as *;
> ```

### 1.3 Swiper JS - Useful links
🔗 [Swiper Scss Structure](https://swiperjs.com/swiper-api#scss-styles)</br>
🔗 [Swiper Modules](https://swiperjs.com/swiper-api#modules)</br>
🔗 [Swiper Initialize](https://swiperjs.com/swiper-api#initialize-swiper)

### 2. FancyBox
ℹ️ Note: FancyBox is installed via Node Modules and does not require downloading files for project.

### 2.1 Including FancyBox to Project
>1. The library’s script file are enqueued in the `enqueue-scripts.php` file inside the `thm_enqueue_resources()` function.
> ```php
> wp_register_script( 'thm-fancybox', get_template_directory_uri() . '/dist/js/libs/fancybox.min.js', array(), THM_VERSION, array(
>            'in_footer' => true,
>            'strategy'  => 'defer'
>) );
>```
>The library’s style file are enqueued in the thm-fancybox script
> ```js
> window.addEventListener('DOMContentLoaded', () => {
>    const link = document.createElement('link');
>    link.rel = 'stylesheet';
>    link.id  = 'thm-fancybox';
>    link.href = thmLocalize.themeUrl + '/dist/css/libs/fancybox.css';
>    document.head.appendChild(link);
>});
> ```
>2. Create a JS file for the section that will initialize Fancybox.
>```js 
> Fancybox.bind("[data-fancybox]", {});
>```
> Enqueue the section’s styles and scripts, and add Fancybox as a dependency <br/>
> Example 
>```php
> 'fancy-box-gallery' => array(
>    'js' => array(
>        'path'     => '/dist/js/flexible/flexible-fancy-box-gallery.min.js',
>        'deps'     => array('thm-fancybox'), <------------
>        'strategy' => array(
>            'in_footer'  => true,
>            'strategy'   => 'defer'
>        )
>    )
>)
>```

### 2.2 FancyBox - Useful links
🔗 [FancyBox Usage](https://fancyapps.com/fancybox/get-started/usage/) </br>
🔗 [FancyBox Image Example](https://fancyapps.com/fancybox/guides/images/) </br>
🔗 [FancyBox Options](https://fancyapps.com/fancybox/api/options/)

### 3. AOS
ℹ️ Note: AOS is installed via Node Modules and does not require downloading files for project.

### 3.1 Including AOS to Project
>1. The library’s script file are enqueued in the `enqueue-scripts.php` file inside the `thm_enqueue_resources()` function.
>```php
>wp_register_script( 'thm-aos', get_template_directory_uri() . '/dist/js/libs/aos.min.js', array(), THM_VERSION, array(
>            'in_footer' => true,
>            'strategy'  => 'defer'
>) );
>```
>The library’s style file are enqueued in the thm-fancybox script
> ```js
> function loadAOS(callback) {
>    const link = document.createElement('link');
>    link.rel = 'stylesheet';
>    link.id  = 'thm-aos';
>    link.href = thmLocalize.themeUrl + '/dist/css/libs/aos.css';
>    document.head.appendChild(link);
>
>    AOS.init();
> }
> ```
>2. Initialization occurs directly in the src/js/libs/aos.js file where it is imported and does not require any additional declarations in other JS files.
>```js 
> AOS.init();
>```
> Enqueue the section’s styles and scripts, and add AOS as a dependency <br/>
> Example
> ```php
> 'fancy-box-gallery' => array(
>  'js' => array(
>     'path'     => '/dist/js/flexible/flexible-fancy-box-gallery.min.js',
>	  'deps'     => array('thm-fancybox', 'thm-aos'),  <------------
>	  'strategy' => array(
>	     'in_footer'  => true,
>              'strategy'   => 'defer'
>        )
>     )
>)
> ```

### 3.2 AOS - Useful links
🔗 [AOS DEMO](https://michalsnik.github.io/aos/) </br>
🔗 [AOS Documentation](https://github.com/michalsnik/aos) </br>

## Theme Lazy Load
## 1. Enable/Disable Lazy Loading
### 1.1 PHP Lazy Load Setup
>The PHP integration for lazy loading is located at `includes/theme-support.php`. It is enabled with the following filter `add_filter('wp_get_attachment_image_attributes', 'thm_theme_lazy_load', 10, 1);` </br>
> This filter replaces all src attributes with data-src so that images are not loaded immediately, but only when they appear in the viewport.
> Works for images rendered with `wp_get_attachment_image()` & `thm_get_attachment_by_id()`
### 1.2 JS Lazy Load Script
>JS Lazy Load Script The JS file that handles lazy loading is located at: `src/js/thm-lazy-load.js`. The script is enqueued in `includes/enqueue-scripts.php` inside the `thm_enqueue_resources()` function:
> ```php
> wp_enqueue_script(
>    'thm-lazy-load',
>    get_template_directory_uri() . '/dist/js/thm-lazy-load.min.js',
>    array(),
>    THM_VERSION,
>    array(
>        'in_footer' => true,
>        'strategy'  => 'defer'
>    )
> );
> ```
### 1.3. Disabling Lazy Load
> To completely disable lazy loading in the project: 
> 1. Remove the PHP filter and JS script enqueue from the theme. 
> 2. Delete the lazy load script and its related code from the theme.
### 1.4 Skipping Lazy Load for a Single Image
> To exclude a specific image from lazy loading, pass the `skip-lazy` class via the function arguments:
> ```php
> echo thm_get_attachment_by_id($image, 'large', 'medium', false, array(
>     'class' => 'hero-slider__image skip-lazy',
> ));
> ```
> Note: Lazy loading is usually disabled for the first screen (the first section of the page) to ensure immediate rendering.

## 2. Lazy Load for Fancy box
> Fancybox provides multiple options to bypass lazy loading when working with dynamic image galleries.
> 1. Lazy Load Handling in `thm-lazy-load.js`
>     If the page is loaded with a Fancybox opened via URL hash, images inside Fancybox are preloaded automatically:
> ```js
> // Skip Fancybox if URL has hash
> let fancyBoxItems = document.querySelectorAll('[data-fancybox]');
>
> if (fancyBoxItems.length) {
> const hashUrl = window.location.hash;
>
>    // Load images on page load if opened via hash
>    fancyBoxItems.forEach(link => {
>        let fancyAttribute = link.getAttribute('data-fancybox');
>
>        if (hashUrl && hashUrl.toLowerCase().includes(fancyAttribute)) {
>            let img = link.querySelector('img:not(.skip-lazy)');
>            loadImage(img);
>        }
>    });
>
>    // Load images on Fancybox click
>    fancyBoxItems.forEach(link => {
>        link.addEventListener('click', function () {
>            let img = link.querySelector('img:not(.skip-lazy)');
>            loadImage(img);
>        });
>    });
> }
> ```
> The Code checks if the page URL contains a hash that matches the data-fancybox attribute and automatically loads the image when Fancybox is opened.
> 2. Lazy Load Handling in the Section JS File
    In the Fancybox initialization file (example: `src/js/flexible/flexible-fancy-box-gallery.js`),
    you can also add an exception via the `ready` event:
> ```js
> Fancybox.bind("[data-fancybox]", {
>   on: {
>       ready: (fancyboxRef) => {
>           let fancyBoxItems = document.querySelectorAll('[data-fancybox]');
> 
>             if (fancyBoxItems.length) {
>                 const hashUrl = window.location.hash;
> 
>                 fancyBoxItems.forEach(link => {
>                     let fancyAttribute = link.getAttribute('data-fancybox');
> 
>                     if (hashUrl && hashUrl.toLowerCase().includes(fancyAttribute)) {
>                         let img = link.querySelector('img:not(.skip-lazy)');
> 
>                         if (!img || !img.dataset.src) return;
> 
>                         img.src = img.dataset.src;
>                         if (img.dataset.srcset) img.srcset = img.dataset.srcset;
>                         if (img.dataset.sizes) img.sizes = img.dataset.sizes;
> 
>                         img.classList.add('lazy-loaded');
>                         img.removeAttribute('data-src');
>                     }
>                 });
>             }
>         },
>     },
> });
> ```
> Triggers image preload inside Fancybox when the modal is opened. </br>
> Useful if some images remain lazy-loaded when the gallery opens.

## SVG Sprites
ℹ️ The theme uses SVG sprites to improve DOM structure and optimize performance.
Benefits of Using SVG Sprites </br>
✅ Reduces the number of inline SVGs in the DOM.</br>
✅ Optimizes page rendering by minimizing repeated SVG code.</br>
✅ Easier to manage and update icons in a single file.</br>
### 1. Location and Connection of Sprites
>1. The sprite file is located at `parts/svg-sprites.php`.
>2. The sprite is included in the project `footer` using the `wp_footer` action.
> The function that adds the sprite to the footer is `thm_theme_svg_sprites` and is located in `includes/theme-support.php`.
> ```php
> if ( ! function_exists( 'thm_theme_svg_sprites' ) ) {
>	    add_action('wp_footer', 'thm_theme_svg_sprites', 999);
>
>	    function thm_theme_svg_sprites() {
>          get_template_part('parts/svg-sprites');
>	    }
> }
> ```
### 2. Using Sprites in the Project
#### 2.1 Adding a Sprite to the Project
>1. To add a sprite, open the file `parts/svg-sprites.php.`
>This file already contains an example of a connected SVG chevron in the project:
> ```xml
> <symbol id="icon-chevron" viewBox="0 0 640 640">
>   <path d="M297.4 470.6C309.9 483.1 330.2 483.1 342.7 470.6L534.7 278.6C547.2 266.1 547.2 245.8 534.7 233.3C522.2 220.8 501.9 220.8 489.4 233.3L320 402.7L150.6 233.4C138.1 220.9 117.8 220.9 105.3 233.4C92.8 245.9 92.8 266.2 105.3 278.7L297.3 470.7z"/>
> </symbol> 
>```
>2. To add your own SVG element, add a new `<symbol>` tag below the existing ones with:
>- A `unique ID` 
>- The original `viewBox` from your SVG file
>- The `inner SVG content` (everything inside svg but without the svg tag itself)
>Full Code Example
>```xml
> <svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
>    <symbol id="icon-chevron" viewBox="0 0 640 640">
>	    <path d="M297.4 470.6C309.9 483.1 330.2 483.1 342.7 470.6L534.7 278.6C547.2 266.1 547.2 245.8 534.7 233.3C522.2 220.8 501.9 220.8 489.4 233.3L320 402.7L150.6 233.4C138.1 220.9 117.8 220.9 105.3 233.4C92.8 245.9 92.8 266.2 105.3 278.7L297.3 470.7z"/>
>    </symbol>
>    <symbol id="%YOUR_ID%" viewBox="%SVG_VIEWBOX%">
>       <!-- SVG CONTENT HERE -->
>    </symbol>
> </svg>
>```
#### 2.2 Using SVG Sprite in the Project
> To use a sprite in the project, insert the following structure where you want it to appear:
> ```xml
> <svg class="icon icon-search">
>    <use xlink:href="#%YOUR_ID%"></use>
> </svg>
> ```
> Where `xlink:href` contains the ID you assigned to the `<symbol>` in the sprite file. </br>
> Make sure to add # before the ID.</br></br>
> Code Example
> ```xml
> <svg class="icon" width="18" height="18">
>   <use xlink:href="#icon-chevron"></use>
> </svg>
> ```
## Theme Helpers
### PHP Helpers
### thm_display_logo( $heading_wrap )
> Function `thm_display_logo( $heading_wrap )` Outputs the project logo </br></br>
> Parameters:
> ```text
> $heading_wrap (bool) – Accepts true or false. If true, wraps the logo in an additional <div>
> ```

### thm_get_link( $link, $content, $attrs, $display, $content_before_title )
> Function `thm_get_link( $link, $content, $attrs, $display, $content_before_title )` – Outputs a link with all attributes
Useful for quickly displaying ACF link fields, since it applies all required attributes automatically. </br></br>
> Parameters:
> ```text
> $link (array|string) – ACF link array or a simple link string
> $content – Additional content before or after the link text (If $link is a string, this will be used as the link text)
> $attrs (array) – Link attributes (e.g., aria-label)
> $display (bool) –
>   true – outputs the link directly
>   false – returns it as a string
> $content_before_title (bool) –
>   true – $content before link text
>   false – $content after link text
> ```

### thm_display_no_img( $display, $title )
> Function `thm_display_no_img( $display, $title )` – Outputs a placeholder image
Used as a fallback when no image exists. </br></br>
> Parameters:
> ```text
> $display (bool) –
>   true – outputs image with echo
>   false – returns image as a string
> $title (string) – Used as the alt attribute if not defined elsewhere
> ```

### thm_get_attachment_by_id( $id = -1, $size = 'full', $mobile_size = 'medium', $icon = false, $attr = array() )
> Function `thm_get_attachment_by_id( $id = -1, $size = 'full', $mobile_size = 'medium', $icon = false, $attr = array() )` – Returns an image with all attributes </br></br>
> Parameters:
> ```text
> $id (int) – Image ID
> $size (string) – Desktop image size
> $mobile_size (string) – Mobile image size
> $icon (bool) – Whether to treat the image as an icon
> $attr (array) – Additional image attributes
> ```

### thm_pagination( $query )
> Function `thm_pagination( $query )` – Outputs pagination for WP_Query </br></br>
> Parameters:
> ```text
> $query (array|WP_Query) – If not provided, uses the global query. Otherwise, pass a new WP_Query() instance
> ```

### thm_get_tel_format( $phone )
> Function `thm_get_tel_format( $phone )` – Formats a phone number for a tel: link </br></br>
> Parameters:
> ```text
> $phone (string) – The raw phone number string
> ```

### thm_display_gform( $form_id, $ajax = 'true', $title = 'false', $description = 'false', $args = array() )
> Function ` thm_display_gform( $form_id, $ajax = 'true', $title = 'false', $description = 'false', $args = array() )` – Outputs a Gravity Form </br></br>
> Parameters:
> ```text
> $form_id (int) – Form ID
> $ajax (string) – 'true' or 'false', whether to use AJAX submission
> $title (string) – 'true' or 'false', whether to display the form title
> $description (string) – 'true' or 'false', whether to display the form description
> $args (array) – Additional shortcode attributes if needed
> ```

### thm_display_flexible_content( $post_id = '', $name = 'flexible_content' )
> Function `thm_display_flexible_content( $post_id = '', $name = 'flexible_content' )` – Outputs ACF Flexible Content markup </br></br>
> Parameters:
> ```text
> $post_id (int|string) – Page ID or string like 'options'
> $name (string) – Name of the ACF flexible content field
> ```

### [thm_year_shortcode]
> Shortcode [thm_year_shortcode] – Returns the current year


### SCSS Helpers
### @mixin transition($value: color 0.3s ease)
> Mixin `@mixin transition($value: color 0.3s ease)` – Adds transition to elements</br></br>
> Parameters:
> ```text
> $value (string)  – Property to animate. If empty, defaults to color 0.3s ease.
> ```
> Example:
> ```scss
> @include transition();           // Defaults to color 0.3s ease
> @include transition(opacity 0.2s linear);
>```

### @mixin media-breakpoint-down($name)
> Mixin `@mixin media-breakpoint-down($name)` – Adds a max-width media query
Equivalent to @media (max-width: ...) using values from $grid-breakpoints.
</br></br>
> Parameters:
> ```text
> $name (string) – Name of the breakpoint (e.g. 'md', 'lg') defined in the $grid-breakpoints map.
> ```
> Example:
> ```scss
> @include media-breakpoint-down(md) {
>    font-size: 14px;
> }
>```

### @mixin media-breakpoint-up($name)
> Mixin `@mixin media-breakpoint-up($name) ` – Adds a min-width media query
Equivalent to @media (min-width: ...) using values from $grid-breakpoints.
</br></br>
> Parameters:
> ```text
> $name (string) – Name of the breakpoint (e.g. 'md', 'lg') defined in the $grid-breakpoints map.
> ```
> Example:
> ```scss
> @include media-breakpoint-up(lg) {
>    font-size: 18px;
> }
>```
