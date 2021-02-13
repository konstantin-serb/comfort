// Окно поиск

$('#search-btn, #head-mr-search').click(function(){
    $('#search').css('display','block');	
    $('#modal-bcg').css('transform','scaleY(1)');
});

$('#search-submit').click(function(){
    $('#search').css('display','none');	
    $('#modal-bcg').css('transform','scaleY(0)');  
});

// Окно каталог

$('#catalog-button').click(function(){
	$('#catalog').css('display','block');
    $('#modal-bcg').css('transform','scaleY(1)');
});

$('#catalog-close').click(function(){
	$('#catalog').css('display','none');
    $('#modal-bcg').css('transform','scaleY(0)');
});

// Окно каталог среднее 

$('#catalog-button-mr').click(function(){
    $('#catalog-mr').css('transform','scaleY(1)');
});

$('#catalog-close-mr').click(function(){
    $('#catalog-mr').css('transform','scaleY(0)');
});

$('#burger-menu-catalog').click(function(){
    $('#catalog-mr').css('transform','scaleY(1)');
});

// Бургер меню

$('#head-mr-burger').click(function(){
    $('#burger-menu').css('transform','scaleY(1)');
});

$('#burger-close').click(function(){
    $('#burger-menu').css('transform','scaleY(0)');
});

// Бургер меню малое 

$('#head-ms-burger').click(function(){
    $('#burger-menu').css('transform','scaleY(1)');
});

$('#burger-close').click(function(){
    $('#burger-menu').css('transform','scaleY(0)');
});

// Страница результат поиска 

$('#sort-list').click(function(){
    $('#search-result-block').css('flex-direction','column');
    $('#search-result-block .search-result-item').css('width','100%').css('flex-direction','row').css('flex-wrap','nowrap');
    $('#search-result-block img').css('margin','10px');
});

$('#sort-table').click(function(){
    $('#search-result-block').css('flex-direction','row');
    $('#search-result-block .search-result-item').css('width','23%').css('flex-direction','column').css('flex-wrap','wrap');
    $('#search-result-block img').css('margin','auto');
});

$(window).resize(function(){
    if ($(window).width() < 481){
        $('#search-result-block .search-result-item').css('width','100%').css('flex-direction','column').css('flex-wrap','wrap');        
    };
    if ($(window).width() < 769){
        $('#search-result-block .search-result-item').css('width','48%').css('flex-direction','column').css('flex-wrap','wrap');        
    };
    if ($(window).width() > 768){
        $('#search-result-block .search-result-item').css('width','23%').css('flex-direction','column').css('flex-wrap','wrap');        
    };
  });

$(window).resize(function(){
    if ($(window).width() > 768){
    	$('#sort-table').click(function(){
            $('#search-result-block').css('flex-direction','row');
            $('#search-result-block .search-result-item').css('width','23%').css('flex-direction','column').css('flex-wrap','wrap');
            $('#search-result-block img').css('margin','auto');
        });
    };
  });

$(window).resize(function(){
    if ($(window).width() < 769){
    	$('#sort-table').click(function(){
            $('#search-result-block').css('flex-direction','row');
            $('#search-result-block .search-result-item').css('width','48%').css('flex-direction','column').css('flex-wrap','wrap');
            $('#search-result-block img').css('margin','auto');
        });
    };
});

$(function() {
  var owl = $("#owl-carousel");
  owl.owlCarousel({
      loop:true,
      margin:20,
      nav:false,
      dots:true,
      dotsData:false,
      items:1,
      smartSpeed:1000,      
      responsiveClass:true,
      animateOut: 'fadeOut',
    });
});

$(function() {
  var owl2 = $("#owl-carousel2");
  owl2.owlCarousel({
      loop:true,
      margin:20,
      nav:false,
      dots:false,
      dotsData:false,
      items:1,
      smartSpeed:1000,      
      responsiveClass:true,
    });
});

$('#catalog-cart-slider-nav-left').click(function(){
    $("#owl-carousel2").trigger('prev.owl.carousel');
  });
