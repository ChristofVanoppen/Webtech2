var port = 5000;
var app = require('express')();
var server = require('http').createServer(app);
var io = require('socket.io').listen(server);
var mysql = require('mysql');

console.log("Listening on port " + port);
server.listen(port);

app.get('/', function (req, res) {
  res.sendfile(__dirname + '/ask.html');
});
app.get('/ask.html', function (req, res) {
  res.sendfile(__dirname + '/ask.html');
});
app.get('/questions.html', function (req, res) {
  res.sendfile(__dirname + '/questions.html');
});
app.get('/moderate.html', function (req, res) {
  res.sendfile(__dirname + '/moderate.html');
});

var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'imdwall',
  debug : true
});