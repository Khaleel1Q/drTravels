
let toggleNavStatus = true;

 function toggleNav (){
    let getSidebar = document.querySelector(".nav-sidebar");
    let getSidebarUl = document.querySelector(".nav-sidebar ul");
    let getSidebarTitle = document.querySelector(".nav-sidebar span");
    let getSidebarLinks = document.querySelectorAll(".nav-sidebar a");
    
    if(toggleNavStatus === true)
        {
            getSidebarUl.style.visibility = "visible";
            getSidebar.style.width = "272px";
            getSidebarTitle.style.opacity = "0.5";
            
            
            let arrayLength = getSidebarLinks.length;
            for(let i = 0; i < arrayLength; i++){
                getSidebarLinks[i].style.opacity = "1";
            }
            toggleNavStatus = false;
        }
    else if (toggleNavStatus === false)
        {
            
            getSidebar.style.width = "50px";
            getSidebarTitle.style.opacity = "0";
            
            
            let arrayLength1 = getSidebarLinks.length;
            for(let j = 0; j<arrayLength1; j++){
                getSidebarLinks[j].style.opacity = "0";
            }
            getSidebarUl.style.visibility = "hidden";
            toggleNavStatus = true;
        }
}