window.onload = function () {

    var sgPopup = document.getElementById("bonus_popup");

    document.getElementById("open_popup").addEventListener("click", 
        function(event) {
            sgPopup.classList.remove('dnone');
        });


    document.getElementById("close_popup").addEventListener("click",
        function(event){
                closeModal(event);
        });

    document.addEventListener("click",
        function(event){
            if (event.target == sgPopup) {
                closeModal(event);
            }
        });

    function closeModal(event) {
        event.preventDefault();
        sgPopup.classList.add('dnone');
    }
}