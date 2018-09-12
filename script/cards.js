// Script for placing cards on the page;

// tag(word, color)
var tags = {
   webvr : new tag("WebVR", "#328AEF"),
   oculus: new tag("Oculus rift", "#404040"),
   gear: new tag("Gear vr", "#505040"),
   art: new tag("Art", "green"),
   video: new tag("Video", "red"),
   animation: new tag("Animation", "#D82998"),
   spooky: new tag("Spooky", "#68319B"),
   game: new tag("Game", "#AD60FF"),
   site: new tag("Website", "#E2B64D"),
   misc: new tag("Misc", "grey"),
   dutch: new tag("Dutch only", "#FF6A00")
};

var cards = [
   new card("Kat & Cavia RPG", "img/katcavia.png", url + "/katcavia", [tags.game, tags.dutch]),
   new card("Skeleton cave", "img/skelcav.png","https://bidoofgoo.deviantart.com/art/The-Cave-626435086",
   [tags.art, tags.spooky]),
   new card("Why we hate you", "img/hate.png", url + "/hate",
   [tags.video, tags.animation, tags.misc]),
   new card("Eddsworld: Just a bit crazy REMASTERED", "img/edd.png",
   "https://www.youtube.com/watch?v=WnX8mijcaZc", [tags.video, tags.animation]),
   new card("Ont-wikkeling.net", "img/ontwikkeling.png", "www.ont-wikkeling.net", [tags.site, tags.dutch]),
   new card("Enter psychedelic skeleton VR", "img/skele.png", "http://bidoofgoo.nl/oud/", [tags.webvr, tags.spooky]),
   new card("One demented <strike>hecking</strike> boi", "img/fuk.png",
   "https://bidoofgoo.deviantart.com/art/Scary-Guy-714356686", [tags.art, tags.spooky]),
   new card("Enter cool computer space", "img/space.png",
   "https://hot-server.glitch.me/eventList/spindex.html", [tags.webvr]),
   new card("Mijnomi.nl", "img/omi.png", "https://www.mijnomi.nl", [tags.site, tags.dutch]),
   new card("Wonder mail S generator", "img/pkmn.png",
   "http://wondermails.bidoofgoo.nl/", [tags.site, tags.game, tags.misc]),
   new card("Soup VR", "img/soup.png", "http://soep.bidoofgoo.nl", [tags.webvr, tags.gear, tags.oculus, tags.dutch]),
   new card("Project swim safe", "img/zwem.png", "https://veiligzwemmen.bidoofgoo.nl/", [tags.site, tags.misc, tags.dutch]),1
];

function createCards(){
   var cardPlace = document.getElementsByClassName('cards')[0];
   for (let i = cards.length - 1; i >= 0 ; i--) {
      if(cards[i].tags != null){
         let invisibox = makeElement('div', [['class', 'invisibox']], cardPlace);
         let cardNode = makeElement('div', [['class','card'],["onclick", "openInNewTab('"+ cards[i].url + "');" ]], invisibox);
         let img = makeElement("img", [["src", cards[i].imgsrc]], cardNode);
         let cardTitle = makeElement("p", [["class","cardTitle"]], cardNode);
         cardTitle.innerHTML = cards[i].name;
         let tagPlace = makeElement("div", [["class", "tags"]], cardNode);
         for (let j = 0; j < cards[i].tags.length; j++) {
            let newTag = makeElement("span", [["class", "tag"]], tagPlace);
            newTag.style.backgroundColor = cards[i].tags[j].color;
            newTag.innerHTML = cards[i].tags[j].word;
         }
      }
   }
}

function makeElement(tagName, attributes, parentNode){
   let newElement = document.createElement(tagName);
   for (let i = 0; i < attributes.length; i++) {
      newElement.setAttribute(attributes[i][0], attributes[i][1]);
   }
   if (parentNode != null) {
      parentNode.appendChild(newElement);
   }
   return newElement;
}

function openInNewTab(link){
   if (link.indexOf(url) != -1){
      window.location.href = link;
   }else {
      let tab = window.open(link, "_blank");
      tab.focus();
   }
}

function card(name, imgsrc, link, tags){
   this.name = name;
   this.imgsrc = imgsrc;
   this.url = link;
   this.tags = tags;
   this.node = null;
}

function tag(word, color){
   this.word = word;
   this.color = color;
}
