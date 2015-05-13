/*function notifyMe() {
   // Voyons si l'utilisateur est OK pour recevoir des notifications
   if (Notification.permission === "granted") {
      // Si c'est ok, créons une notification
      var notification = new Notification("Nouveau message privé", {
         body: "Vous avez 1 message privé non lu au total."//,
         //icon: "../img/icone/icon.png"
      });
   }

   // Sinon, nous avons besoin de la permission de l'utilisateur
   // Note : Chrome n'implémente pas la propriété statique permission
   // Donc, nous devons vérifier s'il n'y a pas 'denied' à la place de 'default'
   else if (Notification.permission !== 'denied') {
      Notification.requestPermission(function (permission) {

         // Quelque soit la réponse de l'utilisateur, nous nous assurons de stocker cette information
         if(!('permission' in Notification)) {
            Notification.permission = permission;
         }

         // Si l'utilisateur est OK, on crée une notification
         if (permission === "granted") {
            var notification = new Notification("Nouveau message privé", {
               body: "Vous avez 1 message privé non lu au total."//,
               //icon: "../img/icone/icon.png"
            });
         }
      });
   }

   // Comme ça, si l'utlisateur a refusé toute notification, et que vous respectez ce choix,
   // il n'y a pas besoin de l'ennuyer à nouveau.
}*/


/*jQuery(function($) {
   // Lecture des notifications.
   function lireNotification () {
      $.getJSON("./ajax/notifications.json", function (data) {
         $.each(data, function (index, valeur) {
            $("#notification-" + index).removeClass("erreur").addClass(valeur.class).attr("data-contenu", valeur.contenu).prop("title", valeur.title);
         });
      });
   }
   */
/*
|--------------------------------------------------------------------------
| Détection des anciens navigateurs
|--------------------------------------------------------------------------
*/
// http://responsivenews.co.uk/post/18948466399/cutting-the-mustard
"use strict";
if (!(window.EventSource) || !(window.addEventListener) || !(document.querySelector) || !(window.localStorage) || !(window.Notification)) {
   var browserBanner = document.getElementById("browser-banner");
   browserBanner.style.display = "block";
}

/*
|--------------------------------------------------------------------------
| JavaScript
|--------------------------------------------------------------------------
*/

// On vérifie que le navigateur supporte addEventListener
if (window.addEventListener) {
   // On créé les variables des touches et du Konami code.
   var keys = [],
   konami = "38,38,40,40,37,39,37,39,66,65";

   // On lie les touches à la fonction du Konami code
   window.addEventListener("keydown", function(e){
      // On pousse le code dans la variable keys
      keys.push(e.keyCode);

      // Ensuite on vérifie que l'on a bien entré un Konami code
      if (keys.toString().indexOf(konami) >= 0) {
         // On fait du SWAG sur le site
         var body = document.body;
         body.className = "is_mirrored";

         // Puis on vide la variable keys
         keys = [];
      }
   }, true);
}


// Fonction mimant le fadeIn de jQuery
function fadeIn(el, end) {
   el.style.display = "block";
   el.style.opacity = 0;
   el.style.filter = "alpha(opacity=0)";

   var opacity = 0,
   timer = setInterval(function() {
      opacity += 50 / 400;

      if(opacity >= end) {
         clearInterval(timer);
         opacity = end;
      }

      el.style.opacity = opacity;
      el.style.filter = "alpha(opacity=" + opacity * 100 + ")";
   }, 50);
}


// Fonction mimant le fadeOut de jQuery
function fadeOut(el) {
   var opacity = 1,
   timer = setInterval(function() {
      opacity -= 50 / 400;

      if( opacity <= 0 ) {
         clearInterval(timer);
         opacity = 0;
         el.style.display = "none";
      }

      el.style.opacity = opacity;
      el.style.filter = "alpha(opacity=" + opacity * 100 + ")";
   }, 50);
}

