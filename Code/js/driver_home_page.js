const load = () => {



    let pointHistoryEntries = document.getElementsByClassName("point_history_entry")

    for(let i=0;i<pointHistoryEntries.length;i++){
        pointHistoryEntries[i].children[1].onclick=toggleUserVisibility.bind(null, pointHistoryEntries[i].children[4])
    }

}

const toggleUserVisibility = (list) => {
    console.log(list)
    if(list.style.display == "none"){
        list.style.display = "inline"
    }
    else{
        list.style.display = "none"
    }
}

const addCatalogElement = (imgSrc, point_price, desc, id) => {
    newListElement = document.createElement("li")
    newListElement.setAttribute("class", "catalog_entry")
    newListElement.setAttribute("price", point_price)
    newListElement.setAttribute("product_id", id)

    newListElement.appendChild(document.createElement("img"))
    newListElement.children[0].setAttribute("src", imgSrc)
    newListElement.children[0].setAttribute("width", "50px")
    newListElement.children[0].setAttribute("height", "50px")

    newListElement.appendChild(document.createElement("p"))
    newListElement.children[1].innerHTML = point_price + " Points"
    
    newListElement.appendChild(document.createElement("p"))
    newListElement.children[2].innerHTML = desc

    newListElement.appendChild(document.createElement("button"))
    newListElement.children[3].innerHTML = "Add to Cart"
    newListElement.children[3].onclick = addToCart.bind(null, newListElement);

    totalList = document.getElementById("catalog_listing")
    totalList.appendChild(newListElement)
}

const filterLow = () =>{
    console.log("Filtering...")

    function compareFn(a, b){
        if(Number(a.getAttribute("price")) < Number(b.getAttribute("price"))){
            return -1
        }
        else{
            return 1
        }
    }

    childrenArray = Array.from(document.getElementById("catalog_listing").children)
    childrenArray.sort(compareFn)

    list = document.getElementById("catalog_listing")

    while(list.firstChild){
        list.removeChild(list.lastChild)
    }
    for(let i=0;i<childrenArray.length;i++){
        list.appendChild(childrenArray[i])
    }
}

const filterHigh = () =>{
    console.log("Filtering...")

    function compareFn(a, b){
        if(Number(a.getAttribute("price")) < Number(b.getAttribute("price"))){
            return 1
        }
        else{
            return -1
        }
    }

    childrenArray = Array.from(document.getElementById("catalog_listing").children)
    childrenArray.sort(compareFn)

    list = document.getElementById("catalog_listing")

    while(list.firstChild){
        list.removeChild(list.lastChild)
    }
    for(let i=0;i<childrenArray.length;i++){
        list.appendChild(childrenArray[i])
    }
}

const addToCart = (element) => {
    clone = element.cloneNode(true)
    clone.removeChild(clone.children[3]);
    document.getElementById("cart_listing").append(clone);
}

const clearCart = () => {
    cart = document.getElementById("cart_listing");
    totalLength = cart.children.length
    for(let i=0;i<totalLength;i++){
        cart.removeChild(cart.children[0]);
    }
}

window.addEventListener("load", load)