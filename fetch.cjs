const https = require('https');

https.get('https://fz-store-phi.vercel.app/', (res) => {
    let data = '';
    res.on('data', (chunk) => {
        data += chunk;
    });
    res.on('end', () => {
        const match = data.match(/<link[^>]*href=\"([^\"]*app[^\"]*\.css)\"/);
        console.log(match ? match[1] : 'No CSS found');
    });
});
