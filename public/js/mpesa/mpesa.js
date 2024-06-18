document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('accessToken').addEventListener('click', function (event) {
        event.preventDefault();
        axios.post('/get-token', {})
            .then(function (response) {
                console.log(response.data);
                document.getElementById('myToken').innerHTML = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
    });
});

document.addEventListener('DOMContentLoaded', ()=>{
    document.getElementById('registerUrl').addEventListener('click',(event)=>{
        event.preventDefault();
        axios.post('/reg-url', {})
        .then((response)=>{
            console.log(response.data);
        })
        .catch((error)=>{
            console.log('my error');
            console.log(error);
        })
    })
})