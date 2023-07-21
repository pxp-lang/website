document.addEventListener("alpine:init",()=>{Alpine.data("menu",()=>({show:!1,open(){this.show=!0},close(){this.show=!1},toggle(){this.show=!this.show}}))});
