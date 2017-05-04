// Requirements
const express = require('express');
const bodyParser = require('body-parser');
const userRoutes = require('./services/UserService');

// Seting up the Express app
const app = express();

// Make the app use the body parser
app.use(bodyParser.json());

// Make the app use our API routes
app.use('/api', userRoutes);

// Start listening for requests
app.listen(process.env.port || 3000, function () {
  console.log('Example app listening on port 3000!');
});
