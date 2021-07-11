const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const Comments = new Schema({
  author: { type: String, required: true },
  body: { type: String, required: true },
  idCollection: { type: String, required: true }
});

module.exports = mongoose.model('Comments', Comments)
