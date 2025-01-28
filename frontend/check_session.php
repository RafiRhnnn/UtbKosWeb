<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
<<<<<<< HEAD
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

                window.location.href = 'login.php';
            }
        })
        .catch(error => {

            console.error('Error checking session:', error);
        });
}

checkSession();
=======
    function checkSession() {

        const formData = new FormData();
        formData.append('session_token', localStorage.getItem('session_token'));

        axios.post('http://localhost/UtbKosWeb/backend/session.php', formData)
            .then(response => {
                console.log(response);
                if (response.data.status === 'success') {
                    const nama = response.data.hasil.name || 'Default Name';
                    localStorage.setItem('nama', nama);
                } else {

                    window.location.href = 'login.php';
                }
            })
            .catch(error => {

                console.error('Error checking session:', error);
            });
    }

    checkSession();
>>>>>>> b9e88bda990e8a45fdcd952423decd2a0cc4da0c
</script>