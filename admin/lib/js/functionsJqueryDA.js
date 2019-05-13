/* fonctions jquery pour DA */
$(document).ready(function () {//attend que toutes les objets de la page soient chargées
    
    //code pour le tableau éditable
    $("span[id]").click(function () {
      //Récupération du contenu d'origine de la zone cliquée
        var valeur1 = $.trim($(this).text());

        //s'il fallait tester si on utilise edge :
        if (/Edge\/\d./i.test(navigator.userAgent)) {
            $(this).addClass("borderInput");
        }

        //2 lignes suivantes pour firefox
        //$(this).contentEditable = "true";
        //$(this).addClass("borderInput");

       //récupération, pour la zone cliquée, des attributs id et name, pour les envoyer à la requête sql
        var ident = $(this).attr("id");
        var name = $(this).attr("name");

        $(this).blur(function () {
            $(this).removeClass("borderInput");
           //récupération de la nouveau contenu du champ qui vient de perdre le focus (blur)
            var valeur2 = $(this).text();
            valeur2 = $.trim(valeur2);

            if (valeur1 != valeur2) // Si on a fait un changement
            {
               //adjonction des paramètres qui accompagnent le nom du fichier appelé
                var parametre = 'champ=' + name + '&id=' + ident + '&nouveau=' + valeur2;
                var retour = $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: "text",
                    url: "./admin/lib/php/ajax/ajaxUpdateProduit.php",
                    success: function (data) {
                       //rien de particulier à faire
                        console.log("success");
                    }
                });
                retour.fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });
            };
        });
    });

    
    
    //auto-completion
    $('#password').blur(function () {
        email1 = $('#email1').val();
        email2 = $('#email2').val();
        password = $('#password').val();
        if (($.trim(email1) != '' && $.trim(email2 != '')) && (email1 == email2) && $.trim(password != '')) {
            //alert("email1 = "+email1+" et email2 = "+email2+ " et password = "+password);
            var recherche = "email=" + email1 + "&password=" + password;    
            alert(recherche);
            $.ajax({
                type: 'GET',
                data: recherche,
                dataType: "json",
                url: './admin/lib/php/ajax/ajaxRechercheClient.php',
                success: function (data) { // le data retourné par le fichier php
                    $('#nom').val(data[0].nom_client);
                    $('#prenom').val(data[0].prenom_client);
                    $('#adresse').val(data[0].adresse);
                    $('#numero').val(data[0].numero);
                    $('#codepostal').val(data[0].cp);
                    $('#localite').val(data[0].localite);
                    console.log(data[0].nom_client); //afficher ds les outils du dev ce qu'il y a dans data[0].nom_client
                }
            });
           
        }
    });
    
    $('#submit_choix_type').remove();//fais disparaître le bouton "valider" dans la page instruments_digitaux
    $('#choix_type').change(function () {//selection dans une liste déroulante--> Permet de faire la selection du type de produit a print sans le bouton envoyer
        var param = $(this).attr('name');//name dans le <select> page instruments_digitaux.php
        var val = $(this).val();//value de l'<option> dans le <form> //var... est une variable
        var refresh = 'index.php?' + param + "=" + val + "&submit_choix_type=1";//Champ qui sera envoyé dans l'url
        location.href = refresh;//on remplace notre location par l'URL qu'on vient de créer
    });




    /*tests*/

    $('#parag1').css('color', 'blue');//#FF0000 donne la couleur choisie au parag1
    $('#parag2').css({//Donne la couleur lightcyan au background du paragraphe et 80% à la police
        "background-color": "lightcyan",
        "font-size": "80%"
    });

    $("#parag1").click(function () {//action lorsqu'on click sur le <p>
        $(this).css('color', 'red');//this comme en java, ici this représente parag1
        $('#parag2').css('font-size', '120%');//Fait passer le paragraphe 1 de 80% en police à 120%
        alert("Hello World");//créée une pop-up
    });

    $("#parag1").dblclick(function () {//action lorsqu'on click sur le <p>
        $(this).css('color', 'blue');//this comme en java, ici this représente parag1
        $('#parag2').css('font-size', '80%');//Fait passer le paragraphe 2 de 120% en police à 80%
    });
});