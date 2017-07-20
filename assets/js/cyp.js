(function($){

    //var BFR = {};

    "use strict";

    // ON DOCUMENT LOAD -- checkit is for a bug workaround with javascript running twice in the content page content type
    var checkit = window.check_var;

    if(checkit === undefined){ //file never entered. the global var was not set.
        $(function(){
            BFR.init();
            BFR.listeners();
        });
        window.check_var = 1;
    }


    BFR.listeners = function() {

        var $menu = $('#menu');
        var $tips = $('#tips');
        var $plate = $('#plate');
        var $CYPwidget = $('#CYP-widget');


        // Listen for menu clicks
        $menu.on('click', '.sublist li', function(e){

            // ingredient chosen

            // MENU reference
            var $clicked = $(e.target).closest('.sublist li'); // ingredient clicked

            // MENU values
            var ingredient = $clicked.attr('class');
            var foodGroup = $clicked.parent().closest('li').attr('class');
            var ingredientRemoved = false;

            // remove exess classes to isolate values
            if(ingredient.indexOf("active") > -1) {
                ingredientRemoved = true;
                ingredient = ingredient.replace('active','');
            }

            if(foodGroup.indexOf("active") > -1) {
                foodGroup = foodGroup.replace('active','');
            }

            if(foodGroup.indexOf("food-type") > -1) {
                foodGroup = foodGroup.replace('food-type-0','');
                foodGroup = foodGroup.replace('food-type-1','');
                foodGroup = foodGroup.replace('food-type-2','');
            }
            if(foodGroup.indexOf("evergreen") > -1) {
                return false; // evergreen, do not do anything
            }

            foodGroup = foodGroup.replace(/\s/g, '');
            ingredient = ingredient.replace(/\s/g, '')

            // PLATE references
            var $oldPlate = $('#plate .' + foodGroup + ' .active');  // plate old ingredient
            var $newPlate = $('#plate .' + ingredient); // plate new ingredient
            var $plateType = $('#plate .' + foodGroup); // plate section

            // ANIMATE.CSS animation class values
            var tipAnimationOutName = "animated fadeOutLeft";
            var plateAnimationOutName = "animated fadeOutLeft";
            var tipAnimationInName = "animated fadeInRight";
            var plateAnimationInName = "animated fadeInRight";
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';


            // inactivate old selection
            $clicked.siblings('.active').removeClass('active'); // on menu
            $newPlate.siblings('.active').removeClass('active'); // on plate

            // reset any active animations
            $oldPlate.removeClass(plateAnimationOutName + " " + plateAnimationInName); // on plate old
            $newPlate.removeClass(plateAnimationOutName + " " + plateAnimationInName); // on plate new

            // activate new selection
            $clicked.toggleClass('active'); // on menu
            $newPlate.toggleClass('active'); // on plate

            // add animation OUT classes
            $oldPlate.addClass(plateAnimationOutName).one(animationEnd, function(){$(this).removeClass(plateAnimationOutName);}); // on plate


            if (ingredientRemoved == false ){
                // item selected
                $clicked.closest('.sublist').addClass('active'); // menu food-type active
                $newPlate.prependTo($plateType).addClass(plateAnimationInName).one(animationEnd, function(){$(this).removeClass(plateAnimationInName);}); // animate IN plate
                $plateType.addClass('active');	// plate section active
                _gaq.push(['_trackEvent','Choose Your Plate', 'menu-select', ingredient]);
            } else {
                // item unselected
                $plateType.removeClass('active'); // plate section inactive
                $clicked.closest('.sublist').toggleClass('active'); // menu food-type inactive
                _gaq.push(['_trackEvent','Choose Your Plate', 'menu-unselect', ingredient]);
            }

        });

        $plate.on('click', '.pie-section', function(e){
            var plateSection = "";
            var ingredient = "";

            if($(e.target).hasClass('ingredient')){
                plateSection = $(e.target).closest('.pie-section').attr('class');
                ingredient = $(e.target).attr('class');
            } else {
                plateSection = $(e.target).attr('class');
            }

            plateSection = plateSection.replace('pie-section ','');
            plateSection = plateSection.replace(' active','');
            plateSection = plateSection.replace('food-type-0','');
            plateSection = plateSection.replace('food-type-1','');
            plateSection = plateSection.replace('food-type-2','');
            plateSection = plateSection.replace(/\s/g, '');
            console.log("platesection = " + plateSection);

            ingredient = ingredient.replace('ingredient','');
            ingredient = ingredient.replace('plate-image','');
            ingredient = ingredient.replace('active','');
            ingredient = ingredient.replace(/\s/g, '');
            console.log("ingredient = " + ingredient);

            var $menuSection = $('#ingredients > .' + plateSection);
            $menuSection.siblings('.active').removeClass('active');
            $menuSection.addClass('active');
            $menuSection.prependTo($menuSection.parent());
            $plate.removeClass().addClass(plateSection);
            $CYPwidget.addClass('menu');

            /*menu animations */
            var $animatedSections = $menuSection.siblings();
            var menuAnimation1 = "animated pulse";
            var menuAnimation2 = "animated slideInDown";
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            $menuSection.removeClass(menuAnimation1);
            $menuSection.removeClass(menuAnimation2);
            $animatedSections.removeClass(menuAnimation1);
            $animatedSections.removeClass(menuAnimation2);
            $menuSection.addClass(menuAnimation1).one(animationEnd, function(){$(this).removeClass(menuAnimation1);});
            $animatedSections.addClass(menuAnimation2).one(animationEnd, function(){$(this).removeClass(menuAnimation2);});

            if($(e.target).hasClass('ingredient')){
                _gaq.push(['_trackEvent','Choose Your Plate', 'plate-click-ingredient', ingredient]);
            } else {
                _gaq.push(['_trackEvent','Choose Your Plate', 'plate-click-section', plateSection]);
            }
        });

        $menu.on('click', '#menu-title', function(e){
            $CYPwidget.toggleClass('menu'); // for repsonsive menu sliding
        });

        $menu.on('click', '#ingredients button', function(e){
            // ingredient type expanded
            // add active indicators
            $(e.target).parent().siblings().removeClass('active');
            $(e.target).parent().toggleClass('active');
            var plateSection = $(e.target).parent().attr('class');
            plateSection = plateSection.replace(' active','');
            $plate.removeClass().addClass(plateSection);
            $CYPwidget.addClass('menu');
            plateSection = plateSection.replace('food-type-0','');
            plateSection = plateSection.replace('food-type-1','');
            plateSection = plateSection.replace('food-type-2','');
            plateSection = plateSection.replace(/\s/g, '');
            _gaq.push(['_trackEvent','Choose Your Plate', 'menu-click-section', plateSection]);
        });

        $menu.on('click', '#reset', function(e){
            $('#CYP-widget .active').removeClass('active');
            $('.evergreen .ingredient').addClass('active');
            _gaq.push(['_trackEvent','Choose Your Plate', 'plate-reset']);
        });

    };


    // Create Menu
    BFR.createMenu = function(listArray, evergreenTypes, $menu, $tips, $plate){

        $menu.append("<ul id='ingredients'></ul>");
        $menu.prepend("<h2 id='menu-title'>Menu</h2>");
        var $ingredients = $('#ingredients');



        for (var i=0, iLen=listArray.length; i<iLen; i++) {
            // compose food types

            var foodType = listArray[i];
            var title = foodType.title;
            var titleNoSpace = title.replace(/\s/g, '');
            var foods = foodType.options;


            var menuHTML = "";
            var plateHTML = "";
            var evergreenHTML = "";

            for (var h=0, hLen=foods.length; h<hLen; h++) {
                // compose foods
                var tipsHTML = "";
                var food = foods[h]; //current food
                var name = food.name;
                var nameNoSpace = name.replace(/\s/g, '');
                var image = food.photoUrl;
                var tip = food.caption;

                tipsHTML = tipsHTML + "<div class='tip'><div class='tip-image' style='background-image:url(" + image + ");'></div>" + name + "<p>" + tip + "</p></div>";
                menuHTML = menuHTML + "<li class='"+ nameNoSpace + "'><span class='menu-option'>" + name + "</span>" + tipsHTML + "</li>";
                plateHTML = plateHTML + "<div class='ingredient " + nameNoSpace + " plate-image' style='background-image:url(" + image + ");'></div>";
            }


            menuHTML = "<li class='" + titleNoSpace + " food-type-" + i +"'><button>" + title + "</button><ul class='sublist'>" + menuHTML + "</ul></li>";
            plateHTML = "<div class='pie-section "+ titleNoSpace + " food-type-" + i + "'>" + plateHTML + "</div>";


            $ingredients.append(menuHTML); //Build menu
            $plate.append(plateHTML); // Build plate
        }

        for (var j=0, jLen=evergreenTypes.length; j<jLen; j++) {
            //add evergreen items
            var egItem = evergreenTypes[j];
            var egName = egItem.name;
            var egNameNoSpace = egName.replace(/\s/g, '');
            var egImage = egItem.photoUrl;
            var egTip = egItem.caption;

            evergreenHTML = evergreenHTML + "<li class='" + egNameNoSpace + " evergreen'><button>" + egName + "</button><ul class='sublist active'><li class='active " + egNameNoSpace + "'><div class='tip'><div class='tip-image' style='background-image:url(" + egImage + ");'></div>" + egName + " <p>" + egTip + "</p></div></li></ul></li>";
        }

        $ingredients.append(evergreenHTML); //add to menu finish

    };




})(jQuery);



// init/**
