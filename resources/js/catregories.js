document.getElementById('bookForm').addEventListener('submit', async function (e) {
    e.preventDefault();
    try {
    const response = await fetch('/api/category-books', {
    method: 'GET',
    headers: {
        'Authorization': 'Bearer ' + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIwMTk3OGYzMC1mZGE3LTczZjMtOWRkNi1jODc1OTczZjc4MGQiLCJqdGkiOiJiYWM2ZjUxMTUxNjU0NzYyNTQxNDMwOTg2MTYyYWZjNzY0M2JiMThlZDg2YmQ3NDU4ZTljZjgwOGQyY2NiZDk0YTA2NmIxY2E2MGZhMDAyMiIsImlhdCI6MTc1MDQ1NDA3MS40MjIzNCwibmJmIjoxNzUwNDU0MDcxLjQyMjM0NCwiZXhwIjoxNzgxOTkwMDcxLjM3ODAyNCwic3ViIjoiMiIsInNjb3BlcyI6W119.TK8IFcL2_Ee8-TqG_EmH7SDcQe9m16oEy2VbwFyy8lr0FhJlEAOm175kumiwceFJIyU9snddNoL6Hv9JTw9WSDkAT7rrMCHNTgCJGcYiAdejNn2e2cCIJAETYtvPESjIX_nIzfLTrYZ-nSpe2bOeSJCtJCusSGspN6AfGo1-VbFZsfXkLuOseg8IgvmablbelTlK3Ecj3lYShtMxMgzaYtbGOdGvedgI54VV-jFo04fdpP0hqCoMZklVw04Wh9eq3ua_-Z-3JzE6GcqoKtocdgiO_id2OMlTaWKdykjhUNDZqYlhRYVf10P6JXPy4xMyDI0SaWo3mAMbuTBcCVpTTVQ5S3nxjDN_Iel6k8oj0n_De53C7p7QFQxgNNPhKh96sYw_FEJFmN__yXbr1l0ONAK1yFwlzJGH06x2libMhbMbgg45W-DxvmRh3iNJ9-AnmTBx3EoCx63XfeD6kRNdgdaERjtfvf06kyENohx5dYBUVZd4uut9hn5e8AIC_iJRCojc-qUC6X3La1lguVaki8dOB7wdtAys3PqS0xSW3ndGABscBsXuLeziRLHfHXpPdv1d3U1Vx6Kk6ItBrLgg30s6e9KajIYF19Le0FbiD-utL8Ei1p5ZENCTKOn_T04Abkz09TWoagGsvxtylOYFn7_o0m_a-uNyoc5mKViwgaY',
        'Accept': 'application/json'
}
});

    const result = await response.json();

    if (response.ok) {
    document.getElementById('response').innerText = '✅ Uploaded successfully: ' + result.data.title;
} else {
    document.getElementById('response').innerText = '❌ Error: ' + (result.message || 'Unknown error');
}
} catch (err) {
    console.error(err);
    document.getElementById('response').innerText = '❌ Network error';
}
});
