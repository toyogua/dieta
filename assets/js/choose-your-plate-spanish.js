(function($){

    var BFR = {};

    // BFR CYP init
    BFR.init = function(){

        var $menu = $('#menu');
        var $tips = $('#tips');
        var $plate = $('#plate');
        var $CYPwidget = $('#CYP-widget');

        // INGREDIENTS

        //protein
        var foodType2 = [
            {name:'Frijoles y lentejas ', caption:'Ejemplos: frijoles secos o frijoles enlatados con poco sodio que han sido enjuagados y escurridos, pallares o jud\u00EDas de Per\u00FA, frijoles pintos, garbanzos, porotos blancos o habichuelas rojas. Otras menestras incluyen lentejas, frijoles de carilla y frijoles verdes.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/beans.png'},
            {name:'Nueces y semillas ', caption:'Ejemplos: un pu\u00f1ado de nueces o 2 cucharadas de mantequilla de nuez contienen grasas saludables, lo que es una mejor opci\u00F3n que carnes grasosas o procesadas. Todas las nueces son recomendables, como las almendras, nogales, pistachos, anacardos, nueces de macadamia, casta\u00f1as, nueces del Brasil, pi\u00f1ones, etc., semillas como las de girasol y ajonjol\u00ED, mantequilla de nuez y de semillas, mantequilla de almendras, cacahuate y semilla de girasol.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/nuts-and-seeds.png'},
            {name:'Pescado ', caption:'Ejemplos: albacora, caballa, halibut, arenque, salm\u00F3n, sardinas y trucha contienen \u00E1cidos grasos Omega 3 que son buenos para el coraz\u00F3n tambi\u00E9n.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/fish.png'},
            {name:'Mariscos ', caption:'Ejemplos: almejas, cangrejo, imitaci\u00F3n de cangrejo, langosta, vieiras, camarones,  ostras.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/shrimp.png'},
            {name:'Huevos ', caption:'Huevos enteros cocidos casi sin grasa, claras de huevo y sustitutos de huevo.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/eggs.png'},
            {name:'Queso ', caption:'Queso con poca grasa y queso Cotija.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/cheese.png'},
            {name:'Pollo ', caption:'Escoja pollo sin piel para que tenga menos grasa saturada y colesterol; escoja la pechuga, que por ser carne blanca tiene menos grasa que la carne oscura de los muslos y piernas. Lo mejor es asarlo u hornearlo; evite fre\u00EDrlo.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/chicken2.png'},
            {name:'Pavo ', caption:'Escoja pedazos sin piel para que tenga menos grasa saturada y colesterol; escoja la pechuga, que por ser carne blanca tiene menos grasa que la carne oscura de los muslos y piernas. Lo mejor es asarlo u hornearlo; evite fre\u00EDrlo.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/turkey.png'},
            {name:'Carne de res ', caption:'Escoja cortes magros de carne de res, cordero y puerco como paleta, cuarto trasero, asado redondo, solomillo, chuleta y lomo fino.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/beef.png'},
            {name:'Puerco ', caption:'Escoja cortes magros de puerco como jam\u00F3n sin hueso, tocino canadiense, lomo fino, asado sin hueso y chuletas sin hueso.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/pork.png'},
            {name:'Humus ', caption:'(la prote\u00EDna derivada de plantas es una excelente opci\u00F3n)', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/hummus.png'},
            {name:'Hamburguesas y Nuggets de soya ', caption:'(la prote\u00EDna derivada de plantas es una excelente opci\u00F3n)', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/soy-burger.png'}
        ];

        //vegetable
        var foodType1 = [

            {name:'Chiles ', caption:'Las mejores opciones son vegetales frescos, congelados o enlatados y jugos de vegetales sin sal agregada (sodio), sin grasa ni az\u00FAcar. Si usa verduras enlatadas, enju\u00E1guelas y esc\u00FArralas con agua para eliminar 40% del sodio. Coma 3-5 porciones de vegetales al d\u00EDa. Una porci\u00F3n de vegetales es 1/2 taza de vegetales cocidos o en jugo, o una taza de vegetales crudos. (Puede usar cada recomendaci\u00F3n e intercambiarlas para las opciones sin almid\u00F3n).', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/chile-peppers.png'},
            {name:'Nopales ', caption:'Las mejores opciones son vegetales frescos, congelados o enlatados y jugos de vegetales sin sal agregada (sodio), sin grasa ni az\u00FAcar. Si usa verduras enlatadas, enju\u00E1guelas y esc\u00FArralas con agua para eliminar 40% del sodio. Coma 3-5 porciones de vegetales al d\u00EDa. Una porci\u00F3n de vegetales es 1/2 taza de vegetales cocidos o en jugo, o una taza de vegetales crudos. (Puede usar cada recomendaci\u00F3n e intercambiarlas para las opciones sin almid\u00F3n).', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/nopales.png'},
            {name:'Jalape\u00f1os ', caption:'Las mejores opciones son vegetales frescos, congelados o enlatados y jugos de vegetales sin sal agregada (sodio), sin grasa ni az\u00FAcar. Si usa verduras enlatadas, enju\u00E1guelas y esc\u00FArralas con agua para eliminar 40% del sodio. Coma 3-5 porciones de vegetales al d\u00EDa. Una porci\u00F3n de vegetales es 1/2 taza de vegetales cocidos o en jugo, o una taza de vegetales crudos. (Puede usar cada recomendaci\u00F3n e intercambiarlas para las opciones sin almid\u00F3n).', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/jalepenos.png'},
            {name:'Zanahorias ', caption:'Las mejores opciones son vegetales frescos, congelados o enlatados y jugos de vegetales sin sal agregada (sodio), sin grasa ni az\u00FAcar. Si usa verduras enlatadas, enju\u00E1guelas y esc\u00FArralas con agua para eliminar 40% del sodio. Coma 3-5 porciones de vegetales al d\u00EDa. Una porci\u00F3n de vegetales es 1/2 taza de vegetales cocidos o en jugo, o una taza de vegetales crudos. (Puede usar cada recomendaci\u00F3n e intercambiarlas para las opciones sin almid\u00F3n).', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/carrots.png'},
            {name:'Col ', caption:'Las mejores opciones son vegetales frescos, congelados o enlatados y jugos de vegetales sin sal agregada (sodio), sin grasa ni az\u00FAcar. Si usa verduras enlatadas, enju\u00E1guelas y esc\u00FArralas con agua para eliminar 40% del sodio. Coma 3-5 porciones de vegetales al d\u00EDa. Una porci\u00F3n de vegetales es 1/2 taza de vegetales cocidos o en jugo, o una taza de vegetales crudos. (Puede usar cada recomendaci\u00F3n e intercambiarlas para las opciones sin almid\u00F3n).', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/cabbage.png'},
            {name:'Berenjena ', caption:'Las mejores opciones son vegetales frescos, congelados o enlatados y jugos de vegetales sin sal agregada (sodio), sin grasa ni az\u00FAcar. Si usa verduras enlatadas, enju\u00E1guelas y esc\u00FArralas con agua para eliminar 40% del sodio. Coma 3-5 porciones de vegetales al d\u00EDa. Una porci\u00F3n de vegetales es 1/2 taza de vegetales cocidos o en jugo, o una taza de vegetales crudos. (Puede usar cada recomendaci\u00F3n e intercambiarlas para las opciones sin almid\u00F3n).', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/eggplant.png'},
            {name:'Coliflor ', caption:'Las mejores opciones son vegetales frescos, congelados o enlatados y jugos de vegetales sin sal agregada (sodio), sin grasa ni az\u00FAcar. Si usa verduras enlatadas, enju\u00E1guelas y esc\u00FArralas con agua para eliminar 40% del sodio. Coma 3-5 porciones de vegetales al d\u00EDa. Una porci\u00F3n de vegetales es 1/2 taza de vegetales cocidos o en jugo, o una taza de vegetales crudos. (Puede usar cada recomendaci\u00F3n e intercambiarlas para las opciones sin almid\u00F3n).', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/cauliflower.png'},
            {name:'Br\u00F3coli ', caption:'Las mejores opciones son vegetales frescos, congelados o enlatados y jugos de vegetales sin sal agregada (sodio), sin grasa ni az\u00FAcar. Si usa verduras enlatadas, enju\u00E1guelas y esc\u00FArralas con agua para eliminar 40% del sodio. Coma 3-5 porciones de vegetales al d\u00EDa. Una porci\u00F3n de vegetales es 1/2 taza de vegetales cocidos o en jugo, o una taza de vegetales crudos. (Puede usar cada recomendaci\u00F3n e intercambiarlas para las opciones sin almid\u00F3n).', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/brocolli.png'},
            {name:'J\u00EDcama ', caption:'Las mejores opciones son vegetales frescos, congelados o enlatados y jugos de vegetales sin sal agregada (sodio), sin grasa ni az\u00FAcar. Si usa verduras enlatadas, enju\u00E1guelas y esc\u00FArralas con agua para eliminar 40% del sodio. Coma 3-5 porciones de vegetales al d\u00EDa. Una porci\u00F3n de vegetales es 1/2 taza de vegetales cocidos o en jugo, o una taza de vegetales crudos. (Puede usar cada recomendaci\u00F3n e intercambiarlas para las opciones sin almid\u00F3n).', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/jicama.png'},
            {name:'Tomates ', caption:'Las mejores opciones son vegetales frescos, congelados o enlatados y jugos de vegetales sin sal agregada (sodio), sin grasa ni az\u00FAcar. Si usa verduras enlatadas, enju\u00E1guelas y esc\u00FArralas con agua para eliminar 40% del sodio. Coma 3-5 porciones de vegetales al d\u00EDa. Una porci\u00F3n de vegetales es 1/2 taza de vegetales cocidos o en jugo, o una taza de vegetales crudos. (Puede usar cada recomendaci\u00F3n e intercambiarlas para las opciones sin almid\u00F3n).', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/tomato.png'},
            {name:'Espinaca ', caption:'Las mejores opciones son vegetales frescos, congelados o enlatados y jugos de vegetales sin sal agregada (sodio), sin grasa ni az\u00FAcar. Si usa verduras enlatadas, enju\u00E1guelas y esc\u00FArralas con agua para eliminar 40% del sodio. Coma 3-5 porciones de vegetales al d\u00EDa. Una porci\u00F3n de vegetales es 1/2 taza de vegetales cocidos o en jugo, o una taza de vegetales crudos. (Puede usar cada recomendaci\u00F3n e intercambiarlas para las opciones sin almid\u00F3n).', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/spinach.png'},
            {name:'Pimientos ', caption:'Las mejores opciones son vegetales frescos, congelados o enlatados y jugos de vegetales sin sal agregada (sodio), sin grasa ni az\u00FAcar. Si usa verduras enlatadas, enju\u00E1guelas y esc\u00FArralas con agua para eliminar 40% del sodio. Coma 3-5 porciones de vegetales al d\u00EDa. Una porci\u00F3n de vegetales es 1/2 taza de vegetales cocidos o en jugo, o una taza de vegetales crudos. (Puede usar cada recomendaci\u00F3n e intercambiarlas para las opciones sin almid\u00F3n).', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/green-pepper.png'}
        ];

        //grains and starch
        var foodType3 = [

            {name:'Calabaza ', caption:'Los vegetales con almid\u00F3n son excelentes fuentes de vitaminas, minerales y fibra. Esta es una buena opci\u00F3n porque no contiene grasa, az\u00FAcar o sodio, etc.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/calabaza.png'},
            {name:'Chayote ', caption:'Los vegetales con almid\u00F3n son excelentes fuentes de vitaminas, minerales y fibra. Esta es una buena opci\u00F3n porque no contiene grasa, az\u00FAcar o sodio, etc.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/chayote.png'},
            {name:'Frijoles verdes ', caption:'Los vegetales con almid\u00F3n son excelentes fuentes de vitaminas, minerales y fibra. Esta es una buena opci\u00F3n porque no contiene grasa, az\u00FAcar o sodio, etc.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/peas.png'},
            {name:'Ma\u00EDz o elote ', caption:'Los vegetales con almid\u00F3n son excelentes fuentes de vitaminas, minerales y fibra. Esta es una buena opci\u00F3n porque no contiene grasa, az\u00FAcar o sodio, etc.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/corn.png'},
            {name:'Yuca ', caption:'El tama\u00f1o de la porci\u00F3n es importante, pero esta opci\u00F3n tiene muchas vitaminas, minerales y fibra.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/yucca.png'},
            {name:'Boniato ', caption:'El tama\u00f1o de la porci\u00F3n es importante, pero esta opci\u00F3n tiene muchas vitaminas, minerales y fibra.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/yam.png'},
            {name:'Camote o batata ', caption:'El tama\u00f1o de la porci\u00F3n es importante, pero esta opci\u00F3n tiene muchas vitaminas, minerales y fibra.   ', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/sweet-potato.png'},
            {name:'Pl\u00E1tano ', caption:'Los vegetales con almid\u00F3n son excelentes fuentes de vitaminas, minerales y fibra. Esta es una buena opci\u00F3n porque no contiene grasa, az\u00FAcar o sodio, etc.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/plantain.png'},
            {name:'Quinua ', caption:'Esta es una buena opci\u00F3n de granos integrales. Los granos integrales son ricos en vitaminas, minerales, fitoqu\u00EDmicos y fibra.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/quinoa.png'},
            {name:'Arroz ', caption:'El tama\u00f1o de la porci\u00F3n es importante, trate de comer &#188; taza de arroz.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/white-rice.png'},
            {name:'Arroz integral ', caption:'Esta es una buena opci\u00F3n de granos integrales. Los granos integrales son ricos en vitaminas, minerales, fitoqu\u00EDmicos y fibra.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/brown-rice.png'},
            {name:'Tortillas ', caption:'Trate de comer tortillas de grano integral.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/tortilla.png'},
            {name:'Papas o patatas ', caption:'Los vegetales con almid\u00F3n son excelentes fuentes de vitaminas, minerales y fibra. Esta es una buena opci\u00F3n porque no contiene grasa, az\u00FAcar o sodio, etc.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/potato.png'},
            {name:'Pasta ', caption:'Trate de comer fideos de grano integral.', photoUrl:'http://www.diabetes.org/assets/img/CYP/images/250px/pasta.png'}
        ];

        // replace á with \u00E1
        // replace é with \u00E9
        // replace í with \u00ED
        // replace ó with \u00F3
        // replace ú with \u00FA
        // replcae ñ with \u00f1



        var foodTypes = [{title:"Prote\u00EDna", options: foodType2 },{title:"Vegetales con almid\u00F3n", options: foodType3 },{title:"Vegetales sin almid\u00F3n", options: foodType1}];


        var evergreenTypes = [
            {name:'Fruta', caption: 'Agregue una porción de fruta, de lácteos o ambos si su plan de alimentación se lo permite.', photoUrl: 'http://www.diabetes.org/assets/img/CYP/images/berry-bowl.png'},
            {name:'Bebida', caption: 'Para completar su comida, agregue una bebida baja en calorías como agua, té o café sin azúcar.', photoUrl: 'http://www.diabetes.org/assets/img/CYP/images/drink.png'}
        ];


        // Build Menu, Tips, Plate
        BFR.createMenu(foodTypes, evergreenTypes, $menu, $tips, $plate);

    };

    window.BFR = BFR;

})(jQuery);/**
 * Created by ROCKSOFT STATION on 23/05/2017.
 */