$('#catalog-cart-slider-nav-right').click(function(){
    $("#owl-carousel2").trigger('next.owl.carousel');
  });

// Страница catalog 

$('#catalog-btn-1').click(function(){
    $('#catalog-btn-1').toggleClass( 'page-catalog-blue' );
    $( "#catalog-list-1" ).slideToggle( "fast" );
});

$('#catalog-btn-2').click(function(){
    $('#catalog-btn-2').toggleClass( 'page-catalog-blue' );
    $( "#catalog-list-2" ).slideToggle( "fast" );
});

$('#catalog-btn-3').click(function(){
    $('#catalog-btn-3').toggleClass( 'page-catalog-blue' );
    $( "#catalog-list-3" ).slideToggle( "fast" );
});

$('#catalog-btn-4').click(function(){
    $('#catalog-btn-4').toggleClass( 'page-catalog-blue' );
    $( "#catalog-list-4" ).slideToggle( "fast" );
});

$('#catalog-btn-5').click(function(){
    $('#catalog-btn-5').toggleClass( 'page-catalog-blue' );
    $( "#catalog-list-5" ).slideToggle( "fast" );
});

$('#catalog-btn-6').click(function(){
    $('#catalog-btn-6').toggleClass( 'page-catalog-blue' );
    $( "#catalog-list-6" ).slideToggle( "fast" );
});

$('#catalog-btn-7').click(function(){
    $('#catalog-btn-7').toggleClass( 'page-catalog-blue' );
    $( "#catalog-list-7" ).slideToggle( "fast" );
});

$('#catalog-btn-8').click(function(){
    $('#catalog-btn-8').toggleClass( 'page-catalog-blue' );
    $( "#catalog-list-8" ).slideToggle( "fast" );
});

$(window).resize(function(){
    if ($(window).width() < 481){
        $('#page-catalog-cont-block .page-catalog-cont-item').css('width','100%').css('flex-direction','column').css('flex-wrap','wrap');        
    };
    if ($(window).width() < 769){
        $('#page-catalog-cont-block .page-catalog-cont-item').css('width','48%').css('flex-direction','column').css('flex-wrap','wrap');        
    };
    if ($(window).width() > 768){
        $('#page-catalog-cont-block .page-catalog-cont-item').css('width','30%').css('flex-direction','column').css('flex-wrap','wrap');        
    };
  });

$('#page-catalog-sort-list').click(function(){
    $('#page-catalog-cont-block').css('flex-direction','column');
    $('#page-catalog-cont-block .page-catalog-cont-item').css('width','100%').css('flex-direction','row').css('flex-wrap','nowrap');
    $('#page-catalog-cont-block img').css('margin','10px').css('width','40%');
});

$('#page-catalog-sort-table').click(function(){
    $('#page-catalog-cont-block').css('flex-direction','row');
    $('#page-catalog-cont-block .page-catalog-cont-item').css('width','30%').css('flex-direction','column').css('flex-wrap','wrap');
    $('#page-catalog-cont-block img').css('margin','auto').css('width','100%');
});

$(window).resize(function(){
    if ($(window).width() > 768){
      $('#page-catalog-sort-table').click(function(){
            $('#page-catalog-cont-block').css('flex-direction','row');
            $('#page-catalog-cont-block .page-catalog-cont-item').css('width','30%').css('flex-direction','column').css('flex-wrap','wrap');
            $('#page-catalog-cont-block img').css('margin','auto');
        });
    };
  });

$(window).resize(function(){
    if ($(window).width() < 769){
      $('#page-catalog-sort-table').click(function(){
            $('#page-catalog-cont-block').css('flex-direction','row');
            $('#page-catalog-cont-block .page-catalog-cont-item').css('width','48%').css('flex-direction','column').css('flex-wrap','wrap');
            $('#page-catalog-cont-block img').css('margin','auto');
        });
    };
});

// Страница catalog-cart


