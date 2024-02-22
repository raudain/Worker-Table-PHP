/* 
 *	***************** Menu Section Header ****************
 */

// Create Worker Button
const rightButton = document.createElement("li");
if  (location.href == 'http://localhost:8080/BeggarOfficeJsp/Update')
    rightButton.className = "w3-bar-item w3-yellow w3-hover-red " + 
    "w3-round-large w3-margin-right w3-right w3-mobile";
else
	rightButton.className = "w3-bar-item  w3-hover-red w3-round-large " +
	"w3-margin-right w3-right w3-mobile";

const navigation = document.querySelector("ul");
navigation.insertBefore(rightButton, null);
const changeListButton = document.createElement("a");
changeListButton.href = "Update";
rightButton.appendChild(changeListButton);
const icon = document.createElement("i");
icon.className = "fa-solid fa-keyboard w3-margin-right";
rightButton.appendChild(icon);
const buttonText = document.createTextNode("Update");
changeListButton.appendChild(buttonText);