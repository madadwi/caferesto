function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.getElementById("main-footer").style.marginLeft = "250px";
    document.getElementById("button-sidenav").style.display = "none";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("main-footer").style.marginLeft= "0";
    document.getElementById("button-sidenav").style.display = "block";
}



// $(document).on('click','li', function(){
//     $(this).addClass('active').siblings().removeClass('active')
// })



// Get the modal
var modal = document.getElementById("myModal");
    
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}



//LOADING
var loading = document.getElementById('anim-load');

    window.addEventListener('load', function(){
    loading.style.display="none"
});