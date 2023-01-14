const sidebarMenu = document.querySelectorAll(".sidebar__content > ul > li > .link");

sidebarMenu.forEach((elem) => {
  if (elem.href === elem.baseURI) {
    elem.classList.add("active");
  }
});
