var today = new Date();
document.getElementById('day').innerHTML = today.toLocaleString('en-us', { weekday: 'long' });
document.getElementById('date').innerHTML = today.getDate();
document.getElementById('month').innerHTML = today.toLocaleString('en-us', { month: 'long' });
document.getElementById('year').innerHTML = today.getFullYear();



