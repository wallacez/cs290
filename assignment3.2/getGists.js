/* Get gists from github */
function getGists() {
  var gistArray = [];
  var url = 'https://api.github.com/gists';
  var page = document.getElementsByName('pages')[0].value;
  var httpReq;
  
  for ( var i = 0; i < page; i++ ) {
    httpReq = new XMLHttpRequest();
    
    if( !httpReq ) 
      throw 'Unable to initiate HTTP Request!'; 
    
    httpReq.onreadystatechange = function() {
      if ((httpReq.readyState === 4) && ( httpReq.status === 200 )) {
        var httpParse = JSON.parse(this.responseText);
        for ( var key in httpParse ) {
          gistArray.push(httpParse[key]);
        }
        createGistList(gistArray);
      }
    };
  }
  url += '?pages=' + page;
  httpReq.open('GET', url);
  httpReq.send();
}

window.onload = function() {
  var list = localStorage.getItem('gistList');
  
  if( list === null ) {
    list = {'gists':[]};
    localStorage.setItem('gistList', JSON.stringify(list));
    displayFavorites();
    }
   else {
    list = JSON.parse(localStorage.getItem('gistList'));
    displayFavorites();
   }
};

function createGistList(array) {
  var list = document.getElementById('gist-list');
  var ul = document.createElement('ul');
  var divURL;
  
  // create an array of gists
  for (var i = 0; i < array.length; i++) {
    var item = document.createElement('li');
    if (array[i].description === null || array[i].description.length === 0) {
      divURL = document.createElement('div');
      // provide a link to the gist and no description
      divURL.innerHTML = '<a href="'+ array[i].url + '">' + "No Description" + '</a>';
      item.appendChild(divURL);
    }
    else {
      divURL = document.createElement('div');
      // provide a link to the gist and a description of it
      divURL.innerHTML = '<a href="'+ array[i].url + '">' + array[i].description + '</a>';
      item.appendChild(divURL);
    }
    this.favorite = document.createElement('button');
    this.favorite.innerHTML = "Add to Favorites";
    
    // save a gist to favorites
    this.favorite.onclick = function() {
      localStorage.setItem('gistList', JSON.stringify(this.parentNode.textContent));
      this.parentNode.style.display='none';
      displayFavorites();
    };
    item.appendChild(favorite);
    ul.appendChild(item);
    list.appendChild(ul);
  }
  return list;
}

/* Display favorites on bottom of page */
function displayFavorites() {
  var list = document.getElementById('display');
  var ul = document.createElement('ul');
  
  for (var key in localStorage) {
    var item = document.createElement('li');
    item.innerHTML = localStorage[key];
    this.deleteButton = document.createElement('button');
    this.deleteButton.innerHTML = "Remove from Favorites"; 
    
    // Remove item from favorites
    this.deleteButton.onclick = function() {
      this.parentNode.style.display='none';
      localStorage.clear();
    };
    item.appendChild(deleteButton);
    ul.appendChild(item);
    list.appendChild(ul);
  }
  return list; 
}



