/*
|--------------------------------------------------------------------------
|   Navigation Menu
|--------------------------------------------------------------------------
*/

const navbar = document.getElementById("navbar");
const navbarToggle = navbar.querySelector(".navbar-toggle");

function openMobileNavbar() {
  navbar.classList.add("opened");
  navbarToggle.setAttribute("aria-label", "Close navigation menu.");
}

function closeMobileNavbar() {
  navbar.classList.remove("opened");
  navbarToggle.setAttribute("aria-label", "Open navigation menu.");
}

navbarToggle.addEventListener("click", () => {
  if (navbar.classList.contains("opened")) {
    closeMobileNavbar();
  } else {
    openMobileNavbar();
  }
});

const navbarMenu = navbar.querySelector(".navbar-menu");
const navbarLinksContainer = navbar.querySelector(".navbar-links");

navbarLinksContainer.addEventListener("click", (clickEvent) => {
  clickEvent.stopPropagation();
});

navbarMenu.addEventListener("click", closeMobileNavbar);

/*
|--------------------------------------------------------------------------
|   Search Wrapper
|--------------------------------------------------------------------------
*/

const cardHeaders = document.getElementsByClassName("js--cardHeader");
const productCard = document.getElementsByClassName("productCard");
const categoryCard = document.getElementsByClassName("categoryCard");
const searchBar = document.getElementById("js--searchBar");

searchBar.onkeyup = (event) => {
    let filter = event.target.value.toUpperCase();
    
    for (let i = 0; i < productCard.length; i++) {
        let innerHTML = productCard[i].innerHTML.toUpperCase();
        if (innerHTML.indexOf(filter) !== -1) {
          productCard[i].style.display = "";
        } else {
          productCard[i].style.display = "none";
        }
        productCard[i].style.animationName = "none";
    }
    
    for (let i = 0; i < categoryCard.length; i++) {
      let innerHTML = categoryCard[i].innerHTML.toUpperCase();
      if (innerHTML.indexOf(filter) !== -1) {
        categoryCard[i].style.display = "";
      } else {
        categoryCard[i].style.display = "none";
      }
      categoryCard[i].style.animationName = "none";
  }
}