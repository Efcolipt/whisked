const Comments = require("../models/Comments");
const validator = require("express-validator");

// Get all
module.exports.list = function(req, res, next) {
  if (!req.params.id) return res.status(404).json({ errors: "not Id" });
  const id = req.params.id;
  Comments.find({ idCollection: id }, function(err, comments) {
    if (err) {
      return res.status(500).json({
        message: "Error getting records."
      });
    }
    return res.json(comments);
  });
};

// Create
module.exports.create = [
  // validations rules
  validator
    .body("author", "Please enter Author Name")
    .isLength({ min: 1, max: 20 }),
  validator
    .body("body", "Please enter Comments Content")
    .isLength({ min: 1, max: 125 }),

  function(req, res) {
    if (!req.params.id) return res.status(404).json({ errors: "not Id" });

    // throw validation errors
    const errors = validator.validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(422).json({ errors: errors.mapped() });
    }

    // initialize record
    const comment = new Comments({
      author: req.body.author,
      body: req.body.body,
      idCollection: req.params.id
    });

    // save record
    comment.save(function(err, comment) {
      if (err) {
        return res.status(500).json({
          message: "Error saving record",
          error: err
        });
      }
      return res.json({
        message: "saved",
        _id: comment._id,
        idCollection: comment.idCollection
      });
    });
  }
];

// Update
// module.exports.update = [
//   // validation rules

//   validator.body('author', 'Please enter Author Name').isLength({ min: 1 }),
//   validator.body('body', 'Please enter Comments Content').isLength({ min: 1 }),

//   function(req, res) {
//     if (!req.params.id ) return res.status(404).json({ errors: "not Id" });
//     // throw validation errors
//     const errors = validator.validationResult(req);
//     if (!errors.isEmpty()) {
//       return res.status(422).json({ errors: errors.mapped() });
//     }

//     const id = req.params.id;
//     Comments.findOne({idCollection: id}, function(err, comment){
//         if(err) {
//             return res.status(500).json({
//                 message: 'Error saving record',
//                 error: err
//             });
//         }
//         if(!comment) {
//             return res.status(404).json({
//                 message: 'No such record'
//             });
//         }

//         // initialize record
//         comment.author =  req.body.author ? req.body.author : comment.author;
//         comment.body =  req.body.body ? req.body.body : comment.body;

//         // save record
//         comment.save(function(err, comment){
//             if(err) {
//                 return res.status(500).json({
//                     message: 'Error getting record.'
//                 });
//             }
//             if(!comment) {
//                 return res.status(404).json({
//                     message: 'No such record'
//                 });
//             }
//             return res.json(comment);
//         });
//     });
//   }

// ]

// Delete
module.exports.delete = function(req, res) {
  if (!req.params.id) return res.status(404).json({ errors: "not Id" });
  const id = req.params.id;
  Comments.findByIdAndRemove({ idCollectiong: id }, function(err, comment) {
    if (err) {
      return res.status(500).json({
        message: "Error getting record."
      });
    }
    return res.json(comment);
  });
};
