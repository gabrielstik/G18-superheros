const $more = document.querySelectorAll('.more')
const $seeMore = document.querySelectorAll('.seeMore')

$seeMore.forEach(element => {
    element.open= 0
});

for (let i = 0; i < $seeMore.length; i++) {
    $seeMore[i].addEventListener('mousedown', (event) => {
        if ($seeMore[i].open == 0) {
            $more[i].style.display = `block`
            $seeMore[i].open=1
        } else { 
            $more[i].style.display = `none`
            $seeMore[i].open=0
        } 
})
}

const $imageTypes = document.querySelectorAll('.imageType')
const $add = document.querySelectorAll('.add')

console.log($imageTypes)

$imageTypes.forEach($imageType => {
    $imageType.addEventListener("mouseover",()=>{
        $imageType.querySelector("img").style.transform = "scale(2)"
        $imageType.style.zIndex = 2
        $imageType.querySelector("a").style.transform = "scale(2) translateX(15px) translateY(-30px)"
        console.log("fwds")
    }) 
    $imageType.addEventListener("mouseleave",()=>{
        $imageType.querySelector("img").style.transform = "scale(1)"
        $imageType.style.zIndex = 1
        $imageType.querySelector("a").style.transform = "scale(1)"
    }) 
})


const cursorParallax = new CursorParallax()
const cursorParallax1 = new CursorParallax1()


