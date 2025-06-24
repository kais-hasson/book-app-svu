const form=document.getElementById('addCategoryForm')
if(form) {
   form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

            const token = localStorage.getItem('token')
            try {
                const response = await fetch('/api/category-books', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (response.ok) {
                    document.getElementById('addCategoryForm').removeEventListener('submit',async function (e) {
                        e.preventDefault();})

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
