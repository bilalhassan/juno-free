jQuery(function($) {

    /**
     * SlickNav Mobile Menu
     */
    $( function() { 
        
        $( '#primary-menu' ).slicknav({
            prependTo:'nav.main-nav > div',
            duration: 500,
            openedSymbol: "&#45;",	
            closedSymbol: "&#43;"
            
        }); 
       
    } );
    
    // Custom Slicknav Toggle
    var slicknav_open = false;
    $( "#slicknav-menu-toggle" ).click( function() {
        
        if ( slicknav_open ) {
            
            $("div.slicknav_menu").stop().animate({
                borderColor: "#fff"
            }, 500 );
            $('#primary-menu').slicknav( 'toggle' );
            slicknav_open = false;
            
        } else {
            
            $("div.slicknav_menu").stop().animate({
                borderColor: "#cacaca"
            }, 1000 );
            $('#primary-menu').slicknav( 'toggle' );
            slicknav_open = true;
            
        }
        
    });
    
    /*
     * Initialize the homepage slider module (only if the element exists on the page)
     */
    if ( $( "#camera_slider" ).length ) {
    
        $( "#camera_slider" ).camera({ 
            height: '500px',
            hover: true,
            transPeriod: 2000,
            fx: 'simpleFade',
            pagination: false,
            playPause: false,
            loaderOpacity: 0
        });
        
    }
    
    /*
     * Handle Blog Roll Masonry
     */
    function doMasonry() {
         
        var $grid = $( "#masonry-blog-wrapper" ).imagesLoaded(function () {
            $grid.masonry({
                itemSelector: '.blog-roll-item',
                columnWidth: '.grid-sizer',
                percentPosition: true,
                gutter: '.gutter-sizer',
                transitionDuration: '.75s'
            });
        });
        
        if ( $( window ).width() >= 992 ) {  
            
            $('.juno-blog-content .gutter-sizer').css('width', '2%');
            $('.juno-blog-content .grid-sizer').css('width', '32%');
            $('.juno-blog-content .blog-roll-item').css('width', '32%');
            
        } else if ( $( window ).width() < 992 && $( window ).width() >= 768 ) {
            
            $('.juno-blog-content .gutter-sizer').css('width', '2%');
            $('.juno-blog-content .grid-sizer').css('width', '48%');
            $('.juno-blog-content .blog-roll-item').css('width', '48%');
            
        } else {
            
            $('.juno-blog-content .gutter-sizer').css('width', '0%');
            $('.juno-blog-content .grid-sizer').css('width', '100%');
            $('.juno-blog-content .blog-roll-item').css('width', '100%');
            
        }
         
    }
    
    /**
     * Call Masonry on window resize and load
     */
    $( window ).resize( function() {
        doMasonry();
    });
    doMasonry();
 
    /**
     * 
     */
    $( '.blog-roll-item article').mouseenter( function() {
        
        $( this ).find( '.inner .image-corner' ).stop().animate({
            height: "75px"
        }, 200 );
        
        $( this ).find( '.inner .icon' ).stop().animate({
            fontSize: "20px",
            opacity: "1" 
        }, 400 );
        
    }).mouseleave( function() {
        
        $( this ).find( '.inner .icon' ).stop().animate({
            fontSize: "0px",
            opacity: "0"
        }, 200 );
        
        $( this ).find( '.inner .image-corner' ).stop().animate({
            height: "0px"
        }, 400 );
        
    });
    
    
    /**
     * Contact Form
     */
    $('#juno-contact-form').submit( function (e) {
       
        e.preventDefault();
        
        $('.mail-sent,.mail-not-sent').hide();
       
        var form = $(this);
        var name = $('.name', form ).val();
        var email = $('.email', form ).val();
        var message = $('textarea.message', form ).val();
        var url = form.attr('action');
        
        if( name.length < 2 ) {
            alert( 'Please enter a name' );
            return false;
        }
        
        if( message.length < 2 ) {
            alert( 'Please enter a message' );
            return false;
        }
        
        if( ! junoValidateEmail( email ) ) {
            alert( 'Please enter a valid email address' );
            return false;
        }
        
        var data = {
            
            action : 'juno_send_message',
            name : name,
            email : email,
            message : message
            
        }
        
        $.post( url, data, function ( response ) {
           console.log( response );
            if( response == 1 ) {
                $('.mail-sent').fadeIn(350);
                form[0].reset();
                
            }else{
                $('.mail-not-sent').fadeIn(350);
            }
            
        });
        
        
    });
    
    function junoValidateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    
});