const form=document.getElementById('bookForm')
if(form){
    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);
        debugger
        console.log(formData);
        const token=localStorage.getItem('token')
        try {

            const response = await fetch('/api/books', {
                method: 'POST',
                body: formData,
                headers:  {
                    'Authorization': 'Bearer ' + token,
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok) {
                document.getElementById('response').innerText = '✅ Uploaded successfully: ' + result.data.title;

            } else {
                document.getElementById('response').innerText = '❌ Error: ' + (result.message || 'Unknown error');
            }
            form.reset()
        } catch (err) {
            console.error(err);
            document.getElementById('response').innerText = '❌ Network error';
            form.reset()
        }
    });
}

