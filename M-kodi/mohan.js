var modal= document.getElementById('id01');
window.onclick=function(event){
    if(event.target== modal){
        modal.style.display = "none";
    }
}
var logoutButton = document.getElementsByName('logout')[0];
    logoutButton.addEventListener('click', function(event) {
        var confirmLogout = confirm("Are you sure you want to logout?");
        if(!confirmLogout) {
            event.preventDefault(); // prevent form submission if the user selects "no"
        } else {
            document.getElementsByName('confirm_logout')[0].value = 'yes'; // set the value of the hidden input to "yes"
        }
    });


