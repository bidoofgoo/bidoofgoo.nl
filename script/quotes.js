// Script for placing quotes

var quotes = ["Existance is a terrible fucking joke. [&nbsp;/0v0]/",
"Life is a hit or a miss, this one is definitelty a miss.",
"So, this is what it's like to suffer.",
"You can't kill what's already dead inside.",
"Why was I born? I didn't ask for this.",
"Do we live just to die?",
"What a meaningless reality we live in.",
"Every day I die a little more.",
"To live is to suffer."];

function selectQuote(){
  var quote = document.getElementById('quote');

  var selected = Math.floor((Math.random() * quotes.length))

  quote.innerHTML = quotes[selected];
}

window.onload = selectQuote;
