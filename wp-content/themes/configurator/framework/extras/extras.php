<?php

configurator_require_file ( CONFIGURATOR_EXTRAS . '/amz-wishlist/amz-wishlist.php' );
configurator_require_file ( CONFIGURATOR_EXTRAS . '/configurator-like-me/like-me.php' );
configurator_require_file ( CONFIGURATOR_EXTRAS . '/configurator-menu-extend/configurator-menu-extend.php' );
configurator_require_file ( CONFIGURATOR_EXTRAS . '/configurator-sidebars/configurator-sidebars.php' );

/* =============================================================================
Icon Font Array
========================================================================== */

function configurator_load_icon_fonts(){
	
	$pix_icons = array( 'fab fa-500px', 'fab fa-accessible-icon', 'fab fa-accusoft', 'fab fa-adn', 'fab fa-adversal', 'fab fa-affiliatetheme', 'fab fa-algolia', 'fab fa-alipay', 'fab fa-amazon', 'fab fa-amazon-pay', 'fab fa-amilia', 'fab fa-android', 'fab fa-angellist', 'fab fa-angrycreative', 'fab fa-angular', 'fab fa-app-store', 'fab fa-app-store-ios', 'fab fa-apper', 'fab fa-apple', 'fab fa-apple-pay', 'fab fa-asymmetrik', 'fab fa-audible', 'fab fa-autoprefixer', 'fab fa-avianex', 'fab fa-aviato', 'fab fa-aws', 'fab fa-bandcamp', 'fab fa-behance', 'fab fa-behance-square', 'fab fa-bimobject', 'fab fa-bitbucket', 'fab fa-bitcoin', 'fab fa-bity', 'fab fa-black-tie', 'fab fa-blackberry', 'fab fa-blogger', 'fab fa-blogger-b', 'fab fa-bluetooth', 'fab fa-bluetooth-b', 'fab fa-btc', 'fab fa-buromobelexperte', 'fab fa-buysellads', 'fab fa-cc-amazon-pay', 'fab fa-cc-amex', 'fab fa-cc-apple-pay', 'fab fa-cc-diners-club', 'fab fa-cc-discover', 'fab fa-cc-jcb', 'fab fa-cc-mastercard', 'fab fa-cc-paypal', 'fab fa-cc-stripe', 'fab fa-cc-visa', 'fab fa-centercode', 'fab fa-chrome', 'fab fa-cloudscale', 'fab fa-cloudsmith', 'fab fa-cloudversify', 'fab fa-codepen', 'fab fa-codiepie', 'fab fa-connectdevelop', 'fab fa-contao', 'fab fa-cpanel', 'fab fa-creative-commons', 'fab fa-creative-commons-by', 'fab fa-creative-commons-nc', 'fab fa-creative-commons-nc-eu', 'fab fa-creative-commons-nc-jp', 'fab fa-creative-commons-nd', 'fab fa-creative-commons-pd', 'fab fa-creative-commons-pd-alt', 'fab fa-creative-commons-remix', 'fab fa-creative-commons-sa', 'fab fa-creative-commons-sampling', 'fab fa-creative-commons-sampling-plus', 'fab fa-creative-commons-share', 'fab fa-css3', 'fab fa-css3-alt', 'fab fa-cuttlefish', 'fab fa-d-and-d', 'fab fa-dashcube', 'fab fa-delicious', 'fab fa-deploydog', 'fab fa-deskpro', 'fab fa-deviantart', 'fab fa-digg', 'fab fa-digital-ocean', 'fab fa-discord', 'fab fa-discourse', 'fab fa-dochub', 'fab fa-docker', 'fab fa-draft2digital', 'fab fa-dribbble', 'fab fa-dribbble-square', 'fab fa-dropbox', 'fab fa-drupal', 'fab fa-dyalog', 'fab fa-earlybirds', 'fab fa-ebay', 'fab fa-edge', 'fab fa-elementor', 'fab fa-ello', 'fab fa-ember', 'fab fa-empire', 'fab fa-envira', 'fab fa-erlang', 'fab fa-ethereum', 'fab fa-etsy', 'fab fa-expeditedssl', 'fab fa-facebook', 'fab fa-facebook-f', 'fab fa-facebook-messenger', 'fab fa-facebook-square', 'fab fa-firefox', 'fab fa-first-order', 'fab fa-first-order-alt', 'fab fa-firstdraft', 'fab fa-flickr', 'fab fa-flipboard', 'fab fa-fly', 'fab fa-font-awesome', 'fab fa-font-awesome-alt', 'fab fa-font-awesome-flag', 'fab fa-font-awesome-logo-full', 'fab fa-fonticons', 'fab fa-fonticons-fi', 'fab fa-fort-awesome', 'fab fa-fort-awesome-alt', 'fab fa-forumbee', 'fab fa-foursquare', 'fab fa-free-code-camp', 'fab fa-freebsd', 'fab fa-fulcrum', 'fab fa-galactic-republic', 'fab fa-galactic-senate', 'fab fa-get-pocket', 'fab fa-gg', 'fab fa-gg-circle', 'fab fa-git', 'fab fa-git-square', 'fab fa-github', 'fab fa-github-alt', 'fab fa-github-square', 'fab fa-gitkraken', 'fab fa-gitlab', 'fab fa-gitter', 'fab fa-glide', 'fab fa-glide-g', 'fab fa-gofore', 'fab fa-goodreads', 'fab fa-goodreads-g', 'fab fa-google', 'fab fa-google-drive', 'fab fa-google-play', 'fab fa-google-plus', 'fab fa-google-plus-g', 'fab fa-google-plus-square', 'fab fa-google-wallet', 'fab fa-gratipay', 'fab fa-grav', 'fab fa-gripfire', 'fab fa-grunt', 'fab fa-gulp', 'fab fa-hacker-news', 'fab fa-hacker-news-square', 'fab fa-hackerrank', 'fab fa-hips', 'fab fa-hire-a-helper', 'fab fa-hooli', 'fab fa-hornbill', 'fab fa-hotjar', 'fab fa-houzz', 'fab fa-html5', 'fab fa-hubspot', 'fab fa-imdb', 'fab fa-instagram', 'fab fa-internet-explorer', 'fab fa-ioxhost', 'fab fa-itunes', 'fab fa-itunes-note', 'fab fa-java', 'fab fa-jedi-order', 'fab fa-jenkins', 'fab fa-joget', 'fab fa-joomla', 'fab fa-js', 'fab fa-js-square', 'fab fa-jsfiddle', 'fab fa-kaggle', 'fab fa-keybase', 'fab fa-keycdn', 'fab fa-kickstarter', 'fab fa-kickstarter-k', 'fab fa-korvue', 'fab fa-laravel', 'fab fa-lastfm', 'fab fa-lastfm-square', 'fab fa-leanpub', 'fab fa-less', 'fab fa-line', 'fab fa-linkedin', 'fab fa-linkedin-in', 'fab fa-linode', 'fab fa-linux', 'fab fa-lyft', 'fab fa-magento', 'fab fa-mailchimp', 'fab fa-mandalorian', 'fab fa-markdown', 'fab fa-mastodon', 'fab fa-maxcdn', 'fab fa-medapps', 'fab fa-medium', 'fab fa-medium-m', 'fab fa-medrt', 'fab fa-meetup', 'fab fa-megaport', 'fab fa-microsoft', 'fab fa-mix', 'fab fa-mixcloud', 'fab fa-mizuni', 'fab fa-modx', 'fab fa-monero', 'fab fa-napster', 'fab fa-neos', 'fab fa-nimblr', 'fab fa-nintendo-switch', 'fab fa-node', 'fab fa-node-js', 'fab fa-npm', 'fab fa-ns8', 'fab fa-nutritionix', 'fab fa-odnoklassniki', 'fab fa-odnoklassniki-square', 'fab fa-old-republic', 'fab fa-opencart', 'fab fa-openid', 'fab fa-opera', 'fab fa-optin-monster', 'fab fa-osi', 'fab fa-page4', 'fab fa-pagelines', 'fab fa-palfed', 'fab fa-patreon', 'fab fa-paypal', 'fab fa-periscope', 'fab fa-phabricator', 'fab fa-phoenix-framework', 'fab fa-phoenix-squadron', 'fab fa-php', 'fab fa-pied-piper', 'fab fa-pied-piper-alt', 'fab fa-pied-piper-hat', 'fab fa-pied-piper-pp', 'fab fa-pinterest', 'fab fa-pinterest-p', 'fab fa-pinterest-square', 'fab fa-playstation', 'fab fa-product-hunt', 'fab fa-pushed', 'fab fa-python', 'fab fa-qq', 'fab fa-quinscape', 'fab fa-quora', 'fab fa-r-project', 'fab fa-ravelry', 'fab fa-react', 'fab fa-readme', 'fab fa-rebel', 'fab fa-red-river', 'fab fa-reddit', 'fab fa-reddit-alien', 'fab fa-reddit-square', 'fab fa-rendact', 'fab fa-renren', 'fab fa-replyd', 'fab fa-researchgate', 'fab fa-resolving', 'fab fa-rev', 'fab fa-rocketchat', 'fab fa-rockrms', 'fab fa-safari', 'fab fa-sass', 'fab fa-schlix', 'fab fa-scribd', 'fab fa-searchengin', 'fab fa-sellcast', 'fab fa-sellsy', 'fab fa-servicestack', 'fab fa-shirtsinbulk', 'fab fa-shopware', 'fab fa-simplybuilt', 'fab fa-sistrix', 'fab fa-sith', 'fab fa-skyatlas', 'fab fa-skype', 'fab fa-slack', 'fab fa-slack-hash', 'fab fa-slideshare', 'fab fa-snapchat', 'fab fa-snapchat-ghost', 'fab fa-snapchat-square', 'fab fa-soundcloud', 'fab fa-speakap', 'fab fa-spotify', 'fab fa-squarespace', 'fab fa-stack-exchange', 'fab fa-stack-overflow', 'fab fa-staylinked', 'fab fa-steam', 'fab fa-steam-square', 'fab fa-steam-symbol', 'fab fa-sticker-mule', 'fab fa-strava', 'fab fa-stripe', 'fab fa-stripe-s', 'fab fa-studiovinari', 'fab fa-stumbleupon', 'fab fa-stumbleupon-circle', 'fab fa-superpowers', 'fab fa-supple', 'fab fa-teamspeak', 'fab fa-telegram', 'fab fa-telegram-plane', 'fab fa-tencent-weibo', 'fab fa-the-red-yeti', 'fab fa-themeco', 'fab fa-themeisle', 'fab fa-trade-federation', 'fab fa-trello', 'fab fa-tripadvisor', 'fab fa-tumblr', 'fab fa-tumblr-square', 'fab fa-twitch', 'fab fa-twitter', 'fab fa-twitter-square', 'fab fa-typo3', 'fab fa-uber', 'fab fa-uikit', 'fab fa-uniregistry', 'fab fa-untappd', 'fab fa-usb', 'fab fa-ussunnah', 'fab fa-vaadin', 'fab fa-viacoin', 'fab fa-viadeo', 'fab fa-viadeo-square', 'fab fa-viber', 'fab fa-vimeo', 'fab fa-vimeo-square', 'fab fa-vimeo-v', 'fab fa-vine', 'fab fa-vk', 'fab fa-vnv', 'fab fa-vuejs', 'fab fa-weebly', 'fab fa-weibo', 'fab fa-weixin', 'fab fa-whatsapp', 'fab fa-whatsapp-square', 'fab fa-whmcs', 'fab fa-wikipedia-w', 'fab fa-windows', 'fab fa-wix', 'fab fa-wolf-pack-battalion', 'fab fa-wordpress', 'fab fa-wordpress-simple', 'fab fa-wpbeginner', 'fab fa-wpexplorer', 'fab fa-wpforms', 'fab fa-xbox', 'fab fa-xing', 'fab fa-xing-square', 'fab fa-y-combinator', 'fab fa-yahoo', 'fab fa-yandex', 'fab fa-yandex-international', 'fab fa-yelp', 'fab fa-yoast', 'fab fa-youtube', 'fab fa-youtube-square', 'fab fa-zhihu', 'fas fa-ad', 'fas fa-address-book', 'fas fa-address-card', 'fas fa-adjust', 'fas fa-air-freshener', 'fas fa-align-center', 'fas fa-align-justify', 'fas fa-align-left', 'fas fa-align-right', 'fas fa-allergies', 'fas fa-ambulance', 'fas fa-american-sign-language-interpreting', 'fas fa-anchor', 'fas fa-angle-double-down', 'fas fa-angle-double-left', 'fas fa-angle-double-right', 'fas fa-angle-double-up', 'fas fa-angle-down', 'fas fa-angle-left', 'fas fa-angle-right', 'fas fa-angle-up', 'fas fa-angry', 'fas fa-ankh', 'fas fa-apple-alt', 'fas fa-archive', 'fas fa-archway', 'fas fa-arrow-alt-circle-down', 'fas fa-arrow-alt-circle-left', 'fas fa-arrow-alt-circle-right', 'fas fa-arrow-alt-circle-up', 'fas fa-arrow-circle-down', 'fas fa-arrow-circle-left', 'fas fa-arrow-circle-right', 'fas fa-arrow-circle-up', 'fas fa-arrow-down', 'fas fa-arrow-left', 'fas fa-arrow-right', 'fas fa-arrow-up', 'fas fa-arrows-alt', 'fas fa-arrows-alt-h', 'fas fa-arrows-alt-v', 'fas fa-assistive-listening-systems', 'fas fa-asterisk', 'fas fa-at', 'fas fa-atlas', 'fas fa-atom', 'fas fa-audio-description', 'fas fa-award', 'fas fa-backspace', 'fas fa-backward', 'fas fa-balance-scale', 'fas fa-ban', 'fas fa-band-aid', 'fas fa-barcode', 'fas fa-bars', 'fas fa-baseball-ball', 'fas fa-basketball-ball', 'fas fa-bath', 'fas fa-battery-empty', 'fas fa-battery-full', 'fas fa-battery-half', 'fas fa-battery-quarter', 'fas fa-battery-three-quarters', 'fas fa-bed', 'fas fa-beer', 'fas fa-bell', 'fas fa-bell-slash', 'fas fa-bezier-curve', 'fas fa-bible', 'fas fa-bicycle', 'fas fa-binoculars', 'fas fa-birthday-cake', 'fas fa-blender', 'fas fa-blind', 'fas fa-bold', 'fas fa-bolt', 'fas fa-bomb', 'fas fa-bone', 'fas fa-bong', 'fas fa-book', 'fas fa-book-open', 'fas fa-book-reader', 'fas fa-bookmark', 'fas fa-bowling-ball', 'fas fa-box', 'fas fa-box-open', 'fas fa-boxes', 'fas fa-braille', 'fas fa-brain', 'fas fa-briefcase', 'fas fa-briefcase-medical', 'fas fa-broadcast-tower', 'fas fa-broom', 'fas fa-brush', 'fas fa-bug', 'fas fa-building', 'fas fa-bullhorn', 'fas fa-bullseye', 'fas fa-burn', 'fas fa-bus', 'fas fa-bus-alt', 'fas fa-business-time', 'fas fa-calculator', 'fas fa-calendar', 'fas fa-calendar-alt', 'fas fa-calendar-check', 'fas fa-calendar-minus', 'fas fa-calendar-plus', 'fas fa-calendar-times', 'fas fa-camera', 'fas fa-camera-retro', 'fas fa-cannabis', 'fas fa-capsules', 'fas fa-car', 'fas fa-car-alt', 'fas fa-car-battery', 'fas fa-car-crash', 'fas fa-car-side', 'fas fa-caret-down', 'fas fa-caret-left', 'fas fa-caret-right', 'fas fa-caret-square-down', 'fas fa-caret-square-left', 'fas fa-caret-square-right', 'fas fa-caret-square-up', 'fas fa-caret-up', 'fas fa-cart-arrow-down', 'fas fa-cart-plus', 'fas fa-certificate', 'fas fa-chalkboard', 'fas fa-chalkboard-teacher', 'fas fa-charging-station', 'fas fa-chart-area', 'fas fa-chart-bar', 'fas fa-chart-line', 'fas fa-chart-pie', 'fas fa-check', 'fas fa-check-circle', 'fas fa-check-double', 'fas fa-check-square', 'fas fa-chess', 'fas fa-chess-bishop', 'fas fa-chess-board', 'fas fa-chess-king', 'fas fa-chess-knight', 'fas fa-chess-pawn', 'fas fa-chess-queen', 'fas fa-chess-rook', 'fas fa-chevron-circle-down', 'fas fa-chevron-circle-left', 'fas fa-chevron-circle-right', 'fas fa-chevron-circle-up', 'fas fa-chevron-down', 'fas fa-chevron-left', 'fas fa-chevron-right', 'fas fa-chevron-up', 'fas fa-child', 'fas fa-church', 'fas fa-circle', 'fas fa-circle-notch', 'fas fa-city', 'fas fa-clipboard', 'fas fa-clipboard-check', 'fas fa-clipboard-list', 'fas fa-clock', 'fas fa-clone', 'fas fa-closed-captioning', 'fas fa-cloud', 'fas fa-cloud-download-alt', 'fas fa-cloud-upload-alt', 'fas fa-cocktail', 'fas fa-code', 'fas fa-code-branch', 'fas fa-coffee', 'fas fa-cog', 'fas fa-cogs', 'fas fa-coins', 'fas fa-columns', 'fas fa-comment', 'fas fa-comment-alt', 'fas fa-comment-dollar', 'fas fa-comment-dots', 'fas fa-comment-slash', 'fas fa-comments', 'fas fa-comments-dollar', 'fas fa-compact-disc', 'fas fa-compass', 'fas fa-compress', 'fas fa-concierge-bell', 'fas fa-cookie', 'fas fa-cookie-bite', 'fas fa-copy', 'fas fa-copyright', 'fas fa-couch', 'fas fa-credit-card', 'fas fa-crop', 'fas fa-crop-alt', 'fas fa-cross', 'fas fa-crosshairs', 'fas fa-crow', 'fas fa-crown', 'fas fa-cube', 'fas fa-cubes', 'fas fa-cut', 'fas fa-database', 'fas fa-deaf', 'fas fa-desktop', 'fas fa-dharmachakra', 'fas fa-diagnoses', 'fas fa-dice', 'fas fa-dice-five', 'fas fa-dice-four', 'fas fa-dice-one', 'fas fa-dice-six', 'fas fa-dice-three', 'fas fa-dice-two', 'fas fa-digital-tachograph', 'fas fa-directions', 'fas fa-divide', 'fas fa-dizzy', 'fas fa-dna', 'fas fa-dollar-sign', 'fas fa-dolly', 'fas fa-dolly-flatbed', 'fas fa-donate', 'fas fa-door-closed', 'fas fa-door-open', 'fas fa-dot-circle', 'fas fa-dove', 'fas fa-download', 'fas fa-drafting-compass', 'fas fa-draw-polygon', 'fas fa-drum', 'fas fa-drum-steelpan', 'fas fa-dumbbell', 'fas fa-edit', 'fas fa-eject', 'fas fa-ellipsis-h', 'fas fa-ellipsis-v', 'fas fa-envelope', 'fas fa-envelope-open', 'fas fa-envelope-open-text', 'fas fa-envelope-square', 'fas fa-equals', 'fas fa-eraser', 'fas fa-euro-sign', 'fas fa-exchange-alt', 'fas fa-exclamation', 'fas fa-exclamation-circle', 'fas fa-exclamation-triangle', 'fas fa-expand', 'fas fa-expand-arrows-alt', 'fas fa-external-link-alt', 'fas fa-external-link-square-alt', 'fas fa-eye', 'fas fa-eye-dropper', 'fas fa-eye-slash', 'fas fa-fast-backward', 'fas fa-fast-forward', 'fas fa-fax', 'fas fa-feather', 'fas fa-feather-alt', 'fas fa-female', 'fas fa-fighter-jet', 'fas fa-file', 'fas fa-file-alt', 'fas fa-file-archive', 'fas fa-file-audio', 'fas fa-file-code', 'fas fa-file-contract', 'fas fa-file-download', 'fas fa-file-excel', 'fas fa-file-export', 'fas fa-file-image', 'fas fa-file-import', 'fas fa-file-invoice', 'fas fa-file-invoice-dollar', 'fas fa-file-medical', 'fas fa-file-medical-alt', 'fas fa-file-pdf', 'fas fa-file-powerpoint', 'fas fa-file-prescription', 'fas fa-file-signature', 'fas fa-file-upload', 'fas fa-file-video', 'fas fa-file-word', 'fas fa-fill', 'fas fa-fill-drip', 'fas fa-film', 'fas fa-filter', 'fas fa-fingerprint', 'fas fa-fire', 'fas fa-fire-extinguisher', 'fas fa-first-aid', 'fas fa-fish', 'fas fa-flag', 'fas fa-flag-checkered', 'fas fa-flask', 'fas fa-flushed', 'fas fa-folder', 'fas fa-folder-minus', 'fas fa-folder-open', 'fas fa-folder-plus', 'fas fa-font', 'fas fa-font-awesome-logo-full', 'fas fa-football-ball', 'fas fa-forward', 'fas fa-frog', 'fas fa-frown', 'fas fa-frown-open', 'fas fa-funnel-dollar', 'fas fa-futbol', 'fas fa-gamepad', 'fas fa-gas-pump', 'fas fa-gavel', 'fas fa-gem', 'fas fa-genderless', 'fas fa-gift', 'fas fa-glass-martini', 'fas fa-glass-martini-alt', 'fas fa-glasses', 'fas fa-globe', 'fas fa-globe-africa', 'fas fa-globe-americas', 'fas fa-globe-asia', 'fas fa-golf-ball', 'fas fa-gopuram', 'fas fa-graduation-cap', 'fas fa-greater-than', 'fas fa-greater-than-equal', 'fas fa-grimace', 'fas fa-grin', 'fas fa-grin-alt', 'fas fa-grin-beam', 'fas fa-grin-beam-sweat', 'fas fa-grin-hearts', 'fas fa-grin-squint', 'fas fa-grin-squint-tears', 'fas fa-grin-stars', 'fas fa-grin-tears', 'fas fa-grin-tongue', 'fas fa-grin-tongue-squint', 'fas fa-grin-tongue-wink', 'fas fa-grin-wink', 'fas fa-grip-horizontal', 'fas fa-grip-vertical', 'fas fa-h-square', 'fas fa-hamsa', 'fas fa-hand-holding', 'fas fa-hand-holding-heart', 'fas fa-hand-holding-usd', 'fas fa-hand-lizard', 'fas fa-hand-paper', 'fas fa-hand-peace', 'fas fa-hand-point-down', 'fas fa-hand-point-left', 'fas fa-hand-point-right', 'fas fa-hand-point-up', 'fas fa-hand-pointer', 'fas fa-hand-rock', 'fas fa-hand-scissors', 'fas fa-hand-spock', 'fas fa-hands', 'fas fa-hands-helping', 'fas fa-handshake', 'fas fa-hashtag', 'fas fa-haykal', 'fas fa-hdd', 'fas fa-heading', 'fas fa-headphones', 'fas fa-headphones-alt', 'fas fa-headset', 'fas fa-heart', 'fas fa-heartbeat', 'fas fa-helicopter', 'fas fa-highlighter', 'fas fa-history', 'fas fa-hockey-puck', 'fas fa-home', 'fas fa-hospital', 'fas fa-hospital-alt', 'fas fa-hospital-symbol', 'fas fa-hot-tub', 'fas fa-hotel', 'fas fa-hourglass', 'fas fa-hourglass-end', 'fas fa-hourglass-half', 'fas fa-hourglass-start', 'fas fa-i-cursor', 'fas fa-id-badge', 'fas fa-id-card', 'fas fa-id-card-alt', 'fas fa-image', 'fas fa-images', 'fas fa-inbox', 'fas fa-indent', 'fas fa-industry', 'fas fa-infinity', 'fas fa-info', 'fas fa-info-circle', 'fas fa-italic', 'fas fa-jedi', 'fas fa-joint', 'fas fa-journal-whills', 'fas fa-kaaba', 'fas fa-key', 'fas fa-keyboard', 'fas fa-khanda', 'fas fa-kiss', 'fas fa-kiss-beam', 'fas fa-kiss-wink-heart', 'fas fa-kiwi-bird', 'fas fa-landmark', 'fas fa-language', 'fas fa-laptop', 'fas fa-laptop-code', 'fas fa-laugh', 'fas fa-laugh-beam', 'fas fa-laugh-squint', 'fas fa-laugh-wink', 'fas fa-layer-group', 'fas fa-leaf', 'fas fa-lemon', 'fas fa-less-than', 'fas fa-less-than-equal', 'fas fa-level-down-alt', 'fas fa-level-up-alt', 'fas fa-life-ring', 'fas fa-lightbulb', 'fas fa-link', 'fas fa-lira-sign', 'fas fa-list', 'fas fa-list-alt', 'fas fa-list-ol', 'fas fa-list-ul', 'fas fa-location-arrow', 'fas fa-lock', 'fas fa-lock-open', 'fas fa-long-arrow-alt-down', 'fas fa-long-arrow-alt-left', 'fas fa-long-arrow-alt-right', 'fas fa-long-arrow-alt-up', 'fas fa-low-vision', 'fas fa-luggage-cart', 'fas fa-magic', 'fas fa-magnet', 'fas fa-mail-bulk', 'fas fa-male', 'fas fa-map', 'fas fa-map-marked', 'fas fa-map-marked-alt', 'fas fa-map-marker', 'fas fa-map-marker-alt', 'fas fa-map-pin', 'fas fa-map-signs', 'fas fa-marker', 'fas fa-mars', 'fas fa-mars-double', 'fas fa-mars-stroke', 'fas fa-mars-stroke-h', 'fas fa-mars-stroke-v', 'fas fa-medal', 'fas fa-medkit', 'fas fa-meh', 'fas fa-meh-blank', 'fas fa-meh-rolling-eyes', 'fas fa-memory', 'fas fa-menorah', 'fas fa-mercury', 'fas fa-microchip', 'fas fa-microphone', 'fas fa-microphone-alt', 'fas fa-microphone-alt-slash', 'fas fa-microphone-slash', 'fas fa-microscope', 'fas fa-minus', 'fas fa-minus-circle', 'fas fa-minus-square', 'fas fa-mobile', 'fas fa-mobile-alt', 'fas fa-money-bill', 'fas fa-money-bill-alt', 'fas fa-money-bill-wave', 'fas fa-money-bill-wave-alt', 'fas fa-money-check', 'fas fa-money-check-alt', 'fas fa-monument', 'fas fa-moon', 'fas fa-mortar-pestle', 'fas fa-mosque', 'fas fa-motorcycle', 'fas fa-mouse-pointer', 'fas fa-music', 'fas fa-neuter', 'fas fa-newspaper', 'fas fa-not-equal', 'fas fa-notes-medical', 'fas fa-object-group', 'fas fa-object-ungroup', 'fas fa-oil-can', 'fas fa-om', 'fas fa-outdent', 'fas fa-paint-brush', 'fas fa-paint-roller', 'fas fa-palette', 'fas fa-pallet', 'fas fa-paper-plane', 'fas fa-paperclip', 'fas fa-parachute-box', 'fas fa-paragraph', 'fas fa-parking', 'fas fa-passport', 'fas fa-pastafarianism', 'fas fa-paste', 'fas fa-pause', 'fas fa-pause-circle', 'fas fa-paw', 'fas fa-peace', 'fas fa-pen', 'fas fa-pen-alt', 'fas fa-pen-fancy', 'fas fa-pen-nib', 'fas fa-pen-square', 'fas fa-pencil-alt', 'fas fa-pencil-ruler', 'fas fa-people-carry', 'fas fa-percent', 'fas fa-percentage', 'fas fa-phone', 'fas fa-phone-slash', 'fas fa-phone-square', 'fas fa-phone-volume', 'fas fa-piggy-bank', 'fas fa-pills', 'fas fa-place-of-worship', 'fas fa-plane', 'fas fa-plane-arrival', 'fas fa-plane-departure', 'fas fa-play', 'fas fa-play-circle', 'fas fa-plug', 'fas fa-plus', 'fas fa-plus-circle', 'fas fa-plus-square', 'fas fa-podcast', 'fas fa-poll', 'fas fa-poll-h', 'fas fa-poo', 'fas fa-poop', 'fas fa-portrait', 'fas fa-pound-sign', 'fas fa-power-off', 'fas fa-pray', 'fas fa-praying-hands', 'fas fa-prescription', 'fas fa-prescription-bottle', 'fas fa-prescription-bottle-alt', 'fas fa-print', 'fas fa-procedures', 'fas fa-project-diagram', 'fas fa-puzzle-piece', 'fas fa-qrcode', 'fas fa-question', 'fas fa-question-circle', 'fas fa-quidditch', 'fas fa-quote-left', 'fas fa-quote-right', 'fas fa-quran', 'fas fa-random', 'fas fa-receipt', 'fas fa-recycle', 'fas fa-redo', 'fas fa-redo-alt', 'fas fa-registered', 'fas fa-reply', 'fas fa-reply-all', 'fas fa-retweet', 'fas fa-ribbon', 'fas fa-road', 'fas fa-robot', 'fas fa-rocket', 'fas fa-route', 'fas fa-rss', 'fas fa-rss-square', 'fas fa-ruble-sign', 'fas fa-ruler', 'fas fa-ruler-combined', 'fas fa-ruler-horizontal', 'fas fa-ruler-vertical', 'fas fa-rupee-sign', 'fas fa-sad-cry', 'fas fa-sad-tear', 'fas fa-save', 'fas fa-school', 'fas fa-screwdriver', 'fas fa-search', 'fas fa-search-dollar', 'fas fa-search-location', 'fas fa-search-minus', 'fas fa-search-plus', 'fas fa-seedling', 'fas fa-server', 'fas fa-shapes', 'fas fa-share', 'fas fa-share-alt', 'fas fa-share-alt-square', 'fas fa-share-square', 'fas fa-shekel-sign', 'fas fa-shield-alt', 'fas fa-ship', 'fas fa-shipping-fast', 'fas fa-shoe-prints', 'fas fa-shopping-bag', 'fas fa-shopping-basket', 'fas fa-shopping-cart', 'fas fa-shower', 'fas fa-shuttle-van', 'fas fa-sign', 'fas fa-sign-in-alt', 'fas fa-sign-language', 'fas fa-sign-out-alt', 'fas fa-signal', 'fas fa-signature', 'fas fa-sitemap', 'fas fa-skull', 'fas fa-sliders-h', 'fas fa-smile', 'fas fa-smile-beam', 'fas fa-smile-wink', 'fas fa-smoking', 'fas fa-smoking-ban', 'fas fa-snowflake', 'fas fa-socks', 'fas fa-solar-panel', 'fas fa-sort', 'fas fa-sort-alpha-down', 'fas fa-sort-alpha-up', 'fas fa-sort-amount-down', 'fas fa-sort-amount-up', 'fas fa-sort-down', 'fas fa-sort-numeric-down', 'fas fa-sort-numeric-up', 'fas fa-sort-up', 'fas fa-spa', 'fas fa-space-shuttle', 'fas fa-spinner', 'fas fa-splotch', 'fas fa-spray-can', 'fas fa-square', 'fas fa-square-full', 'fas fa-square-root-alt', 'fas fa-stamp', 'fas fa-star', 'fas fa-star-and-crescent', 'fas fa-star-half', 'fas fa-star-half-alt', 'fas fa-star-of-david', 'fas fa-star-of-life', 'fas fa-step-backward', 'fas fa-step-forward', 'fas fa-stethoscope', 'fas fa-sticky-note', 'fas fa-stop', 'fas fa-stop-circle', 'fas fa-stopwatch', 'fas fa-store', 'fas fa-store-alt', 'fas fa-stream', 'fas fa-street-view', 'fas fa-strikethrough', 'fas fa-stroopwafel', 'fas fa-subscript', 'fas fa-subway', 'fas fa-suitcase', 'fas fa-suitcase-rolling', 'fas fa-sun', 'fas fa-superscript', 'fas fa-surprise', 'fas fa-swatchbook', 'fas fa-swimmer', 'fas fa-swimming-pool', 'fas fa-synagogue', 'fas fa-sync', 'fas fa-sync-alt', 'fas fa-syringe', 'fas fa-table', 'fas fa-table-tennis', 'fas fa-tablet', 'fas fa-tablet-alt', 'fas fa-tablets', 'fas fa-tachometer-alt', 'fas fa-tag', 'fas fa-tags', 'fas fa-tape', 'fas fa-tasks', 'fas fa-taxi', 'fas fa-teeth', 'fas fa-teeth-open', 'fas fa-terminal', 'fas fa-text-height', 'fas fa-text-width', 'fas fa-th', 'fas fa-th-large', 'fas fa-th-list', 'fas fa-theater-masks', 'fas fa-thermometer', 'fas fa-thermometer-empty', 'fas fa-thermometer-full', 'fas fa-thermometer-half', 'fas fa-thermometer-quarter', 'fas fa-thermometer-three-quarters', 'fas fa-thumbs-down', 'fas fa-thumbs-up', 'fas fa-thumbtack', 'fas fa-ticket-alt', 'fas fa-times', 'fas fa-times-circle', 'fas fa-tint', 'fas fa-tint-slash', 'fas fa-tired', 'fas fa-toggle-off', 'fas fa-toggle-on', 'fas fa-toolbox', 'fas fa-tooth', 'fas fa-torah', 'fas fa-torii-gate', 'fas fa-trademark', 'fas fa-traffic-light', 'fas fa-train', 'fas fa-transgender', 'fas fa-transgender-alt', 'fas fa-trash', 'fas fa-trash-alt', 'fas fa-tree', 'fas fa-trophy', 'fas fa-truck', 'fas fa-truck-loading', 'fas fa-truck-monster', 'fas fa-truck-moving', 'fas fa-truck-pickup', 'fas fa-tshirt', 'fas fa-tty', 'fas fa-tv', 'fas fa-umbrella', 'fas fa-umbrella-beach', 'fas fa-underline', 'fas fa-undo', 'fas fa-undo-alt', 'fas fa-universal-access', 'fas fa-university', 'fas fa-unlink', 'fas fa-unlock', 'fas fa-unlock-alt', 'fas fa-upload', 'fas fa-user', 'fas fa-user-alt', 'fas fa-user-alt-slash', 'fas fa-user-astronaut', 'fas fa-user-check', 'fas fa-user-circle', 'fas fa-user-clock', 'fas fa-user-cog', 'fas fa-user-edit', 'fas fa-user-friends', 'fas fa-user-graduate', 'fas fa-user-lock', 'fas fa-user-md', 'fas fa-user-minus', 'fas fa-user-ninja', 'fas fa-user-plus', 'fas fa-user-secret', 'fas fa-user-shield', 'fas fa-user-slash', 'fas fa-user-tag', 'fas fa-user-tie', 'fas fa-user-times', 'fas fa-users', 'fas fa-users-cog', 'fas fa-utensil-spoon', 'fas fa-utensils', 'fas fa-vector-square', 'fas fa-venus', 'fas fa-venus-double', 'fas fa-venus-mars', 'fas fa-vial', 'fas fa-vials', 'fas fa-video', 'fas fa-video-slash', 'fas fa-vihara', 'fas fa-volleyball-ball', 'fas fa-volume-down', 'fas fa-volume-off', 'fas fa-volume-up', 'fas fa-walking', 'fas fa-wallet', 'fas fa-warehouse', 'fas fa-weight', 'fas fa-weight-hanging', 'fas fa-wheelchair', 'fas fa-wifi', 'fas fa-window-close', 'fas fa-window-maximize', 'fas fa-window-minimize', 'fas fa-window-restore', 'fas fa-wine-glass', 'fas fa-wine-glass-alt', 'fas fa-won-sign', 'fas fa-wrench', 'fas fa-x-ray', 'fas fa-yen-sign', 'fas fa-yin-yang', 'far fa-address-book', 'far fa-address-card', 'far fa-angry', 'far fa-arrow-alt-circle-down', 'far fa-arrow-alt-circle-left', 'far fa-arrow-alt-circle-right', 'far fa-arrow-alt-circle-up', 'far fa-bell', 'far fa-bell-slash', 'far fa-bookmark', 'far fa-building', 'far fa-calendar', 'far fa-calendar-alt', 'far fa-calendar-check', 'far fa-calendar-minus', 'far fa-calendar-plus', 'far fa-calendar-times', 'far fa-caret-square-down', 'far fa-caret-square-left', 'far fa-caret-square-right', 'far fa-caret-square-up', 'far fa-chart-bar', 'far fa-check-circle', 'far fa-check-square', 'far fa-circle', 'far fa-clipboard', 'far fa-clock', 'far fa-clone', 'far fa-closed-captioning', 'far fa-comment', 'far fa-comment-alt', 'far fa-comment-dots', 'far fa-comments', 'far fa-compass', 'far fa-copy', 'far fa-copyright', 'far fa-credit-card', 'far fa-dizzy', 'far fa-dot-circle', 'far fa-edit', 'far fa-envelope', 'far fa-envelope-open', 'far fa-eye', 'far fa-eye-slash', 'far fa-file', 'far fa-file-alt', 'far fa-file-archive', 'far fa-file-audio', 'far fa-file-code', 'far fa-file-excel', 'far fa-file-image', 'far fa-file-pdf', 'far fa-file-powerpoint', 'far fa-file-video', 'far fa-file-word', 'far fa-flag', 'far fa-flushed', 'far fa-folder', 'far fa-folder-open', 'far fa-font-awesome-logo-full', 'far fa-frown', 'far fa-frown-open', 'far fa-futbol', 'far fa-gem', 'far fa-grimace', 'far fa-grin', 'far fa-grin-alt', 'far fa-grin-beam', 'far fa-grin-beam-sweat', 'far fa-grin-hearts', 'far fa-grin-squint', 'far fa-grin-squint-tears', 'far fa-grin-stars', 'far fa-grin-tears', 'far fa-grin-tongue', 'far fa-grin-tongue-squint', 'far fa-grin-tongue-wink', 'far fa-grin-wink', 'far fa-hand-lizard', 'far fa-hand-paper', 'far fa-hand-peace', 'far fa-hand-point-down', 'far fa-hand-point-left', 'far fa-hand-point-right', 'far fa-hand-point-up', 'far fa-hand-pointer', 'far fa-hand-rock', 'far fa-hand-scissors', 'far fa-hand-spock', 'far fa-handshake', 'far fa-hdd', 'far fa-heart', 'far fa-hospital', 'far fa-hourglass', 'far fa-id-badge', 'far fa-id-card', 'far fa-image', 'far fa-images', 'far fa-keyboard', 'far fa-kiss', 'far fa-kiss-beam', 'far fa-kiss-wink-heart', 'far fa-laugh', 'far fa-laugh-beam', 'far fa-laugh-squint', 'far fa-laugh-wink', 'far fa-lemon', 'far fa-life-ring', 'far fa-lightbulb', 'far fa-list-alt', 'far fa-map', 'far fa-meh', 'far fa-meh-blank', 'far fa-meh-rolling-eyes', 'far fa-minus-square', 'far fa-money-bill-alt', 'far fa-moon', 'far fa-newspaper', 'far fa-object-group', 'far fa-object-ungroup', 'far fa-paper-plane', 'far fa-pause-circle', 'far fa-play-circle', 'far fa-plus-square', 'far fa-question-circle', 'far fa-registered', 'far fa-sad-cry', 'far fa-sad-tear', 'far fa-save', 'far fa-share-square', 'far fa-smile', 'far fa-smile-beam', 'far fa-smile-wink', 'far fa-snowflake', 'far fa-square', 'far fa-star', 'far fa-star-half', 'far fa-sticky-note', 'far fa-stop-circle', 'far fa-sun', 'far fa-surprise', 'far fa-thumbs-down', 'far fa-thumbs-up', 'far fa-times-circle', 'far fa-tired', 'far fa-trash-alt', 'far fa-user', 'far fa-user-circle', 'far fa-window-close', 'far fa-window-maximize', 'far fa-window-minimize', 'far fa-window-restore' );

	$pix_icons_class_html = '';

	foreach ( $pix_icons as $icon ) {
		$pix_icons_class_html 	.= '<i class=" '. esc_attr( $icon ) .'"></i> ';
	}
	
    echo json_encode( $pix_icons_class_html );
	
	die();
}
add_action('wp_ajax_configurator_load_icon_fonts', 'configurator_load_icon_fonts');

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Events
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function configurator_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.

	$prefix = configurator_get_prefix();
	$id = get_the_id();

	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	
	if( is_home() || is_singular( 'post' ) || configurator_is_shop() || configurator_is_product_category() || is_archive() || is_search() ) {

        //Sidebar position
        $sidebar_position = get_theme_mod( $prefix.'layout', 'right-sidebar' );
	}
	else if( is_page() ) {
		//Sidebar position
        $sidebar_position = configurator_get_meta_value( $id, '_amz_layout', 'default' ); // id, meta_key, meta_default
	}
	else{
		$sidebar_position = '';
	}

    if( $sidebar_position == 'left-sidebar' ) {
	        $classes[] = 'sidebar-left';
    }
    elseif( $sidebar_position == 'right-sidebar' ) {
	        $classes[] = 'sidebar-right';
    }

	$mobile_responsive = get_theme_mod( 'responsive', 'yes' );
	if( 'no' === $mobile_responsive ){
		$classes[] = 'pix-no-responsive';
	}

	${$prefix.'header_layout'} = configurator_get_meta_value( $id, '_amz_header_layout', 'default', 'header_layout', 'header-1' );

	$form_style = get_theme_mod( 'form_style', 'square' );
	$classes[] = 'form-'.$form_style;


	${$prefix.'boxed_content'} = configurator_get_meta_value( $id, '_amz_boxed_content', 'default', 'boxed_content', 'wide' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

	// If content Boxed enabled in themeoption insert this div
	if ( ${$prefix.'boxed_content'} === 'frame' ) {
		$classes[] = ' configurator-frame';
	}elseif ( ${$prefix.'boxed_content'} === 'boxed' ) {
		$classes[] = 'configurator-boxed';
	}else {
		$classes[] = 'configurator-wide';
	}

	${$prefix.'transparent_header'} = configurator_get_meta_value( $id, '_amz_transparent_header', 'default', 'transparent_header', 'hide' );
	if( 'show' === ${$prefix.'transparent_header'} ) {
		$classes[] = 'configurator-trans-header-enabled';
	}

	${$prefix.'mobile_menu_align'} = get_theme_mod( 'mobile_menu_align', 'left' );

	if( ${$prefix.'mobile_menu_align'} == 'right' ){
		$classes[] = 'right-mobile-menu';
	}

	${$prefix.'header_width'} = configurator_get_meta_value( $id, '_amz_header_width', 'default', 'header_width', 'wide' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

	/* Header Container Width */
	if( ${$prefix.'header_width'} === 'wide' ){
		$classes[] = 'full-header';
	}

	if( is_singular( 'product' ) ){
		$config_id = get_post_meta( get_the_id(), '_configurator_post_id', true );
		if( $config_id ) {
			$classes[] = 'single-configurator-enabled';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'configurator_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function configurator_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'configurator' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'configurator_wp_title', 10, 2 );
endif;





/* Duplicate posts option */
if( !function_exists( 'amz_duplicate_post_link' ) ) {
	
	function amz_duplicate_post_link( $actions, $post ) {

		if ( ( $post->post_type == 'pix_portfolio' ) && current_user_can('edit_posts') ) {
			$actions['duplicate'] = '<a href="admin.php?action=amz_duplicate_post_as_draft&amp;post=' . $post->ID . '">' . esc_html__( 'Duplicate', 'configurator' ) .'</a>';
		}
		return $actions;

	}

}

add_filter( 'page_row_actions', 'amz_duplicate_post_link', 10, 2 );

/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
function amz_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'amz_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}
 
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );
 
	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;
 
	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {
 
		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
 
		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
 
		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
 
		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		} 
 
		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'edit.php?post_type=pix_portfolio' ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_amz_duplicate_post_as_draft', 'amz_duplicate_post_as_draft' );