// On vérifie que le navigateur supporte addEventListener
// On ne joue pas avec les boites modales sur mobile
if (window.addEventListener && window.innerWidth >= 768) {
   // Afficher la boide de Login
   // SSI le bouton existe
   if (document.getElementById("modal-open")) {
      var modalButton = document.getElementById("modal-open");
      modalButton.addEventListener("click", function(e) {
         e.preventDefault();
         fadeIn(document.getElementById("modal-mask"), 0.85);
         document.getElementById("modal").style.display = "flex";
         fadeIn(document.getElementById("modal-login"), 1);
      });

      var modalClose = document.getElementById("modal-close");
      modalClose.addEventListener("click", function(e) {
         e.preventDefault();
         fadeOut(document.getElementById("modal-mask"));
         fadeOut(document.getElementById("modal-login"));
         // Fix visuel
         window.setTimeout(function() {
            document.getElementById("modal").style.display = "none";
         }, 500);
      });
   }
}

// Redimentionnement des vidéos
function resizeFrames() {
   var iFrames = document.getElementsByTagName("iframe");
   for (var i = 0; i < iFrames.length; i++) {
      var className = iFrames[i].getAttribute("class");
      if ( ! className) {
         // Pour chaque iframe on applique un height égal au rapport 16/9 du width détécté
         var width = iFrames[i].offsetWidth;
         iFrames[i].style.height = width * 0.5625 + "px";
      }
   }
}
var timeOut = null;

// Obtenir la hauteur
function getAbsoluteHeight(el) {
   var styles = window.getComputedStyle(el);
   var margin = parseFloat(styles.marginTop) + parseFloat(styles.marginBottom);
   return el.offsetHeight + margin;
}

function hasClass(element, cls) {
   return (" " + element.className + " ").indexOf(" " + cls + " ") > -1;
}

var header = document.getElementsByTagName("header")[0];
var header_whole = getAbsoluteHeight(header);
var header_main = document.getElementById("head-main");
var header_main_height = getAbsoluteHeight(header_main);
var header_second_user = document.getElementById("header-second-user");
var header_second_menu = document.getElementById("header-second-menu");
//var header_main_user = document.getElementById("header-main-user");

function stickyScroll() {
   if (window.pageYOffset > header_main_height) {
      header.classList.add("fixed");
      header_second_user.style.visibility = "visible";
      header_second_menu.style.visibility = "visible";

      //header_main_user.classList.remove("fadeIn");

      header_second_user.classList.add("fadeIn");
      header_second_menu.classList.add("fadeIn");
      document.body.style.paddingTop = header_whole + "px";
   }
   if (window.pageYOffset < header_main_height) {
      header.classList.remove("fixed");
      header_second_user.classList.remove("fadeIn");
      header_second_menu.classList.remove("fadeIn");

      //header_main_user.classList.add("fadeIn");

      window.setTimeout(function() {
         if ( ! hasClass(header_second_user, "fadeIn")) {
            header_second_user.style.visibility = "hidden";
            header_second_menu.style.visibility = "hidden";
         }
      }, 500);
      document.body.style.paddingTop = 0;
   }
}

// Scroll handler to toggle classes.
if (window.innerWidth >= 768) {
   window.addEventListener("scroll", stickyScroll, false);
}



window.onload = function() {
   resizeFrames();
};

window.onresize = function() {
   if (timeOut !== null) {
      clearTimeout(timeOut);
   }
   timeOut = setTimeout(function() {
      resizeFrames();
   }, 500);
};

// set the date we're counting down to
var countdown = document.getElementById("countdown");
if(countdown) {
   var dateString = countdown.innerHTML;
   var target_date = new Date(dateString.replace(/-/g, "/")).getTime();
   var days, hours, minutes, seconds;
   setInterval(function () {

      // find the amount of "seconds" between now and target
      var current_date = new Date().getTime();
      var seconds_left = (target_date - current_date) / 1000;

      // do some time calculations
      days = parseInt(seconds_left / 86400, 10);
      seconds_left = seconds_left % 86400;

      hours = ("0" + parseInt(seconds_left / 3600, 10)).slice(-2);
      seconds_left = seconds_left % 3600;

      minutes = ("0" + parseInt(seconds_left / 60, 10)).slice(-2);
      seconds = ("0" + parseInt(seconds_left % 60, 10)).slice(-2);

      // format countdown string + set tag value
      countdown.innerHTML = "<strong>" + days + " Jours</strong> " + hours + "h " + minutes + "m " + seconds + "s";
   }, 1000);
}


window.onscroll = function(){
   var windowYOffset = window.pageYOffset,
   parallax = document.getElementById("parallax"),
   speed = 0.1,
   elBackgrounPos = "50% " + (-windowYOffset * speed) + "px";

   parallax.style.backgroundPosition = elBackgrounPos;
};