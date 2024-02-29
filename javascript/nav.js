/* 
 *	***************** Menu Section Header ****************
 */

 const tableButton = document.getElementsByTagName("li")[1];
 if  (location.href == 'http://localhost:3000/table.php?page=1')
 tableButton.className = "w3-bar-item w3-yellow w3-hover-red " + 
     "w3-round-large w3-margin-right w3-mobile";

const updateButton = document.createElement("li");
if  (location.href == 'http://localhost:3000/update.php')
updateButton.className = "w3-bar-item w3-yellow w3-hover-red " + 
    "w3-round-large w3-margin-right w3-right w3-mobile";
else
updateButton.className = "w3-bar-item  w3-hover-red w3-round-large " +
	"w3-margin-right w3-right w3-mobile";

const navigation = document.querySelector("ul");
navigation.insertBefore(updateButton, null);
const changeListButton = document.createElement("a");
changeListButton.href = "update.php";
updateButton.appendChild(changeListButton);
const icon = document.createElement("i");
icon.className = "fa-solid fa-keyboard w3-margin-right";
updateButton.appendChild(icon);
const buttonText = document.createTextNode("Update");
changeListButton.appendChild(buttonText);