const products = document.querySelectorAll(".slider .arrow ")
let counter = 0

function left(){
    counter--
    scroll()
}

function right(){
    counter++
    scroll()

}

function scroll(){
    products.forEach(function(item){
        item.style.transform = `translatex(${counter * 950}px)`
    })
}