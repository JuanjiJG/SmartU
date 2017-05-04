// Requirements
const express = require('express');

// Setting up the Express router
const router = express.Router();

// Get a list of all users from the database
router.get('/user', function(req, res){
  res.send({type:'GET'});
});

// Get a specific user from the database
router.get('/user/:id', function(req, res){
  res.send({type:'GET'});
});

// Ad a new user the database
router.post('/user', function(req, res){
  console.log(req.body);
  res.send({
    type:'POST',
    firstName:req.body.firstName,
    lastName:req.body.lastName
  });
});

// Update an existing user in the database
router.put('/user/:id', function(req, res){
  res.send({type:'PUT'});
});

// Delete an existing user from the database
router.delete('/user/:id', function(req, res){
  res.send({type:'DELETE'});
});

module.exports = router;
