import { createServer } from 'http';
import { readFile } from 'fs';


readFile('./index.html', function (err, html) {
    if (err) {
        throw err; 
    }       
    createServer(function(request, response) {  
        response.writeHeader(200, {"Content-Type": "text/html"});  
        response.write(html);  
        response.end();  
    }).listen(8000);
});

