setInterval(() => {
  fetch('http://127.0.0.1:8000/api/chat-token', {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    },
  })
  .then(response => response.text()) // <- GANTI INI
  .then(data => {
    console.log('Response:', data);
  })
  .catch(error => {
    console.error('Error:', error);
  });
}, 100);
