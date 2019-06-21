/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function menuFunction() {
    var x = document.getElementById("myCategories");
    if (x.className === "categories") {
        x.className += " responsive";
    } else {
        x.className = "categories";
    }
}
