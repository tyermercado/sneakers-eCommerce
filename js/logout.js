//confirmation to logout
function checker() {
    var result = confirm('Are you sure you want to logout?');
    if (result == false) {
        event.preventDefault();
    }
}