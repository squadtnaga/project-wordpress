/*
Copyright (c) 2017 
------------------------------------------------------------------
[Master Javascript]

Project:	Wedding Photographer Responsive Template

-------------------------------------------------------------------*/
(function($) {
    "use strict";
    var landingpage = {
        initialised: false,
        version: 1.0,
        mobile: false,
        init: function() {

            if (!this.initialised) {
                this.initialised = true;
            } else {
                return;
            }

            /*-------------- Wedding Photographer Functions Calling ---------------------------------------------------
            ------------------------------------------------------------------------------------------------*/
            this.Slider();
            this.Menu_bar();
            this.SubmitForms();
            this.Map();
            this.responsive_menu();
			/*this.Date();*/



        },

        /*-------------- Wedding Photographer Functions definition ---------------------------------------------------
        ---------------------------------------------------------------------------------------------------*/

        //banner slider
        Slider: function() {
            if ($(".ed_slider").length) {
                $(".ed_slider").each(function(index) {
                    var id = $(this).attr("id");
                    var responsive_items = $(this).attr("data_responsive_item");
                    var data_slides_margin = $(this).attr("data_slides_margin");
                    var tmp = responsive_items.split(",");
                    var no_of_item = 4;
                    var auto_slide_time = 5000;
                    var show_bullet = true;
                    var loop = true;
                    var autoplay = true;
                    var data_auto_slide_time = $(this).attr("data_auto_slide_time");
                    var data_number_of_item = $(this).attr("data_number_of_item");
                    var data_show_bullets = $(this).attr("data_show_bullets");
                    var data_loop = $(this).attr("data_loop");
                    var data_autoplay = $(this).attr("data_autoplay");
                    if (data_autoplay !== undefined) {
                        if (data_autoplay === "no") {
                            autoplay = false;
                        }
                    }
                    if (data_loop !== undefined) {
                        if (data_loop === "no") {
                            loop = false;
                        }
                    }
                    if (data_show_bullets !== undefined) {
                        if (data_show_bullets === "no") {
                            show_bullet = false;
                        }
                    }
                    if (data_number_of_item !== undefined) {
                        no_of_item = data_number_of_item;
                    }
                    if (data_auto_slide_time !== undefined) {
                        auto_slide_time = data_auto_slide_time;
                    }
                    $("#" + id).owlCarousel({
                        items: no_of_item,
                        loop: loop,
                        margin: parseInt(data_slides_margin),
                        dots: show_bullet,
                        mouseDrag: false,
                        touchDrag: false,
                        autoplay: autoplay,
                        autoplayTimeout: auto_slide_time,
                        pullDrag: false,
                        freeDrag: false,
                        responsive: {
                            0: {
                                items: tmp[0]
                            },
                            600: {
                                items: tmp[1]
                            },
                            768: {
                                items: tmp[2]
                            },
                            1000: {
                                items: no_of_item
                            }
                        }
                    });
                });

            }
        },
        //menu
        Menu_bar: function() {
            var counter = 0;
            $('.cr_menu_btn').click(function() {
                if (counter == '0') {
                    $('.cr_menu_wrapper').addClass('cr_main_menu_hide');
                    $(this).children().removeAttr('class');
                    $(this).children().attr('class', 'glyphicon glyphicon-align-justify');
                    counter++;
                } else {
                    $('.cr_menu_wrapper').removeClass('cr_main_menu_hide');
                    $(this).children().removeAttr('class');
                    $(this).children().attr('class', 'glyphicon glyphicon-align-justify');
                    counter--;
                }
            });
        },
        //Submit Form

        SubmitForms: function() {
            $("body").on("click", ".ed_submit", function(e) {
                e.preventDefault();
                var parent_form = $(this).parent();
                var from_email = parent_form.find("#contact_form_from_email").val();
                var to_email = parent_form.find("#contact_form_to_email").val();
                if (from_email == "" || from_email == undefined) {
                    from_email = to_email;
                }
                var data_object = {};
                var i = 0;
                parent_form.children(".form_input_app_div").children(".pc_input_section").each(function() {
                    var id = $('.form-control', this).attr("id");
                    id = id.replace("-", " ");
                    data_object[i] = {}
                    data_object[i]["id"] = id;
                    data_object[i]["value"] = $('.form-control', this).val();
                    i++;
                });
                if (from_email != undefined && from_email != "" && to_email != undefined && to_email != "") {
                    $.ajax({
                        type: "post",
                        url: "sendMail.php",
                        dataType: "text",
                        data: {
                            "from_email": from_email,
                            "to_email": to_email,
                            "data_object": data_object
                        },
                        success: function(data) {
                            alert("sent successfully.");
                        }
                    });
                }
            });
        },
        //Map
        Map: function() {
            if ($(".ed_map").length) {
                $(".ed_map").each(function(index) {
                    var id = $(this).attr("id");
                    var address = $(this).attr("data-address");
                    $(this).googleMap({
                        scrollwheel: true
                    });
                    $(this).addMarker({
                        //coords: [22.9622672, 76.05079490000003] // for using lat long for marker
                        address: "address"
                    });
                });
            }
        },
        responsive_menu:function(){
            if($(".sub-menu").length){
            var menu = $('.sub-menu').find("ul");var menupos = $(menu).offset();
            if (menupos.left + menu.width() > $(window).width()) {var newpos = -$(menu).width(); 
              menu.css({'left': 'auto','right': '100%'});}

             $(".car_menu >ul>li").find('.sub-menu').parent().addClass('dropdown');
             $(".car_menu >ul>li.dropdown").append('<div class="show-submenu"><i class="fa fa-angle-down"></i></div>');

            $(".car_menu >ul>li.dropdown").on("click", ".show-submenu", function(e) {
                e.stopPropagation();
                
                $(this).html($(this).html() == '<i class="fa fa-angle-down"></i>' ? '<i class="fa fa-angle-up"></i>' : '<i class="fa fa-angle-down"></i>');
            }); 
            
            $('.car_menu >ul>li.dropdown .show-submenu').click(function() {
                $('.car_menu >ul>li.dropdown .show-submenu').not($(this)).
                parent().find('.sub-menu').hide();
                $(this).parent().find('.sub-menu').toggle();
            });
            }
            
        },

		/*	//Date picker
					Date: function() {
			$('.hse_datepicker').datetimepicker({
				format: 'MM/dd/YYYY'			
			});
		  },*/

    };
    $(document).ready(function() {
        landingpage.init();
    });



})(jQuery);