/* 
 *	***************** Menu Section Header ****************
 */

 const tableButton = document.getElementsByTagName("li")[1];
 if  (location.href == 'http://localhost:3000/table.php?page=1')
 tableButton.className = "w3-bar-item w3-yellow w3-hover-red " + 
     "w3-round-large w3-margin-right w3-mobile";

const updateButton = document.getElementsByTagName("li")[3];
if  (location.href == 'http://localhost:3000/update.php')
updateButton.className = "w3-bar-item w3-yellow w3-hover-red " + 
    "w3-round-large w3-margin-right w3-right w3-mobile";