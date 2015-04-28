if (window.addEventListener) {

   var quoteButtons = document.querySelectorAll(".post-quote-btn"),
   editorButtons = document.querySelectorAll(".editor-btn"),
   smileyButton = document.getElementById("editor-smiley-list"),
   smileyBar =  document.getElementById("smiley-bar"),
   textarea = document.getElementById("answer");

   /*
   |--------------------------------------------------------------------------
   | On attache le clic sur le bouton citer au pré-remplissage de la zone de texte
   |--------------------------------------------------------------------------
   */
   for (var i = 0; i < quoteButtons.length; i++) {
      quoteButtons[i].addEventListener("click", function(e) {
         e.preventDefault();

         // On récupère l'ID du message via le data- du bouton et on récupère la citation dans un <pre> avec l'ID correspondant
         var postId = e.target.dataset.postId,
         quotedText = document.getElementById("quote-" + postId);

         // On ajoute la citation dans le <textarea> et on se focus dessus
         textarea.value += quotedText.textContent;
         textarea.scrollTop = textarea.scrollHeight;
         textarea.focus();
      });
   }

   /*
   |--------------------------------------------------------------------------
   | On attache le clic sur le bouton de smiley pour afficher la liste
   |--------------------------------------------------------------------------
   */
   smileyButton.addEventListener("click", function(e) {
      e.preventDefault();
      if (smileyBar.style.display == '') {
         smileyBar.style.display = 'block';
      } else {
         smileyBar.style.display = '';
      }
      textarea.focus();
   });

   /*
   |--------------------------------------------------------------------------
   | On attache le clic sur un bouton de l'éditeur à son action
   |--------------------------------------------------------------------------
   */
   for (var i = 0; i < editorButtons.length; i++) {
      editorButtons[i].addEventListener("click", function(e) {
         e.preventDefault();

         // On fait bien attention à ce que l'on soit sur le a et non le i ou img
         if (e.target.nodeName == "I" || e.target.nodeName == "IMG") {
            var data = e.target.parentNode.dataset;
         } else {
            var data = e.target.dataset;
         }

         // Si on est face à un tag
         if (data.tag) {
            var code = data.tag;

            // On prépare les balises entourant le code
            var bbdebut = "[" + code + "]";
            var bbfin = "[/" + code + "]";

            if (typeof document.selection != 'undefined') {
               var range = document.selection.createRange();
               var insText = range.text;
               range.text = bbdebut + insText + bbfin;
               range = document.selection.createRange();
               if (insText.length == 0) {
                  range.move('character', -bbfin.length);
               } else {
                  range.moveStart('character', bbdebut.length + insText.length + bbfin.length);
               }
               range.select();
            } else if (typeof textarea.selectionStart != 'undefined') {
               var start = textarea.selectionStart;
               var end = textarea.selectionEnd;
               var insText = textarea.value.substring(start, end);
               textarea.value = textarea.value.substr(0, start) + bbdebut + insText + bbfin + textarea.value.substr(end);
               var pos;
               if (insText.length == 0) {
                  pos = start + bbdebut.length;
               } else {
                  pos = start + bbdebut.length + insText.length + bbfin.length;
               }
               textarea.selectionStart = pos;
               textarea.selectionEnd = pos;
            } else {
               var pos;
               var re = new RegExp('^[0-9]{0,3}$');
               while(!re.test(pos)) {
                  pos = prompt("insertion (0.." + textarea.value.length + "):", "0");
               }
               if (pos > textarea.value.length) {
                  pos = textarea.value.length;
               }
               var insText = prompt("Veuillez taper le texte");
               textarea.value = textarea.value.substr(0, pos) + bbdebut + insText + bbfin + textarea.value.substr(pos);
            }
         }

         if (data.smiley) {
            var code = data.smiley,
            bbcode = " :" + code + ": ";

            if (typeof document.selection != 'undefined') {
               var range = document.selection.createRange();
               range.text = bbcode;
               range = document.selection.createRange();
               if (insText.length == 0) {
                  range.move('character', -bbcode.length);
               } else {
                  range.moveStart('character', bbcode.length + bbcode.length);
               }
               range.select();
            } else if (typeof textarea.selectionStart != 'undefined') {
               var start = textarea.selectionStart;
               var end = textarea.selectionEnd;
               textarea.value = textarea.value.substr(0, start) + bbcode + textarea.value.substr(end);
               var pos;
               pos = start + bbcode.length;
               textarea.selectionStart = pos;
               textarea.selectionEnd = pos;
            } else {
               var pos;
               var re = new RegExp('^[0-9]{0,3}$');
               while(!re.test(pos)) {
                  pos = prompt("insertion (0.." + textarea.value.length + "):", "0");
               }
               if (pos > textarea.value.length) {
                  pos = textarea.value.length;
               }
               textarea.value = textarea.value.substr(0, pos) + bbcode + textarea.value.substr(pos);
            }
            smileyBar.style.display = '';
         }
         textarea.focus();
      });
   }
};