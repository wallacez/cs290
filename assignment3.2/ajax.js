var originalGistList = [];
var fetchdata = function() {
  //Do the XMLHttpRequest here and keep the result in the originalGistList
	//When you got the data, you need to iterate over them and 
  //call the function from the next step inside it per gist to generate the html content (generateGistHtml)
}

var fbutton = document.createElement("button");
fbutton.innerHTML = "+";
fbutton.setAttribute("gistId", gist.id);
fbutton.onclick = function(){
	var gistId = this.getAttribute("gistId"); //this is what you have saved before
	var toBeFavoredGist = findById(gistId);
	//here you add the gist to your favorite list in the localStorage and remove it from the gist list and add it to favorite list
}

var generateGistHtml = function(gist) {
	//gist will have the entire gist data that comes from the api, for the details check my pinned discussion about understanding JSON
	//Add a button (code above goes here) next to each element and save the gist id in the html to be able to find it again, if you chose id, you need a function called findById(id) that takes a gist id and iterates over originalGistList to find the appropriate gist and returns it.
	//This function will be used in the previous step function (fetchData)
}

var findById = function(id) {
	//iterate over list of gists to find the gist with id equals to input id
	//return that gist
}
Wheneve

