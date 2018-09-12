var contentsBody;
var domain = "bidoofgoo.nl";
var url = window.location.href;
url = url.substring(0, url.indexOf(domain)) + domain;

var extendHead;

function extendHTML(file) {
   /*loop through a collection of all HTML elements:*/
   body = document.getElementsByTagName("body")[0];
   head = document.getElementsByTagName("head")[0];
   doc = document.getElementsByTagName('html')[0];

   contentsBody = body.innerHTML;

   /*search for elements with a certain atrribute:*/

   /*make an HTTP request using the attribute value as the file name:*/
   xhttp = new XMLHttpRequest();
   console.log("Setup xmlhttprequest");
   xhttp.onreadystatechange = function() {
      if (this.readyState == 4) {
         if (this.status == 200) {
            console.log("Caught it");

            extendHead = document.createElement('div');

            let rsptxt = this.responseText;
            extendHead.innerHTML = rsptxt.substring(rsptxt.indexOf("<head>"), rsptxt.indexOf("</head>"));
            document.getElementsByTagName('body')[0].innerHTML = rsptxt.substring(rsptxt.indexOf("<body>"), rsptxt.indexOf("</body>"));

            waitASecond(function(){
               includeHTML();
            });
         }
         if (this.status == 404) {body.innerHTML = "404 Page not found?";}
      }
   }

   xhttp.open("GET", url + "/extensions/" + file + ".html", true);
   xhttp.send();
}


function includeHTML(){
   head = document.getElementsByTagName('head')[0];
   main = document.getElementsByTagName('main')[0];

   main.innerHTML = contentsBody;

   let headements = extendHead.getElementsByTagName('*');
   for (let i = 0; i < headements.length; i++ ) {

      let newElement = document.createElement(headements[i].tagName);

      for (var j = 0; j < headements[i].attributes.length; j++) {
         let attr = headements[i].attributes[j];
         if (attr.name == "src" ||
         (attr.name == "href" && attr.value.indexOf("google") == -1)) {
            newElement.setAttribute(attr.name, url + "/" + attr.value);
         } else{
            newElement.setAttribute(attr.name, attr.value);
         }

      }

      newElement.innerHTML = headements[i].innerHTML;

      head.appendChild(newElement);
   }

   fixOnload();
}

let doOnload = null;

function fixOnload(){
   if (doOnload == null) {
      setTimeout(fixOnload);
   }else {
      doOnload();
      console.log("done!");
   }
}

function waitASecond(funct){
   setTimeout(funct, 5);
}