$('#catalog-cart-img-small-1').click(function(){
    $('#catalog-cart-img-big').attr( 'src', 'images/img4.svg' );
    $('#catalog-cart-item-h2').html('Нагрівальний кабель DEVIflex');
    $('#catalog-cart-item-h3').html('3525 ₴');
    $('#catalog-cart-item-p1').html('Модель: DEVIflex');
});

$('#catalog-cart-img-small-2').click(function(){
    $('#catalog-cart-img-big').attr( 'src', 'images/img5.svg' );
    $('#catalog-cart-item-h2').html('Тонкий нагрівальний кабель CTAV-18 260W 14м');
    $('#catalog-cart-item-h3').html('4326 ₴');
    $('#catalog-cart-item-p1').html('Модель: CTAV-18');
});

$('#catalog-cart-img-small-3').click(function(){
    $('#catalog-cart-img-big').attr( 'src', 'images/result-img.svg' );
    $('#catalog-cart-item-h2').html('Нагрівальний кабель CTAСV-30 195W 7м');
    $('#catalog-cart-item-h3').html('2193 ₴');
    $('#catalog-cart-item-p1').html('Модель: CTACV-30');
});

$('#catalog-cart-info-buttons-1').click(function(){
    $('#catalog-cart-info-buttons-1').removeClass('catalog-cart-info-buttons-off').addClass('catalog-cart-info-buttons-on');
    $('#catalog-cart-info-buttons-2').removeClass('catalog-cart-info-buttons-on').addClass('catalog-cart-info-buttons-off');
    $('#catalog-cart-info-text-1').html("Двожильний нагрівальний кабель CTACV-30 потужністю 30 Вт/м застосовується для обігріву елементів покрівлі, жолобів, водостоків, водоприймальних воронок для забезпечення стоку талої води в зимовий період, а також для захисту від намерзання снігу та льоду на вуличних майданчиках (балконах, терасах, сходах, тротуарних доріжках, пандусах, під'їздних шляхах, мостах та ін.).");
    $('#catalog-cart-info-text-2').html("Нагрівальний кабель CTACV-30 має подвійну посилену ізоляцію (клас М2), екранований алюмінієвою фольгою та лудженою міддю (з функцією пам'яті), з фторполімерною ізоляцією провідників і зовнішньою поліпропіленовою оболонкою. Зовнішня ізоляція стійка до ультрафіолетового випромінювання.")
});

$('#catalog-cart-info-buttons-2').click(function(){
    $('#catalog-cart-info-buttons-2').removeClass('catalog-cart-info-buttons-off').addClass('catalog-cart-info-buttons-on');
    $('#catalog-cart-info-buttons-1').removeClass('catalog-cart-info-buttons-on').addClass('catalog-cart-info-buttons-off');    
    $('#catalog-cart-info-text-2').html("Двожильний нагрівальний кабель CTACV-30 потужністю 30 Вт/м застосовується для обігріву елементів покрівлі, жолобів, водостоків, водоприймальних воронок для забезпечення стоку талої води в зимовий період, а також для захисту від намерзання снігу та льоду на вуличних майданчиках (балконах, терасах, сходах, тротуарних доріжках, пандусах, під'їздних шляхах, мостах та ін.).");
    $('#catalog-cart-info-text-1').html("Нагрівальний кабель CTACV-30 має подвійну посилену ізоляцію (клас М2), екранований алюмінієвою фольгою та лудженою міддю (з функцією пам'яті), з фторполімерною ізоляцією провідників і зовнішньою поліпропіленовою оболонкою. Зовнішня ізоляція стійка до ультрафіолетового випромінювання.")
});

// Окно catalog-cart-slider 

$('#catalog-cart-img-big').click(function(){
    $('#catalog-cart-slider').css('display','block');  
    $('#modal-bcg').css('transform','scaleY(1)');
});

$('#catalog-cart-slider-close').click(function(){
    $('#catalog-cart-slider').css('display','none'); 
    $('#modal-bcg').css('transform','scaleY(0)');  
});










