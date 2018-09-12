var preview = document.getElementById('preview');
var htmlcontent = document.getElementById("htmlcontent");
var target = document.getElementById("htmlcontentreal");

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};

String.prototype.removeAll = function(array){
   var target = this;
   for (var i = 0; i < array.length; i++) {
      target = target.replaceAll(array[i], "");
   }
   return target;
}

htmlcontent.addEventListener("keyup", doyerthang);

function converttohtml(content){
   let nobrs = content.removeAll(["<br>","<div>","</div>","&nbsp;"]);
   let tags = nobrs.replaceAll("&lt;", "<").replaceAll("&gt;", ">");
   return tags;
}

function readhtml(){
   return htmlcontent.innerHTML;
}

function doyerthang(){
   let content = htmlcontent.innerHTML;
   let newhtml = converttohtml(content);
   preview.innerHTML = newhtml;
   target.innerHTML = newhtml;
}

htmlcontent.innerHTML = htmlcontent.innerHTML.replaceAll("&lt;br&gt;", "<br>");
doyerthang();
