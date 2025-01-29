<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
function checkSession() {

    const formData = new FormData();
    formData.append('session_token', localStorage.getItem('session_token'));

    axios.post('http://localhost/UtbKosWeb/backend/session.php', formData)
        .then(response => {
            console.log(response);
            if (response.data.status === 'success') {
                const email = response.data.hasil.email || 'Default Name';
                localStorage.setItem('email', email);
            } else {

                window.location.href = '../login.php';
            }
        })
        .catch(error => {

            console.error('Error checking session:', error);
        });
}

checkSession();
</script>